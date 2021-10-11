<div>
    <div>
        <div class="container">
            <x-global.filtro :paginacion='$paginaciones' :boton="true" :modalColor="'primary'"
                :nombreModal="'Crear Blog'" :idModal="'crearCategoriaBlog'" />
        </div>
        <div class=" container table-responsive">
            <table class="table table-stripe table-hover-animation text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)

                        <tr>
                            <th scope="row">{{ $usuario->id }}</th>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{!! $usuario->estado == 1
    ? '<span
                                class="badge-glow badge-pill badge-success">Habilitado</span>'
    : '<span
                            class="badge badge-pill badge-danger">Deshabilitado</span>' !!}</td>
                            <td>{{ $usuario->info_roles() }}</td>
                            <td><button type="submit" wire:click="edit({{ $usuario->id }})"
                                    class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editar_usuario_empresa"><i class="far fa-edit"></i></button>
                                {!! $usuario->estado == 1
    ? '<button type="submit"
                            wire:click="destroy(' .
        $usuario->id .
        ')"
                            class="btn btn-sm btn-danger"><i class="fas fa-eye-slash"></i></button>'
    : '<button type="submit"
                            wire:click="show(' .
        $usuario->id .
        ')" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></button>' !!}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <p class="text-center">No se encontraron registros</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex mt-5 justify-content-center">
            <div>{{ $usuarios->links() }}</div>
        </div>
    </div>
</div>
