<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id_paciente');

            //Se declara el id del propietario, luegose hace referencia a este mismo, indicando su clave foranea
            $table->unsignedBigInteger('id_prop');
            $table->foreign('id_prop')->references('id_prop')->on('propietarios');
            
            //Informaciónn general
            $table->string('nom_paciente',50);
            $table->string('especie_paciente',30);
            $table->string('sexo_paciente',10);
            $table->integer('edad_paciente');
            $table->string('nro_chip_paciente',250);
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
        Schema::dropIfExists('pacientes');
    }
}
