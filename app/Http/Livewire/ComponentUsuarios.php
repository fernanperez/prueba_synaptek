<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public $nombre, $email, $password, $estado, $rol, $usuario_id;

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
                        ->orWhere('users.name', 'like', $this->filtro . '%');
                })
                ->Paginate($this->listaPaginacion);
        }
    }

    public function crearUsuario()
    {
        $this->validate(
            [
                'nombre' => 'required',
                'email' => 'required',
                'password' => 'required|min:8',
                'estado' => 'required',
                'rol' => 'required',
            ],
            [
                'nombre.required' => 'Debe ingresar el nombre del usuario',
                'email.required' => 'Debe ingresar el email del usuario',
                'password.required' => 'Debe ingresar una contraseña del usuario',
                'password.min' => 'La contraseña debe ser de minimo 8 caracteres',
                'estado.required' => 'Debe seleccionar el estado del usuario',
                'rol.required' => 'Debe seleccionar el rol del usuario',
            ]
        );

        User::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'estado' => $this->estado,
            'rol' => $this->rol,
        ]);

        session()->flash('message', 'Usuario creado con exito!.');
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function editarUsuario($usuario_id)
    {
        $usuario = User::find($usuario_id);
        $this->nombre = $usuario->name;
        $this->email = $usuario->email;
        $this->password = '';
        $this->estado = $usuario->estado;
        $this->rol = $usuario->rol;
        $this->usuario_id = $usuario_id;
    }

    public function actualizarUsuario()
    {
        $this->validate(
            [
                'nombre' => 'required',
                'email' => 'required',
                'password' => 'min:8',
                'estado' => 'required',
                'rol' => 'required',
            ],
            [
                'nombre.required' => 'Debe ingresar el nombre del usuario',
                'email.required' => 'Debe ingresar el email del usuario',
                // 'password.required' => 'Debe ingresar una contraseña del usuario',
                'password.min' => 'La contraseña debe ser de minimo 8 caracteres',
                'estado.required' => 'Debe seleccionar el estado del usuario',
                'rol.required' => 'Debe seleccionar el rol del usuario',
            ]
        );
        if (empty($this->password)) {
            User::where('id', $this->usuario_id)
                ->update([
                    'name' => $this->nombre,
                    'email' => $this->email,
                    'estado' => $this->estado,
                    'rol' => $this->rol,
                ]);
        } else {
            User::where('id', $this->usuario_id)
                ->update([
                    'name' => $this->nombre,
                    'email' => $this->email,
                    'password' => Hash::make($this->password),
                    'estado' => $this->estado,
                    'rol' => $this->rol,
                ]);
        }
        $this->usuario_id = null;
        session()->flash('message', 'Usuario actualizado con exito!.');
        $this->reset();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function show(User $usuario)
    {
        $usuario->estado = 1;
        $usuario->save();
    }

    public function destroy(User $usuario)
    {
        $usuario->estado = 0;
        $usuario->save();
    }

    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->email = '';
        $this->password = '';
        $this->estado = '';
        $this->rol = '';
    }
}
