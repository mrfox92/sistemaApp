<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $primaryKey = 'id_paciente';
    //  importante definir los campos para asignación masiva
    protected $fillable = ['id_prop', 'nom_paciente', 'especie_paciente', 'sexo_paciente', 'nro_chip_paciente'];


    //Relaciones
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_prop');
    }

    public function consultas(){
        return $this->hasMany(Consulta::class, 'id_consulta')->select('id_consulta', 'id_prop', 'id_paciente', 'desc_consulta');

    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', "%$value%");
    }
   
}
