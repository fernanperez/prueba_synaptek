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
                                <x-jet-validation-errors class="mb-4" />
                                @if (session('status'))
                                    <div class="mb-1 px-1 py-1 alert alert-success text-sm alert-dismissible fade show"
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

                                <p class="card-text mb-2 text-sm text-justify">
                                    {{ __('¿Ha olvidado su contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos por correo electrónico un enlace de restablecimiento de contraseña que le permitirá elegir uno nuevo.') }}
                                </p>

                                <form class="auth-login-form mt-2" method="POST"
                                    action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="block w-full" type="email" name="email"
                                            :value="old('email')" required autofocus />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="btn btn-block btn-secondary">
                                            {{ __('Enlace de Restablecimiento') }}
                                        </x-jet-button>
                                    </div>
                                </form>
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
