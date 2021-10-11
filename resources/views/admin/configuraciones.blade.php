<x-template>
    {{-- llamado del title de la Vista --}}
    <x-slot name="titulo">
        <title>DentOS | Administración Blogs</title>
    </x-slot>
    <x-slot name="links">
    </x-slot>
    <x-slot name="container_header">
        <h1 class="text-center">Administración</h1>
    </x-slot>
    <x-slot name="container_principal">
        <div class="container text-center">
            <h2>Bienvenido al panel de administración -
                <span class="text-uppercase">{{ Auth::user()->name }}</span>
            </h2>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script src=""></script>
    </x-slot>
</x-template>
