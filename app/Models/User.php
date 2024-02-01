<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserCar;
use App\Traits\CascadingSoftDelete;

class User extends Model
{
    use HasFactory, SoftDeletes, CascadingSoftDelete;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'deleted_at'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function userCars()
    {
        return $this->hasMany(UserCar::class, 'user_id');
    }
}
