<x-guest-layout>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper img-fondo">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0" id="card-login">
                            <div class="card-body">
                                {{-- <x-jet-validation-errors class="mb-4" /> --}}
                                @if (session('status'))
                                    <div class="mb-1 px-1 py-1 alert alert-danger text-sm alert-dismissible fade show"
                                        role="alert">
                                        <strong>{!! session('status') !!}</strong>
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                @endif
                                <a href="{{ route('homepage') }}">
                                    <img class="img-fluid mx-auto d-block pb-2"
                                        src="{{ asset('img/Logo-dentos.png') }}" alt="logo.png">
                                </a>

                                <h4 class="card-title mb-1 text-center font-weight-bolder text-indigo-900">Bienvenidos
                                    👋</h4>
                                <p class="card-text mb-2 text-center"><strong>Inicio de sesión</strong>
                                </p>

                                <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input type="text" id="email" class="form-control" name="email"
                                            :value="old('email')" required autofocus placeholder="123456789"
                                            aria-describedby="identificacion" tabindex="1" />
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-indigo-900 hover:text-gray-900"
                                                    href="{{ route('password.request') }}">
                                                    <small>{{ __('Olvidó su contraseña?') }}</small>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <x-jet-input id="password" class="form-control form-control-merge"
                                                tabindex="2" type="password" name="password" required
                                                autocomplete="current-password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="">
                                            <label for="remember_me" class="flex items-center">
                                                <x-jet-checkbox id="remember_me" class="w-5 h-5 m-0" height="1rem"
                                                    name="remember" tabindex="3" />
                                                <span class="pl-1 "
                                                    style="color: black;">{{ __('Recordar contraseña') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <x-jet-button class="btn btn-block btn-warning " tabindex="4">
                                        {{ __('Iniciar Sesión') }}
                                    </x-jet-button>
                                </form>
                            </div>
                            <div class="text-center pb-2">
                                <a href="{{ route('register') }}"><strong>No tienes cuenta, registrate!</strong></a>
                            </div>
                        </div>
                        <!-- /Login v1 -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <!-- END: Content-->
</x-guest-layout>
