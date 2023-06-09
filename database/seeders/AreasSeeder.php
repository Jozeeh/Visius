<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreasSeeder extends Seeder
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
                'arNombre'=>'Contabilidad',
                'created_at'=>Carbon::now()
            ],
            [
                'arNombre'=>'Recursos Humanos',
                'created_at'=>Carbon::now()
            ],
            [
                'arNombre'=>'Soporte Ténico',
                'created_at'=>Carbon::now()
            ]
        ];
        DB::table('areas')->insert($datos);
    }
}
