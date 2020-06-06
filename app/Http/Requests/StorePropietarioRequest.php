<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropietarioRequest extends FormRequest
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
            'nom_prop'              =>  'required',
            'ape_prop'              =>  'required',
            'direccion_prop'        =>  'required',
            'fono_prop'             =>  'required|min:8|max:10',
            'email_prop'            =>  'required|email',
        ];
    }

    public function messages () {
        return [
            'nom_prop.required'             =>  'El :attribute es obligatorio',
            'ape_prop.required'             =>  'El :attribute es obligatorio',
            'direccion_prop.required'       =>  'La :attribute es obligatoria',
            'fono_prop.required'            =>  'El :attribute es obligatorio',
            'fono_prop.min'                 =>  'El :attribute debe tener un mínimo de :min dígitos',
            'fono_prop.max'                 =>  'El :attribute debe tener un máximo de :max dígitos',
            'email_prop.required'           =>  'El :attribute es obligatorio',
            'email_prop.email'              =>  'El formato del :attribute no es válido',
        ];
    }

    public function attributes () {
        return [
            'nom_prop'              =>  'nombre propietario',
            'ape_prop'              =>  'apellido propietario',
            'direccion_prop'        =>  'direccion propietario',
            'fono_prop'             =>  'fono propietario',
            'email_prop'            =>  'email propietario',
        ];
    }
}
