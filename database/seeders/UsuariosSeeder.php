<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datos = [
        [
            'name' => 'Administrador',
            'email' => 'administrador@visius.com',
            'password' => Hash::make('administrador'),
            'userRol' => '1',
            'created_at'=>Carbon::now()
        ],
        [
            'name' => 'Nicolas Francisco Martinez Argeta',
            'email' => 'nicolas_martinez@visius.com',
            'password' => Hash::make('nicolas123'),
            'userRol' => '2',
            'created_at'=>Carbon::now()
        ],
        [
            'name' => 'Matias Manuel Hernandez Marroquin',
            'email' => 'matias_hernandez@gvisius.com',
            'password' => Hash::make('administrador'),
            'userRol' => '3',
            'created_at'=>Carbon::now()
        ],

        ];
        DB::table('users')->insert($datos);
    }
}
