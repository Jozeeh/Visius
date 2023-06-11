<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Administradores;
use App\Http\Controllers\Controller;

class AdministradoresController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //Mostrar listado de administradores
                $administradores = Administradores::select(
                    'empleados.empCodigo',
                    'users.name as empUser',
                    'areas.arNombre as empArea'
                )
                ->join('areas', 'empleados.empArea', '=', 'areas.arNombre',)
                ->leftjoin('users', 'empleados.empUser', '=', 'users.name')
                ->get();
                return view('/reportesPDF/reportesAdministradores')->with(['administradores' => $administradores]);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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