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

    public $nombre, $estado;

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

    public function crear_categoria()
    {
        Categoria::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado
        ]);
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
