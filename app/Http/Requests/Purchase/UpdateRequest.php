<?php

namespace App\Http\Requests\Purchase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest{
    public function authorize(){
        return false;
    }
    public function rules(){
        return [
            //
        ];
    }
}
