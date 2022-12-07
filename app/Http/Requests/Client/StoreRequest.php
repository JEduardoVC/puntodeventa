<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'string|required|max:255',
            'dni'=>'string|required|min:8|max:8|unique:clients',
            'ruc'=>'string|min:11|max:11|unique:clients',
            'address'=>'string|max:255|',
            'phone'=>'string|required|min:10|max:10|unique:clients',
            'email'=>'string|email:rfc,dns|max:255|unique:clients',
        ];
    }

    public function messages(){
        return[
            'name.string'=>'El valor no es correcto',
            'name.required'=>'Este campo es requerido',
            'name.max'=>'Solo se permite 255 caracteres',

            'dni.string'=>'El valor no es correcto',
            'dni.required'=>'Este campo es requerido',
            'dni.max'=>'Solo se permite 8 caracteres',
            'dni.unique'=>'Ya se tiene registrado',
            'dni.min'=>'Se requiere de minimo 8 caracteres',

            'ruc.string'=>'El valor no es correcto',
            'ruc.max'=>'Solo se permite 11 caracteres',
            'ruc.unique'=>'Ya se tiene registrado',
            'ruc.min'=>'Se requiere de minimo 11 caracteres',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 255 caracteres',

            'phone.string'=>'El valor no es correcto',
            'phone.required'=>'Este campo es requerido',
            'phone.max'=>'Solo se permite 10 caracteres',
            'phone.unique'=>'Ya se tiene registrado',
            'phone.min'=>'Se requiere de minimo 10 caracteres',

            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 250 caracteres',
            'email.unique'=>'Ya se tiene registrado',
            'email.email'=>'No es un correo electronico',

        ];
    }
}
