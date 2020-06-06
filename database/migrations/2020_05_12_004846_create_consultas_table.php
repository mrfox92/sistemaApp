<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            
            $table->bigIncrements('id_consulta');

            //Se declara el id del propietario, luegose hace referencia a este mismo, indicando su clave foranea
            $table->unsignedBigInteger('id_prop');
            $table->foreign('id_prop')->references('id_prop')->on('propietarios'); 

           //Se declara el id del paciente, luegose hace referencia a este mismo, indicando su clave foranea
            $table->unsignedBigInteger('id_paciente');	
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes');
 
            //Informaciónn general
            $table->string('desc_consulta');
            $table->integer('peso_paciente');
            $table->string('temperatura_paciente');
            $table->text('observacion_pacientes');
            $table->timestamp('fecha_hora_consulta', 0);
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
        Schema::dropIfExists('consultas');
    }
}
