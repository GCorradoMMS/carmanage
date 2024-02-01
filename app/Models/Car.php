<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserCar;
use App\Traits\CascadingSoftDelete;

class Car extends Model
{
    use HasFactory, SoftDeletes, CascadingSoftDelete;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'model',
        'year'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function userCars()
    {
        return $this->hasMany(UserCar::class, 'car_id');
    }
}
