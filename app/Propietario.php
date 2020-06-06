<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;   //  importas el trait para trabajar con softdeletes

class Propietario extends Model
{
    //  usamos softDeletes
    use SoftDeletes;

    protected $primaryKey = 'id_prop';
    protected $fillable = ['nom_prop', 'ape_prop', 'direccion_prop', 'fono_prop', 'email_prop'];


    public function pacientes () {
        return $this->hasMany(Paciente::class, 'id_prop');
    }

    public function consultas () {
        return $this->hasMany(Consulta::class, 'id_consulta');
    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', "%$value%");
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', "%$value%");
    }

  
}

