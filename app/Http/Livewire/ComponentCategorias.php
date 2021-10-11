<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentCategorias extends Component
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
        'nombre' => 'required',
        'estado' => 'required',
    ];

    protected $messages = [
        'nombre.required' => 'Debe ingresar un nombre',
        'estado.required' => 'Debe seleccionar el estado',
    ];

    public $nombre, $estado, $categoria_id;

    public function render()
    {
        return view(
            'livewire.component-categorias',
            [
                'categorias' => $this->listarCategorias(),
            ]
        );
    }

    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->estado = '';
    }

    public function listarCategorias()
    {
        if (empty($this->filtro)) {
            return Categoria::select('categorias.*')
                ->paginate($this->listaPaginacion);
        } else {
            return Categoria::select('categorias.*')
                ->where(function ($query) {
                    $query
                        ->where('categorias.nombre', 'like', $this->filtro . '%')
                        ->orWhere('categorias.id', 'like', $this->filtro . '%');
                })
                ->Paginate($this->listaPaginacion);
        }
    }

    public function crearCategoria()
    {
        $this->validate();

        Categoria::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado
        ]);

        session()->flash('message', 'Categoría creada con exito!.');
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editarCategoria($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        $this->nombre = $categoria->nombre;
        $this->estado = $categoria->estado;
        $this->categoria_id = $categoria_id;
    }

    public function actualizarCategoria()
    {
        $this->validate();

        Categoria::where('id', $this->categoria_id)
            ->update([
                'nombre' => $this->nombre,
                'estado' => $this->estado,
            ]);
        $this->categoria_id = null;
        session()->flash('message', 'Categoría actualizada con exito!.');
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function show(Categoria $categoria)
    {
        $categoria->estado = 1;
        $categoria->save();
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->estado = 0;
        $categoria->save();
    }
}
