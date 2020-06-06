<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //  para poder utilizar el form request debemos autorizar su uso
    //  para ello cambiamos el valor de retorno a true
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //  Creamos nuestras reglas de validación las que serán aplicadas al request de nuestro formulario
    public function rules()
    {
        return [
            'nom_paciente'          =>  'required',
            'especie_paciente'      =>  'required',
            'sexo_paciente'         =>  'required',
            'edad_paciente'         =>  'required|date',
            'nro_chip_paciente'     =>  'required|min:5',
            'nom_prop'              =>  'required',
            'ape_prop'              =>  'required',
            'direccion_prop'        =>  'required',
            'fono_prop'             =>  'required|min:8|max:10',
            'email_prop'            =>  'required|email',
            'peso_paciente'         =>  'required|numeric|min:0',
            'temperatura_paciente'  =>  'required|numeric|min:0',
            'desc_consulta'         =>  'required|min:5|max:300'
        ];
    }

    //  los mensajes personalizados se pueden establecer en este método
    public function messages () {
        return [
            'nom_paciente.required'         =>  'El :attribute es obligatorio', //  :attribute pondrá el nombre del atributo
            'especie_paciente.required'     =>  'La :attribute es obligatoria',
            'sexo_paciente.required'        =>  'El :attribute es obligatorio',
            'edad_paciente.required'        =>  'La :attribute es obligatoria',
            'edad_paciente.date'            =>  'El formato debe ser una fecha válida',
            'nro_chip_paciente.required'    =>  ':attribute es obligatorio',
            'nro_chip_paciente.min'         =>  ':attribute debe tener un mínimo de :min',
            'nom_prop.required'             =>  'El :attribute es obligatorio',
            'ape_prop.required'             =>  'El :attribute es obligatorio',
            'direccion_prop.required'       =>  'La :attribute es obligatoria',
            'fono_prop.required'            =>  'El :attribute es obligatorio',
            'fono_prop.min'                 =>  'El :attribute debe tener un mínimo de :min dígitos',
            'fono_prop.max'                 =>  'El :attribute debe tener un máximo de :max dígitos',
            'email_prop.required'           =>  'El :attribute es obligatorio',
            'email_prop.email'              =>  'El formato del :attribute no es válido',
            'peso_paciente.required'        =>  'El :attribute es obligatorio',
            'peso_paciente.numeric'         =>  'El formato de :attribute debe ser numérico',
            'peso_paciente.min'             =>  'El :attribute debe ser mayor o igual a :min',
            'temperatura_paciente.required' =>  'La :attribute es obligatoria',
            'temperatura_paciente.min'      =>  'La :attribute debe ser mayor o igual a :min',
            'temperatura_paciente.numeric'  =>  'El formato de :attribute debe ser numérico',
            'desc_consulta.required'        =>  'La :attribute es obligatoria',
            'desc_consulta.min'             =>  'La :attribute debe ser mayor o igual a :min caracteres',
            'desc_consulta.max'             =>  'La :attribute no debe ser mayor a :max caracteres'
        ];
    }

    //  si deseas personalizar el nombre de un atributo lo puedes realizar desde aquí
    public function attributes () {
        return [
            'nom_paciente'          =>  'nombre paciente',
            'especie_paciente'      =>  'especie del paciente',
            'sexo_paciente'         =>  'sexo del paciente',
            'edad_paciente'         =>  'edad del paciente',
            'nro_chip_paciente'     =>  'N° chip del paciente',
            'nom_prop'              =>  'nombre propietario',
            'ape_prop'              =>  'apellido propietario',
            'direccion_prop'        =>  'direccion propietario',
            'fono_prop'             =>  'fono propietario',
            'email_prop'            =>  'email propietario',
            'peso_paciente'         =>  'peso paciente',
            'temperatura_paciente'  =>  'temperatura paciente',
            'desc_consulta'         =>  'descripción de la consulta'
        ];
    }
}
