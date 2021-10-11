<div class="navbar-header my-1 expanded">
    <ul class="nav navbar-nav flex-row d-flex aling-items-center">
        <li class="nav-item mr-auto flex-row d-flex aling-items-center small">
            <span class="brand-logo">
                <img src="{{ asset('img/favicon.png') }}"
                    style="width:auto;height:auto;max-width:180px;max-height:100%; alt=" logo_xs.png">
            </span>
        </li>
        <li class="nav-item mx-auto flex-row d-flex aling-items-center large">
            <a class="navbar-brand mr-1 my-auto" href="#">

                <img style="width:auto;height:auto;max-width:180px;max-height:100%;"
                    src="{{ asset('img/Logo-dentos.png') }}" alt="logo.png">
            </a>
        </li>
        {{-- boton de colapsar menu --}}
        <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pr-0" id="button-collapse" data-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                    class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                    data-ticon="disc"></i>
            </a>
        </li>
        {{-- end boton de colapsar menu --}}
    </ul>
</div>
<div class="shadow-bottom"></div>
<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Administración</span>
        </li>

        <li class="nav-item">
            <x-jet-nav-link class="d-flex align-items-center" href="{{ route('categoria') }}"
                :active="request()->routeIs('categoria')"> <i class="fal fa-bookmark">
                </i>
                <span class="menu-title text-truncate" data-i18n="Crear Categorias">Crear Categorías</span>
            </x-jet-nav-link>
        </li>

        <li class="nav-item">
            <x-jet-nav-link class="d-flex align-items-center" href="{{ route('blog') }}"
                :active="request()->routeIs('blog')">
                <i class="fal fa-blog"></i>
                <span class="menu-title text-truncate" data-i18n="Crear Blog">Crear Blog</span>
            </x-jet-nav-link>
        </li>
        <li class="nav-item">
            <x-jet-nav-link class="d-flex align-items-center" href="#"> <i class="fal fa-users"
                    :active="request()->routeIs('administracion.*')">
                </i>
                <span class="menu-title text-truncate" data-i18n="Administrar Usuarios">Administrar Usuarios</span>
            </x-jet-nav-link>
        </li>
    </ul>
</div>
