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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id('tarCodigo');
            $table->string('tarNombre');
            $table->string('tarDescripcion');
            $table->string('tarEstado');

            //Llave foranea
            $table->bigInteger('tarEmpleado')->unsigned()->nullable();
            //Estableciendo llave foranea con tabla empleados
            $table->foreign('tarEmpleado')->references('empCodigo')->on('empleados')->onDelete('set null');
            $table->timestamps();

            $table->string('tarFechaAsignada');
            $table->string('tarFechaFinalizada');
            // //Llave foranea
            // $table->bigInteger('tarArea')->unsigned();
            // //Estableciendo llave foranea con tabla areas
            // $table->foreign('tarArea')->references('arCodigo')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
