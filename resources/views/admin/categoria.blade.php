<x-template>
    {{-- llamado del title de la Vista --}}
    <x-slot name="titulo">
        <title>DentOS | Administración Blogs</title>
    </x-slot>
    <x-slot name="links">
    </x-slot>
    <x-slot name="container_header">
        <div class="container mb-2">
            <h1 style="font-weight: 900;">Administración de categorías</h1>
        </div>
    </x-slot>
    <x-slot name="container_principal">
        @livewire('component-categorias')
    </x-slot>

    <x-slot name="scripts">
        <script src=""></script>
    </x-slot>
</x-template>
