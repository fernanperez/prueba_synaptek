<?php

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.configuraciones');
    })->name('dashboard');
    Route::get('/categoria', function () {
        return view('admin.categoria');
    })->name('categoria');
    Route::get('/categoria', function () {
        return view('admin.blog');
    })->name('blog');
});
