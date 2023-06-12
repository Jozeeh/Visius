<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadosPdfController extends Controller
{
    public function index()
    {
        //Mostrar listado de empleados
        $empleados = Empleados::select(
            'empleados.empCodigo',
            'users.name AS empName',
            'users.email AS empEmail',
            'areas.arNombre AS empArea',
            'users.id AS empUser',
            'supervisores.supUser AS empSupervisor'
        )
        ->join('users', 'empleados.empUser', '=', 'users.id')
        ->leftJoin('areas', 'empleados.empArea', '=', 'areas.arCodigo')
        ->leftJoin('supervisores', 'empleados.empSupervisor', '=', 'supervisores.supCodigo')
        ->where(function ($query) {
            $query->whereNull('areas.arNombre')
                ->orWhere('areas.arNombre', '<>', '');
        })
        ->get();
        
        return view('/reportesPDF/reportesEmpleados', ['empleados'=>$empleados]);
    }
    
}
