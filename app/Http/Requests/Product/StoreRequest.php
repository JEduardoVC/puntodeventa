<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules()
    {
        return [
            'name'=>'required|string|max:50|unique:products',
            'sell_price'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se peremite 50 caracteres',
            'name.unique'=>'Ya se tiene registrado',
            'sell_price.required'=>'Este campo es requerido',
        ];
    }
}
