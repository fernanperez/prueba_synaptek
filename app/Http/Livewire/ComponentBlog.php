<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComponentBlog extends Component
{
    public $titulo, $descripcion, $imagen, $estado, $categoria_id;

    protected $rules = [
        'titulo' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required',
        'estado' => 'required',
        'categoria_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.component-blog');
    }

    public function crearBlog()
    {
        $this->validate();

        Blog::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
            'estado' => $this->estado,
            'categoria_id' => 1,
            'user_id' => Auth::user()->id,
        ]);
    }
}
