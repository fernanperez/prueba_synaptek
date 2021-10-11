<div>
    {{-- Stop trying to control. --}}
    <div class="container">
        <x-global.filtro :paginacion='$paginaciones' :boton="true" :modalColor="'primary'"
            :nombreModal="'Crear Categoría'" :idModal="'crearCategoria'" />
    </div>
    <div class="container table-responsive">
        <table class="table table-stripe table-hover-animation text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)

                    <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{!! $categoria->estado == 1
    ? '<span
                            class="badge-glow badge-pill badge-success">Publicado</span>'
    : '<span
                        class="badge badge-pill badge-danger">No Publicado</span>' !!}</td>
                        <td><button type="submit" wire:click="edit({{ $categoria->id }})"
                                class="btn btn-sm btn-warning" data-toggle="modal"
                                data-target="#editar_usuario_empresa"><i class="far fa-edit"></i></button>
                            {!! $categoria->estado == 1
    ? '<button type="submit"
                            wire:click="destroy(' .
        $categoria->id .
        ')"
                            class="btn btn-sm btn-danger"><i class="fas fa-eye-slash"></i></button>'
    : '<button type="submit"
                            wire:click="show(' .
        $categoria->id .
        ')" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></button>' !!}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <p class="text-center">No se encontraron registros</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex mt-5 justify-content-center">
        <div>{{ $categorias->links() }}</div>
    </div>
</div>
