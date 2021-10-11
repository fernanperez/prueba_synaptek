<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i
                            class="ficon" data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
                        <span class="user-status">{{ Auth::user()->info_roles() }}</span>
                    </div>
                    <span class="avatar bg-transparent">

                        <img class="rounded-pill"
                            src="{{ asset(empty(Auth::user()->profile_photo_url) ? 'https://ui-avatars.com/api/?background=EBF4FF&color=7F9CF5&format=svg&rounded=true&name=' . Auth::user()->name : 'https://ui-avatars.com/api/?background=EBF4FF&color=7F9CF5&format=svg&rounded=true&name=' . Auth::user()->name) }}"
                            alt="Imagen perfil" width="50">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    {{-- <a class="dropdown-item" href="#"><i class="mr-50" data-feather="user"></i>
                        Perfil</a>

                    <div class="dropdown-divider"></div> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"><i class="mr-50"
                                data-feather="power"></i>
                            Salir</a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->
