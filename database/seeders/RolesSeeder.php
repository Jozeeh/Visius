<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
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
                'rolNombre'=>'Administrador',
                'created_at'=>Carbon::now()
            ],
            [
                'rolNombre'=>'Supervisor',
                'created_at'=>Carbon::now()
            ],
            [
                'rolNombre'=>'Empleado',
                'created_at'=>Carbon::now()
            ]
        ];
        DB::table('roles')->insert($datos);
    }
}
