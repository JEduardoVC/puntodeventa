<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {
    public function rules() {
        return [
            'name'=>'required|string|max:250',
            'email'=>'required|email|string|max:200|unique:providers,email,'. $this->route("provider")->id,
            'ruc_name'=>'required|string|min:11|max:11|unique:providers,ruc_name,'. $this->route("provider")->id,
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|min:10|max:10|unique:providers,phone,'. $this->route("provider")->id
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se peremite 250 caracteres',
            'email.required'=>'Este campo es requerido',
            'email.string'=>'El valor no es correcto',
            'email.email'=>'No es un correo electronico',
            'email.max'=>'Solo se permiten 200 caracteres',
            'email.unique'=>'Ya se encuentra registrado',
            'ruc_name.required'=>'Este campo es requerido',
            'ruc_name.string'=>'El valor no es correcto',
            'ruc_name.min'=>'Se requiere de 11 caracteres',
            'ruc_name.max'=>'Solo se permite 11 caracteres',
            'ruc_name.unique'=>'Ya se encuentra registrado',
            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 250 caracteres',
            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.min'=>'Se requiere de 10 caracteres',
            'phone.max'=>'Solo se permite 10 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',
        ];
    }
}
