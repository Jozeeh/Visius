<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupervisoresSeeder extends Seeder
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
                'supUser'=>'supervisor 1',
                'created_at'=>Carbon::now()
            ],
            [
                'supUser'=>'supervisor 2',
                'created_at'=>Carbon::now()
            ],
            [
                'supUser'=>'supervisor 3',
                'created_at'=>Carbon::now()
            ]
        ];
        DB::table('supervisores')->insert($datos);
    }
}
