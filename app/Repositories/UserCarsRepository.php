<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserCarsRepositoryInterface;
use App\Models\UserCar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class UserCarsRepository implements UserCarsRepositoryInterface
{

    protected $model;

    public function __construct(UserCar $model)
    {
        $this->model = $model;
    }

    public function associateUserToCar(int $userId, int $carId): UserCar | JsonResponse
    {
        if ($this->haveUniqueUserCarRelation($userId, $carId)) {
            return new JsonResponse(['error' => 'Relation already exists'], 422);
        }

        $data = ['user_id' => $userId, 'car_id' => $carId];
        return $this->model->create($data);
    }

    public function disassociateUserToCar(int $userId, int $carId): void
    {
        $relation = $this->model->where('user_id', '=', $userId)->where('car_id', '=', $carId);
        $relation->delete();
    }

    protected function haveUniqueUserCarRelation(int $userId, int $carId): bool
    {
        if ($this->model->where('user_id', $userId)
            ->where('car_id', $carId)
            ->exists()
        ) {
            return true;
        }
        return false;
    }
}
