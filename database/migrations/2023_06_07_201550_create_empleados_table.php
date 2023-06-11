<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('empCodigo');
            //Llave foranea
            $table->bigInteger('empArea')->unsigned()->nullable();
            //Estableciendo llave foranea con tabla areas
            $table->foreign('empArea')->references('arCodigo')->on('areas');
            //Llave foranea
            $table->bigInteger('empUser')->unsigned()->nullable();
            //Estableciendo llave foranea con tabla usuarios
            $table->foreign('empUser')->references('id')->on('users');
            //Llave foranea
            $table->bigInteger('empSupervisor')->unsigned()->nullable();
            //Estableciendo llave foranea con tabla supervisores
            $table->foreign('empSupervisor')->references('supCodigo')->on('supervisores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
