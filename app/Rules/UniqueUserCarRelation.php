<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\UserCar;

class UniqueUserCarRelation implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (UserCar::where('user_id', $value['userId'])
                   ->where('car_id', $value['carId'])
                   ->exists()) {
            $fail('Already exists');
        }
    }
}
