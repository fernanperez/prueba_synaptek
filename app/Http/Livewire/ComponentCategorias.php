<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class ComponentCategorias extends Component
{
    public $nombre;
    public $estado;

    public function render()
    {
        return view('livewire.component-categorias');
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
        Categoria::all();
    }
}
