<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Empleados;
use App\Models\Supervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'userRol' => ['required', 'int', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'userRol' => $data['userRol']
        // ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'userRol' => $data['userRol']
        ]);

         // Obtener el ID del usuario creado
        $userId = $user->id;

        // // Insertar el ID en la otra tabla como llave foránea
        // Empleados::create([
        //     'empUser' => $userId,
        //     // Otros campos relacionados
        // ]);

        if ($data['userRol'] == 2) {
            // Insertar el ID en la otra tabla como llave foránea
            Supervisor::create([
                'supUser' => $userId,
                // Otros campos relacionados
            ]);
        }

        if ($data['userRol'] == 3) {
            // Insertar el ID en la otra tabla como llave foránea
            Empleados::create([
                'empUser' => $userId,
                // Otros campos relacionados
            ]);
        }

        return $user;
        
    }

}
