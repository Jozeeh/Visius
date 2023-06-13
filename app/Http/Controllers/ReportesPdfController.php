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
         //Metodo para mostrar reporte de todos los empleados
         public function reporteAdministradoresMostrar(){
            //Obtenemos todos los datos de empleados
            $administradores = Administradores::all();
            $pdf = Pdf::loadView('/reportesPDF/reporteTodosAdministradores', compact('administradores'));
            
            return $pdf->stream('todos-administradores.pdf');
            return view('/reportesPDF/reporteTodosAdministradores');
        }
    
        //Metodo para descargar reporte de todos los empleados
        public function reporteAdministradoresDescargar(){
            //Obtenemos todos los datos de empleados
            $administradores = Administradores::all();
            $pdf = Pdf::loadView('/reportesPDF/reporteTodosAdministradores', compact('administradores'));
            
            return $pdf->download('todos-administradores.pdf');
            return view('/reportesPDF/reporteTodosAdministradores');
        }

        //Metodo para mostrar reporte de todos los supervisores
        public function reporteTareasMostrar(){
            //Obtenemos todos los datos de supervisor
            $tareas = Tareas::select(
                'tareas.tarCodigo',
                'tareas.tarNombre',
                'tareas.tarEstado',
                'tareas.tarFechaAsignada',
                'tareas.tarFechaFinalizada',
                'empleados.empUser as tarNombre'
            )
            ->join('empleados', 'tareas.tarNombre', '=', 'empleados.empUser',);
    
    
            $pdf = Pdf::loadView('/reportesPDF/reporteTodasTareas', compact('tareas'));
    
            return $pdf->stream('todos-tareas.pdf');
            return view('/reportesPDF/reporteTodasTareas');
    
        }
    
        //Metodo para descargar reporte de todos los tareas
        public function reporteTareasDescargar(){
            //Obtenemos todos los datos de tareas
            $tareas = Tareas::select(
                'tareas.tarCodigo',
                'tareas.tarNombre',
                'tareas.tarEstado',
                'tareas.tarFechaAsignada',
                'tareas.tarFechaFinalizada',
                'empleados.empUser as tarNombre'
            )
            ->join('empleados', 'tareas.tarNombre', '=', 'empleados.empUser',)
            ->get();
    
            $pdf = Pdf::loadView('/reportesPDF/reporteTodasTareas', compact('tareas'));
    
            return $pdf->download('todos-tareas.pdf');
            return view('/reportesPDF/reporteTodasTareas');
    
        }
}
