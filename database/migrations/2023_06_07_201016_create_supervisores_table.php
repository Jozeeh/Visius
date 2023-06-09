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
        Schema::create('supervisores', function (Blueprint $table) {
            $table->id('supCodigo');
            //Llave foranea
            // $table->bigInteger('supArea')->unsigned();
            //Estableciendo llave foranea con tabla areas
            // $table->foreign('supArea')->references('arCodigo')->on('areas');

            //Llave foranea
            $table->bigInteger('supUser')->unsigned();
            //Estableciendo llave foranea con tabla de usuarios
            $table->foreign('supUser')->references('id')->on('users');
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
        Schema::dropIfExists('supervisores');
    }
};
