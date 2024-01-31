<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserCarsRepositoryInterface;
use App\Models\UserCar;
use Illuminate\Database\Eloquent\Collection;

class UserCarsRepository implements UserCarsRepositoryInterface {

    protected $model;

    public function __construct(UserCar $model) {
        $this->model = $model;
    }

    public function associateUserToCar(int $userId, int $carId): bool {
        $data = ['user_id' => $userId, 'car_id' => $carId];
        return $this->model->create($data);
    }

    public function disassociateUserToCar(int $userId, int $carId): bool {
        return $this->model->where('user_id', '=', $userId)->where('car_id', '=', $carId);
    }

    public function getUserCars(int $userId): Collection {
        return UserCar::where('user_id', $userId)->with('car')->get();
    }
}