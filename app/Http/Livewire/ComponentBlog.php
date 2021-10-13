<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str as Str;
use Livewire\WithPagination;

class ComponentBlog extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $listaPaginacion = 10;
    public $paginaciones = [
        ['id' => 1, 'nombre' => '1 registro'],
        ['id' => 5, 'nombre' => '5 registros'],
        ['id' => 10, 'nombre' => '10 registros'],
        ['id' => 15, 'nombre' => '15 registros'],
    ];

    public $filtro = '';

    public function updatingFiltro()
    {
        $this->resetPage();
    }

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'categoria_id' => 'required',
        'estado' => 'required',
    ];

    protected $message = [
        'titulo.required' => 'Es necesario ingresar el título',
        'titulo.required' => 'Es necesario ingresar el título',
        'categoria_id.required' => 'Es necesario seleccionar la categoria',
        'estado.required' => 'Es necesario seleccionar el estado',
    ];

    public $titulo, $descripcion, $slug, $imagen, $categoria_id, $estado;

    public function render()
    {
        return view(
            'livewire.component-blog',
            [
                'blogs' => $this->listarBlogs(),
                'categorias' => Categoria::get(),
            ]
        );
    }

    public function listarBlogs()
    {
        if (empty($this->filtro)) {
            return Blog::select('blogs.*')
                ->paginate($this->listaPaginacion);
        } else {
            return Blog::select('blogs.*')
                ->join('categorias as c', 'blogs.categoria_id', '=', 'c.id')
                ->join('users as u', 'blogs.user_id', '=', 'u.id')
                ->where(function ($query) {
                    $query
                        ->where('blogs.titulo', 'like', $this->filtro . '%')
                        ->orWhere('c.nombre', 'like', $this->filtro . '%')
                        ->orWhere('u.name', 'like', $this->filtro . '%')
                        ->orWhere('blogs.id', 'like', $this->filtro . '%');
                })
                ->paginate($this->listaPaginacion);
        }
    }

    public function crearBlog()
    {
        $this->validate();

        $this->slug = Str::slug($this->titulo);
        $slugExist = Blog::where('slug', $this->slug)
            ->get();

        // Verificar que el slug es único
        $unico = true;
        if ($slugExist->count() > 0) {
            if ($this->slug == $slugExist[0]['slug']) {
                $unico = false;
            }
        }

        if ($unico) {
            Blog::create([
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion,
                'imagen' => 'http://lorempixel.com/400/200/abstract/' . rand(1, 10),
                'slug' => $this->slug,
                'categoria_id' => $this->categoria_id,
                'estado' => $this->estado,
                'user_id' => Auth::user()->id,
            ]);
            session()->flash('message', 'Blog creado con exito!.');
            $this->reset();
            $this->dispatchBrowserEvent('closeModal');
        } else {
            session()->flash('errorSlug', 'ya existe un blog con ese nombre!.');
        }
    }

    public function editarBlog($blog_id)
    {
        $blog = Blog::find($blog_id);
        $this->titulo = $blog->titulo;
        $this->descripcion = $blog->descripcion;
        $this->imagen = $blog->imagen;
        $this->categoria_id = $blog->categoria_id;
        $this->estado = $blog->estado;
        $this->blog_id = $blog_id;
    }

    public function actualizarBlog()
    {
        $this->validate();

        Blog::where('id', $this->blog_id)
            ->update([
                'titulo' => $this->nombre,
                'descripcion' => $this->descripcion,
                'imagen' => $this->imagen,
                'categoria_id' => $this->categoria_id,
                'estado' => $this->estado,
            ]);
        $this->blog_id = null;
        session()->flash('message', 'Blog actualizado con exito!.');
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function show(Blog $blog)
    {
        $blog->estado = 1;
        $blog->save();
    }

    public function destroy(Blog $blog)
    {
        $blog->estado = 0;
        $blog->save();
    }

    public function limpiarCampos()
    {
        $this->titulo = '';
        $this->descripcion = '';
        $this->imagen = '';
        $this->categoria_id = '';
        $this->estado = '';
    }
}
