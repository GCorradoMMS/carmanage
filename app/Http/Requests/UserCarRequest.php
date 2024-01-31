<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'userId' => 'required|integer|exists:users,id',
            'carId' => 'required|integer|exists:cars,id',
        ];
    }
}
