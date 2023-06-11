<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ReportesPdfController extends Controller
{
     //Metodo para mostrar reporte de todos los empleados
    public function reporteEmpleadosMostrar(){
        //Obtenemos todos los datos de empleados
        $empleados = Empleados::all();
        $pdf = Pdf::loadView('/reportesPDF/reporteTodosEmpleados', compact('empleados'));
        
        return $pdf->stream('todos-empleados.pdf');
        return view('/reportesPDF/reporteTodosEmpleados');
    }

    //Metodo para descargar reporte de todos los empleados
    public function reporteEmpleadosDescargar(){
        //Obtenemos todos los datos de empleados
        $empleados = Empleados::all();
        $pdf = Pdf::loadView('/reportesPDF/reporteTodosEmpleados', compact('empleados'));
        
        return $pdf->download('todos-empleados.pdf');
        return view('/reportesPDF/reporteTodosEmpleados');
    }

    //Metodo para mostrar reporte de todos los supervisores
    public function reporteSupervisoresMostrar(){
        //Obtenemos todos los datos de supervisor
        $supervisores = Supervisor::select(
            'supervisores.supCodigo',
            'supervisores.supUser as users',
        )
        ->join('supervisores', 'supervisores.supUser', '=', 'users.id');


        $pdf = Pdf::loadView('/reportesPDF/reporteTodosSupervisores', compact('supervisores'));

        return $pdf->stream('todos-supervisores.pdf');
        return view('/reportesPDF/reporteTodosSupervisores');

    }

    //Metodo para descargar reporte de todos los supervisores
    public function reporteSupervisoresDescargar(){
        //Obtenemos todos los datos de supervisores
        $supervisores = supervisor::select(
            'supervisores.supCodigo',
            'supervisores.supNombre',
            'supervisores.supUser',
            'supervisores.empNombre as empleados'
        )
        ->join('empleados', 'supervisores.supEmpleados', '=', 'empleados.empCodigo')
        ->get();

        $pdf = Pdf::loadView('/reportesPDF/reporteTodosSupervisores', compact('supervisores'));

        return $pdf->download('todos-supervisores.pdf');
        return view('/reportesPDF/reporteTodosSupervisores');

    }
}
