@props(['paginacion' => [], 'item' => 'id', 'nombre' => 'nombre', 'boton' => null, 'modalColor' => '', 'idModal' => '', 'nombreModal' => ''])
<div class="d-flex justify-content-between align-items-center">
    <div class="row-group pb-1">
        @if (empty($paginacion))
            <select class="form-control" style="width: 4.5rem" name="listaPaginacion" id="listaPaginacion"
                wire:model="listaPaginacion">
            @else
                <select class="form-control" style="width: 10rem" name="listaPaginacion" id="listaPaginacion"
                    wire:model="listaPaginacion">
        @endif
        @foreach ($paginacion as $pagina)
            <option value="{{ $pagina[$item] }}">{{ $pagina[$nombre] }}</option>
        @endforeach
        </select>
    </div>
    <div class="pb-1 d-flex">
        <div>
            <input type="search" class="form-control" placeholder="Buscar" wire:model="filtro">
        </div>
        @if (isset($boton))
            <div class="pl-1">
                <button class="btn btn-{{ $modalColor }}" data-toggle="modal" wire:click="limpiarCampos()"
                    data-target="#{{ $idModal }}">{{ $nombreModal }}</button>
            </div>
        @endif
    </div>
</div>
