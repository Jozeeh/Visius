<?php

namespace App\Http\Controllers;
use App\Models\Areas;
use App\Models\Tareas;
use App\Models\Empleados;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\Administradores;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ReportesPdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        //obtenemos valores de la tabla áreas
        $areas = Areas::all();

        //obtenemos valores de la tabla tareas
        $tareasPorEmpleados = Empleados::select(
            'empleados.empCodigo', 
            'empleados.empUser', 
            'users.name as empName'
        )
        ->leftJoin('users', 'empleados.empUser', '=', 'users.id')
        ->get();
        
        return view('/reportesPDF/reportes', ['areas'=>$areas, 'tareasPorEmpleados'=>$tareasPorEmpleados]);
    }


    //Metodo para descargar reporte de todos los empleados
    public function reporteEmpleadosDescargar(){
        //Obtenemos datos de empleados registrados
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
        
        $pdf = Pdf::loadView('/reportesPDF/reporteTodosEmpleados', compact('empleados'));
        
        return $pdf->download('todos-empleados.pdf');
    }


     //Metodo para mostrar reporte de todos los empleados
    public function reporteEmpleadosMostrar(){
        
        //Obtenemos datos de empleados registrados
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

        $pdf = Pdf::loadView('/reportesPDF/reporteTodosEmpleados', compact('empleados'));
        
        return $pdf->stream('todos-empleados.pdf');
    }

    public function reporteEmpleadosArea(Request $request){

        //Guardamos ID obtenido del área
        $idEmpleadosArea = $request->input('selectEmpleadosArea');

        //Obtenemos datos de empleados registrados con el área
        $empleadosArea = Empleados::select(
        'empleados.empCodigo', 
        'users.name AS empName', 
        'users.email AS empEmail', 
        'areas.arNombre AS empNombreArea', 
        'users.id AS empUser', 
        'supervisores.supUser AS empSupervisor')
        ->join('users', 'empleados.empUser', '=', 'users.id')
        ->leftJoin('areas', 'empleados.empArea', '=', 'areas.arCodigo')
        ->leftJoin('supervisores', 'empleados.empSupervisor', '=', 'supervisores.supCodigo')
        ->where(function ($query) {
            $query->whereNull('areas.arNombre')
                ->orWhere('areas.arNombre', '<>', '');
        })
        ->where('areas.arCodigo', '=', $idEmpleadosArea)
        ->get();

        $pdf = Pdf::loadView('/reportesPDF/reportesEmpleadosArea', compact('empleadosArea'));
        return $pdf->stream('reporte-empleados-area');

    }

    public function reporteTareasEmpleados(Request $request){

        //Guardamos ID obtenido del empleado para mostrar las tareas que le pertenecen
        $idTareasEmpleados = $request->input('selectTareasEmpleados');
        
        $tareasEmpleados = Tareas::select(
            'tareas.tarCodigo', 
            'tareas.tarNombre', 
            'tareas.tarDescripcion', 
            'tareas.tarEstado', 
            'empleados.empUser as tarEmpleado', 
            'users.name as tarNombreEmpleado'
        )
        ->leftJoin('empleados', 'tareas.tarEmpleado', '=', 'empleados.empCodigo')
        ->leftJoin('users', 'empleados.empUser', '=', 'users.id')
        ->where('tareas.tarEmpleado', '=', $idTareasEmpleados)
        ->get();

        $pdf = Pdf::loadView('/reportesPDF/reportesTareasEmpleados', compact('tareasEmpleados'));
        return $pdf->stream('reporte-tareas-empleados');

    }

    public function reporteEstadoTareasArea(Request $request){

        //Guardamos ID obtenido del empleado para mostrar las tareas que le pertenecen
        $idArea = $request->input('selectArea');

        $tareasArea = Tareas::select(
            'tareas.tarCodigo',
            'tareas.tarNombre',
            'tareas.tarDescripcion',
            'tareas.tarEstado',
            'areas.arNombre'
        )
        ->join('empleados', 'tareas.tarEmpleado', '=', 'empleados.empCodigo')
        ->join('areas', 'empleados.empArea', '=', 'areas.arCodigo')
        // ->join('empleados', 'tareas.tarEmpleado', '=', 'tareas.tarEstado')
        // ->join('areas', 'empleados.empArea', '=', 'areas.arCodigo')
        ->where('areas.arCodigo', '=', $idArea)
        ->get();

        $pdf = Pdf::loadView('/reportesPDF/reportesTareasArea', compact('tareasArea'));
        return $pdf->stream('reporte-tareas-area.pdf');

    }

}
