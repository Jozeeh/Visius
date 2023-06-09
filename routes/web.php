<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Ruta pantalla de inicio
Route::get('/home', function () {
    return view('layouts/app');
});

//Ruta para crear usuarios desde administrador
Route::get('/registro_usuarios', function () {
    return view('gestion_usuarios/registrosUsuarios');
});

//Rutas para loging
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para supervisor
Route::get('/supervisor/empShow', function () {
    return view('/supervisor/empShow');
});

Route::get('/supervisor/empCreate', function () {
    return view('/supervisor/empCreate');
});