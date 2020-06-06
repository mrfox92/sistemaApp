<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    protected $primaryKey = 'id_consulta';


    protected $fillable = ['id_prop', 'id_paciente', 'desc_consulta'];

    //Relaciones
    public function propietario(){

        return $this->belongsTo(Propietario::class, 'id_prop');

    }

    public function paciente(){

        return $this->belongsTo(Paciente::class, 'id_paciente');

    }
  



}
