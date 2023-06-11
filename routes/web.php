<?php
use App\Models\Administradores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\TareasPdfController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ReportesPdfController;
use App\Http\Controllers\AdministradoresController;

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

/////////////////////////////
//      ADMINISTRADOR      //
/////////////////////////////

//Rutas para administrador
Route::get('/administrador/empShow', function () {
    return view('/administrador/empShow');     //Mostrar empleados registrados
});
    // [Vista de usuarios registrados]
Route::get('/administrador/userShow', function () {
    return view('/administrador/userShow');     //Mostrar usuarios registrados
});

Route::get('/administrador/userCreate', [RolesController::class, 'index']);

//////////////////////
//      TAREAS      //
//////////////////////

    // [VISTA CREAR TAREAS]
Route::get('/CreateTareas', [TareasController::class, 'create']);

    // [RUTA CREAR TAREAS]
Route::post('/tareas/store', [TareasController::class, 'store']);

Route::get('/tareas/show', [TareasController::class, 'index']);

// [ Empleados-PDF ]
        //(Todos los empleados)
        Route::get('/reporte-empleados', [ReportesPdfController::class, 'reporteEmpleadosMostrar']);
        Route::get('/reporte-empleadosDescargar', [ReportesPdfController::class, 'reporteEmpleadosDescargar']);
        
        // [ supervisores-PDF ]
                //(Todos los supervisores)
        Route::get('/reporte-supervisores', [ReportesPdfController::class, 'reporteSupervisoresMostrar']);
        Route::get('/reporte-supervisoresDescargar', [ReportesPdfController::class, 'reporteSupervisoresDescargar']);
        
        // [ administradores-PDF ]
                //(Todos los administradores)
        Route::get('/reporte-administradores', [ReportesPdfController::class, 'reporteAdministradoresMostrar']);
        Route::get('/reporte-administradoresDescargar', [ReportesPdfController::class, 'reporteAdministradoresDescargar']);

        Route::get('/reporte-tareas', [ReportesPdfController::class, 'reporteTareasMostrar']);
        Route::get('/reporte-tareasDescargar', [ReportesPdfController::class, 'reporteTareasDescargar']);


Route::get('/reportesPDF/reportesEmpleados', [EmpleadosController::class, 'index'])->middleware('auth');
Route::get('/reportesPDF/reportesSupervisores', [SupervisorController::class, 'index'])->middleware('auth');
Route::get('/reportesPDF/reportesAdministradores', [AdministradoresController::class, 'index'])->middleware('auth');
Route::get('/reportesPDF/reportesTareas', [TareasPdfController::class, 'index'])->middleware('auth');

Route::get('/reports', function () {
    return view('reportesPDF/reportes');
});