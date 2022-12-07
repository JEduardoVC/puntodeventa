<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest{
    public function rules(){
        return [
            'name'=>'required|string|max:50|unique:products,name,'.$this->route("product")->id,
            // 'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'required',
            // 'category_id'=>'required|integer|exists:App\Category,id',
            // 'provider_id'=>'required|integer|exists:App\Provider,id',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se peremite 50 caracteres',
            'name.unique'=>'Ya se tiene registrado',

            // 'image.required'=>'Este campo es requerido',
            // 'image.dimensions'=>'Solo se permiten imagenes de 100x200px',

            'sell_price.required'=>'Este campo es requerido',

            // 'category_id.required'=>'Este campo es requerido',
            // 'category_id.integer'=>'El valor tiene que ser entero',
            // 'category_id.exists'=>'La categoria no existe',

            // 'provider_id.required'=>'Este campo es requerido',
            // 'provider_id.integer'=>'El valor tiene que ser entero',
            // 'provider_id.exists'=>'La categoria no existe',
        ];
    }
}
