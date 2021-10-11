{{-- Crear Categoria --}}
<x-modal id="crearCategoria" title="Crear Categoría" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="crearCategoria">
            <x-input id="nombre_crear" for="nombre_crear" type="text" placeholder="nombre" label="Nombre(s)"
                wire="wire:model.defer=nombre" :isRequired="false">
                <x-slot name="validacion">
                    @error('nombre') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

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
                    Categoría</button>
            </div>
        </form>
    </x-slot>
</x-modal>

{{-- Editar Categoria --}}
<x-modal id="editarCategoria" title="Editar Categoría" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="actualizarCategoria">
            <x-input id="nombre_editar" for="nombre_editar" type="text" placeholder="nombre" label="Nombre(s)"
                wire="wire:model.defer=nombre" :isRequired="false">
                <x-slot name="validacion">
                    @error('nombre') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

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
        $("#crearCategoria").modal('hide');
        $("#editarCategoria").modal('hide');
    })
</script>
