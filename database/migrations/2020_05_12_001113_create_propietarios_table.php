<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->bigIncrements('id_prop');
            
            //Informaciónn general
            $table->string('nom_prop',50);
            $table->string('ape_prop',50);
            $table->string('direccion_prop',150);
            $table->string('fono_prop',20);
            $table->string('email_prop',50);
            $table->timestamps();
            $table->softDeletes();  //  para implementar el borrado lógico de datos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propietarios');
    }
}
