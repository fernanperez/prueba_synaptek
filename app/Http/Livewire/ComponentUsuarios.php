<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ComponentUsuarios extends Component
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
            'livewire.component-usuarios',
            [
                'usuarios' => $this->listarUsuarios(),
            ]
        );
    }

    public function listarUsuarios()
    {
        if (empty($this->filtro)) {
            return User::select('users.*')
                ->Paginate($this->listaPaginacion);
        } else {
            return User::select('users.*')
                ->where(function ($query) {
                    $query
                        ->where('users.id', 'like', $this->filtro . '%')
                        ->orWhere('users.nombre', 'like', $this->filtro . '%');
                })
                ->Paginate($this->listaPaginacion);
        }
    }
}
