<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
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

    public function render()
    {
        return view(
            'livewire.component-blog',
            [
                'blogs' => $this->listarBlogs(),
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
}
