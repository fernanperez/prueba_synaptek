<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class ComponentHomepage extends Component
{
    public $response;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view(
            'livewire.component-homepage',
            [
                'blogsPublicados' => $this->listarBlogsPublicados(),
                'apiBlogs' => $this->apiBlogs(),
            ]
        );
    }

    public function apiBlogs()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $data = json_decode($response);
        $this->response = collect($data);
        return $this->paginate($this->response, 6);
    }

    public function listarBlogsPublicados()
    {
        return Blog::where('blogs.estado', 1)
            ->join('categorias as c', 'blogs.categoria_id', '=', 'c.id')
            ->where('c.estado', 1)
            ->Paginate();
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
