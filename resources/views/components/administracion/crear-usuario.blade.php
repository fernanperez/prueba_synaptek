<x-modal id="crearUsuarios" title="Crear Usuarios" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="crearUsuario">
            <x-input id="nombre_crear" for="nombre_crear" type="text" placeholder="nombre" label="Nombre(s)"
                wire="wire:model.defer=nombre" :isRequired="false">
                <x-slot name="validacion">
                    @error('nombre') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <x-input id="email_crear" for="email_crear" type="email" placeholder="Correo Electronico" label="Email"
                wire="wire:model.defer=email" :isRequired="false">
                <x-slot name="validacion">
                    @error('email') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <x-input id="password_crear" for="password_crear" type="password" placeholder="Correo Electronico"
                label="Contraseña" wire="wire:model.defer=password" :isRequired="false">
                <x-slot name="validacion">
                    @error('password') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <div class="form-group">
                <label for="rol_crear">Rol</label>
                <select class="form-control" id="rol_crear" name="rol_crear" wire:model="rol">
                    <option label="Seleccione una opción" value=""></option>
                    <option value="0">Colaborador</option>
                    <option value="1">Administrador</option>
                </select>
                @error('rol') <span class="error text-danger"><small>{{ $message }}</small></span>
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
                    Usuario</button>
            </div>
        </form>
    </x-slot>
</x-modal>

{{-- Editar Usuario --}}
<x-modal id="editarUsuarios" title="Editar Usuarios" wire="wire:ignore.self" :noFooter="true">
    <x-slot name='form'>
        <form wire:submit.prevent="actualizarUsuario">
            <x-input id="nombre_editar" for="nombre_editar" type="text" placeholder="nombre" label="Nombre(s)"
                wire="wire:model.defer=nombre" :isRequired="false">
                <x-slot name="validacion">
                    @error('nombre') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <x-input id="email_editar" for="email_editar" type="email" placeholder="Correo Electronico" label="Email"
                wire="wire:model.defer=email" :isRequired="false">
                <x-slot name="validacion">
                    @error('email') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <x-input id="password_editar" for="password_editar" type="password" placeholder="Correo Electronico"
                label="Contraseña" wire="wire:model.defer=password" :isRequired="false">
                <x-slot name="validacion">
                    @error('password') <span class="error text-danger"><small>{{ $message }}</small></span>
                    @enderror
                </x-slot>
            </x-input>

            <div class="form-group">
                <label for="rol_editar">Rol</label>
                <select class="form-control" id="rol_editar" name="rol_editar" wire:model="rol">
                    <option label="Seleccione una opción" value=""></option>
                    <option value="0">Colaborador</option>
                    <option value="1">Administrador</option>
                </select>
                @error('rol') <span class="error text-danger"><small>{{ $message }}</small></span>
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
        $("#crearUsuarios").modal('hide');
        $("#editarUsuarios").modal('hide');
    })
</script>
