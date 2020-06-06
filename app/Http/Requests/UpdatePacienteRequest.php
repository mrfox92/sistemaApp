<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom_paciente'          =>  'required',
            'especie_paciente'      =>  'required',
            'sexo_paciente'         =>  'required',
            'nro_chip_paciente'     =>  'required|min:5',
        ];
    }

    public function messages () {

        return [
            'nom_paciente.required'         =>  'El :attribute es obligatorio', //  :attribute pondrá el nombre del atributo
            'especie_paciente.required'     =>  'La :attribute es obligatoria',
            'sexo_paciente.required'        =>  'El :attribute es obligatorio',
            'nro_chip_paciente.required'    =>  ':attribute es obligatorio',
            'nro_chip_paciente.min'         =>  ':attribute debe tener un mínimo de :min',
        ];
    }

    public function attributes () {
        return [
            'nom_paciente'          =>  'nombre paciente',
            'especie_paciente'      =>  'especie del paciente',
            'sexo_paciente'         =>  'sexo del paciente',
            'nro_chip_paciente'     =>  'N° chip del paciente',
        ];
    }
}
