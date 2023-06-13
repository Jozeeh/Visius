<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Areas;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::select(
            "users.id",
            "users.name",
            "users.email",
            "roles.rolNombre",
        )->join("roles", "roles.rolCodigo", "=", "users.userRol")->get();

        return view('/administrador/userShow', ['usuarios' => $usuarios]);
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
    public function edit(User $user)
    {
        $area = Areas::all();
        $empleados = Empleados::select(
            'empleados.empCodigo',
            'empleados.empArea as area',
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
        return view('gestion_usuarios/updateUser')->with(['user'=>$user, 'area'=>$area, 'empleados'=>$empleados]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         //validar campos

         $data = request()->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        //remplazar datos anteriores por los nuevos
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->updated_at = now();

        //Enviar a guardar la actualizacion

        $user->save();

        //redireciona
        return redirect('/gestion-usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar el producto con el id recinido
        User::destroy($id);

        //retorna una respuesta json
        return response()->json(array('res'=>true));
    }
}
