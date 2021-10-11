<!DOCTYPE html>
<html lang="es">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    @if (isset($titulo))
        {{ $titulo }}
    @endif

    @include('components.links')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <div id="loading-spinner" class="d-flex text-white align-items-center justify-content-center"
        style="position:fixed; top:0px; left:0px; width:100vw; height:100vh; background-color:#fff9; z-index: 10000;display:none;">

        <div class="spinner-border text-primary d-flex align-items-center justify-content-center"
            style="width: 6rem; height: 6rem;" role="status">
            <div class="spinner-border text-dark d-flex align-items-center justify-content-center"
                style="width: 4rem; height: 4rem; animation-delay: 0.3s;" role="status">
                <div class="spinner-border text-info" style="width: 2rem; height: 2rem; animation-delay: 0.5s;"
                    role="status">
                    <span class="sr-only">Cargando...</span>
                </div>
            </div>
        </div>
    </div>

    @include('components.header')
    <!-- BEGIN: menu lateral izquierdo-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        @include('components.sidebar')
    </div>
    <!-- END: menu lateral izquierdo-->

    <!-- BEGIN: Contenedor para todo el contenido del dasboard-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            @if (isset($container_header))
                <div class="content-header">
                    {{ $container_header }}
                </div>
            @endif

            <div class="content-body">
                <!-- Dashboard  Starts -->

                {{ $container_principal }}

                <!-- Dashboard ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('components.footer')
    @include('components.scripts')

    @stack('scripts')
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            $('#loading-spinner').remove();
        })
    </script>
</body>
<!-- END: Body-->

</html>
