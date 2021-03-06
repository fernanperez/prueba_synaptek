<div>
    <x-administracion.crear-blog :categorias="$categorias" />
    <div class="container">
        <x-global.filtro :paginacion='$paginaciones' :boton="true" :modalColor="'primary'" :nombreModal="'Crear Blog'"
            :idModal="'crearBlog'" />
    </div>
    <div class=" container table-responsive">
        <table class="table table-stripe table-hover-animation text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)

                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td>{{ $blog->titulo }}</td>
                        <td><span class="d-inline-block col-3 text-truncate"
                                style="max-width: 20rem">{{ $blog->descripcion }}</span></td>
                        <td>{{ $blog->imagen }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td>{{ $blog->categoria->nombre }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{!! $blog->estado == 1
    ? '<span
                                class="badge-glow badge-pill badge-success">Publicado</span>'
    : '<span
                            class="badge badge-pill badge-danger">No Publicado</span>' !!}</td>
                        <td><button type="submit" wire:click="editarBlog({{ $blog->id }})"
                                class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editarBlog"><i
                                    class="far fa-edit"></i></button>
                            {!! $blog->estado == 1
    ? '<button type="submit"
                            wire:click="destroy(' .
        $blog->id .
        ')"
                            class="btn btn-sm btn-danger"><i class="fas fa-eye-slash"></i></button>'
    : '<button type="submit"
                            wire:click="show(' .
        $blog->id .
        ')" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></button>' !!}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">
                            <p class="text-center">No se encontraron registros</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex mt-5 justify-content-center">
        <div>{{ $blogs->links() }}</div>
    </div>
</div>
