<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpleadosSeeder extends Seeder
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
                'arNombre'=>'',
                'created_at'=>Carbon::now()
            ],
            [
                'arNombre'=>'',
                'created_at'=>Carbon::now()
            ],
            [
                'arNombre'=>'',
                'created_at'=>Carbon::now()
            ]
        ];
        DB::table('empleados')->insert($datos);
    }
}
