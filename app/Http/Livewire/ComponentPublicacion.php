<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ComponentPublicacion extends Component
{
    public $blog;
    public function render()
    {
        return view('livewire.component-publicacion');
    }
}
