<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/blog-publicado/{ruta?}', function ($ruta = null) {
    if (isset($ruta)) {
        $blog = Blog::where('blogs.slug', $ruta)->where('blogs.estado', 1)
            ->join('categorias as c', 'blogs.categoria_id', '=', 'c.id')
            ->where('c.estado', 1)
            ->first();
        if (!is_null($blog)) {
            return view('publicacion', compact('blog'));
        }
    } else {
        return redirect()->route('homepage');
    }
})->name('publicacion');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.configuraciones');
    })->name('dashboard');

    Route::get('/categoria', function () {
        Auth::user()->rol == 1 ? $vista = view('admin.categoria') : $vista = redirect()->route('dashboard');
        return $vista;
    })->name('categoria');

    Route::get('/blog', function () {
        return view('admin.blog');
    })->name('blog');

    Route::get('/usuarios', function () {
        Auth::user()->rol == 1 ? $vista = view('admin.usuarios') : $vista = redirect()->route('dashboard');
        return $vista;
    })->name('usuarios');
});
