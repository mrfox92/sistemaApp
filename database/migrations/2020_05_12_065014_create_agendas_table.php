<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id_agendas');
   
            // Primero se declara el id del propietario, luego se hace referencia al mismo, indicando su clave foranea
            $table->unsignedBigInteger('id_prop');            
            $table->foreign('id_prop')->references('id_prop')->on('propietarios'); 
   
            // Primero se declara el id del paciente, luego se hace referencia al mismo, indicando su clave foranea
            $table->unsignedBigInteger('id_paciente');	
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes'); 
            
            //Informaciónn general
            $table->timestamp('fecha_hora_agenda',0);
            $table->text('observacion_agenda');
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
        Schema::dropIfExists('agendas');
    }
}
