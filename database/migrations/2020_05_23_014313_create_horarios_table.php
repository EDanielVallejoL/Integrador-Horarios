<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombreCarrera');
            $table->string('Opcion');
            $table->string('NombreMateria');
            $table->string('Profesor');
            $table->string('Hora');
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
        Schema::dropIfExists('horarios');
    }
}
