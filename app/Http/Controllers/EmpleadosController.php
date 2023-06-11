<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Areas;
use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //Obtenemos datos de empleados registrados con los datos de las tablas areas, users y supervisores
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

        return view('/administrador/empShow', ['empleados'=>$empleados]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Empleados $selEmpleado)
    {
        
        //Obtenemos datos de la tabla de areas
        $areas = Areas::all();
        //Obtenemos datos de la tabla users
        $users = User::all();

        return view('/administrador/empUpdate', ['selEmpleado'=>$selEmpleado,'areas'=>$areas, 'users'=>$users]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleados $selEmpleado)
    {
        //Validamos dato ingresado de area
        $datos = request()->validate([
            'empArea'=>'required'
        ]);

        //Ingresamos el área
        $selEmpleado->empArea = $datos['empArea'];
        $selEmpleado->updated_at = now();

        $selEmpleado->save();

        return redirect('/gestion-empleados');

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
