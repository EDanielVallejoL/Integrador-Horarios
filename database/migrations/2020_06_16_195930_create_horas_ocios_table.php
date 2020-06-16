<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasOciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_ocios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('opcion');
            $table->string('carrera');
            $table->string('hrsOcioTotales');
            $table->string('Lunes');
            $table->string('Martes');
            $table->string('Miercoles');
            $table->string('Jueves');
            $table->string('Viernes');
            $table->string('Sabado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horas_ocios');
    }
}
