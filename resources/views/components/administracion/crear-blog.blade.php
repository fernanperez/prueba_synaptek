@props(['categorias' => 'categorias'])

<x-modal id="crearBlog" title="Crear Blog" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="crearBlog">
            <x-input id="titulo_crear" for="titulo_crear" type="text" placeholder="titulo" label="Titulo"
                wire="wire:model.defer=titulo" :isRequired="false">
                <x-slot name="validacion">
                    @error('titulo') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <div class="form-group">
                <label for="descripcion_crear">Descripción</label>
                <textarea class="form-control" name="descripcion_crear" id="descripcion_crear" cols="30" rows="10"
                    wire:model.defer='descripcion'></textarea>
                @error('descripcion') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_crear">Categoria</label>
                <select class="form-control" id="categoria_crear" name="categoria_crear" wire:model="categoria_id">
                    <option label="Seleccione una opción" value=""></option>
                    @forelse ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @empty
                        <option label="No hay categorias creadas" value=""></option>
                    @endforelse
                </select>
                @error('categoria_id') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado_crear">Estado</label>
                <select class="form-control" id="estado_crear" name="estado_crear" wire:model="estado">
                    <option label="Seleccione una opción" value=""></option>
                    <option value="1">Habilitado</option>
                    <option value="0">Deshabilitado</option>
                </select>
                @error('estado') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>


            <div class="d-flex mt-3">
                <button type="submit" class="btn btn-danger ml-auto" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success ml-2">Crear
                    Blog</button>
            </div>
        </form>
    </x-slot>
</x-modal>

{{-- Editar Usuario --}}
<x-modal id="editarBlog" title="Editar Blog" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="actualizarBlog">
            <x-input id="titulo_editar" for="titulo_editar" type="text" placeholder="titulo" label="Titulo"
                wire="wire:model.defer=titulo" :isRequired="false">
                <x-slot name="validacion">
                    @error('titulo') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <div class="form-group">
                <label for="descripcion_editar">Descripción</label>
                <textarea class="form-control" name="descripcion_editar" id="descripcion_editar" cols="30" rows="10"
                    wire:model.defer='descripcion'></textarea>
                @error('descripcion') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria_editar">Categoria</label>
                <select class="form-control" id="categoria_editar" name="categoria_editar" wire:model="categoria_id">
                    <option label="Seleccione una opción" value=""></option>
                    @forelse ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @empty
                        <option label="No hay categorias creadas" value=""></option>
                    @endforelse
                </select>
                @error('categoria_id') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado_editar">Estado</label>
                <select class="form-control" id="estado_editar" name="estado_editar" wire:model="estado">
                    <option label="Seleccione una opción" value=""></option>
                    <option value="1">Habilitado</option>
                    <option value="0">Deshabilitado</option>
                </select>
                @error('estado') <span class="error text-danger"><small>{{ $message }}</small></span>
                @enderror
            </div>


            <div class="d-flex mt-3">
                <button type="submit" class="btn btn-danger ml-auto" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success ml-2">Guardar Cambios</button>
            </div>
        </form>
    </x-slot>
</x-modal>

<script>
    window.addEventListener('closeModal', event => {
        $("#crearBlog").modal('hide');
        $("#editarBlog").modal('hide');
    })
</script>
