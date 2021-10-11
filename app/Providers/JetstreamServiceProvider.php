<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('users.email', $request->email)
                ->first();

            if (!empty($user)) {
                if ($user->estado == 0) {
                    $request->session()->flash('status', 'El usuario esta inhabilitado, contacte con su administrador');
                    return false;
                } elseif ($user->estado == 1 && Hash::check($request->password, $user->password)) {
                    return $user;
                } else {
                    $request->session()->flash('status', 'Contraseña erronea');
                    return false;
                }
            } else {
                $request->session()->flash('status', 'Usuario No existe');
                return false;
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
