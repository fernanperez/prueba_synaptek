<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class ComponentHomepage extends Component
{
    public function render()
    {
        return view(
            'livewire.component-homepage',
            [
                'blogsPublicados' => $this->listarBlogsPublicados(),
            ]
        );
    }

    public function listarBlogsPublicados()
    {
        return Blog::where('blogs.estado', 1)
            ->join('categorias as c', 'blogs.categoria_id', '=', 'c.id')
            ->where('c.estado', 1)
            ->Paginate(12);
    }
}
