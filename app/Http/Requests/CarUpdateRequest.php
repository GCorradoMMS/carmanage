<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand' => 'string|max:255',
            'model' => 'string|max:255',
            'year' => 'integer|min:1900',
        ];
    }
}
