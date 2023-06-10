<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TareasController;

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

//Rutas para loging
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para administrador
Route::get('/administrador/empShow', function () {
    return view('/administrador/empShow');     //Mostrar empleados registrados
});

Route::get('/administrador/userShow', function () {
    return view('/administrador/userShow');     //Mostrar usuarios registrados
});

Route::get('/administrador/userCreate', [RolesController::class, 'index']);

Route::get('/CreateTareas', [TareasController::class, 'create']);

Route::post('/tareas/store', [TareasController::class, 'store']);

Route::get('/tareas/show', [TareasController::class, 'index']);

