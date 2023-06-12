<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Areas;
use App\Models\Tareas;
use App\Models\Empleados;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tareas = Tareas::select(
            'tareas.tarCodigo',
            'tareas.tarNombre',
            'tareas.tarDescripcion',
            'tareas.tarEstado',
            'empleados.empUser as tarIdUserEmpleado',
            'users.name as tarEmpleado',
        )
        ->leftJoin('empleados', 'tareas.tarEmpleado', '=', 'empleados.empCodigo')
        ->leftJoin('users', 'empleados.empUser', '=', 'users.id')
        ->where(function($query) {
            $query->whereNull('tarEmpleado')
                ->orWhere('tarEmpleado', '<>', '');
        })
        ->get();
        
        return view('/tareas/read', ['tareas'=>$tareas]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $areas = Areas::all();
        // return view('/administrador/createTarea', ['areas'=>$areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'tarNombre'=>'required',
            'tarDescripcion'=>'required',
        ]);

        $data['tarEstado'] = 'Creada';
        $data['tarFechaAsignada'] = 'Null';
        $data['tarFechaFinalizada'] = 'Null';


        // Emviar insert
        Tareas::create($data);

        //Redireccionar
        return redirect('/tareas/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tareas $selTarea)
    {

        $empleados = Empleados::all();
        
        $users = User::select()
        ->where('userRol', '=', 3)
        ->get();

        $supervisores = User::select(
            'users.id',
            'users.name',
            'supervisores.supCodigo',
            'supervisores.supUser'
        )->join('supervisores', 'supervisores.supUser', '=', 'users.id')->get();

        return view('/tareas/asignarTarea', ['selTarea'=>$selTarea, 'empleados'=>$empleados, 'users'=>$users, 'supervisores' =>$supervisores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tareas $selTarea)
    {
        
        //Validamos datos
        $datos = request()->validate([
            'tarEmpleado' => 'required'
        ]);

        //Reemplazamos datos por nuevos
        $selTarea->tarEstado = 'Asignada';
        $selTarea->tarEmpleado = $datos['tarEmpleado'];
        $selTarea->tarFechaAsignada = Carbon::now();

        //Guardamos
        $selTarea->save();

        return redirect('/tareas/show');

    }

    // funion para indicar que la tarea va a revision
    public function revision(Tareas $selTarea){
        
        $selTarea->tarEstado = 'Revision';

        $selTarea->save();
        return redirect('/tareas/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
