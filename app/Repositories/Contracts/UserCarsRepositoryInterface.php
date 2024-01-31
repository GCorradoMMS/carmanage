<?php

namespace App\Repositories\Contracts;

use App\Models\UserCar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface UserCarsRepositoryInterface
{
    public function associateUserToCar(int $userId, int $carId): UserCar | JsonResponse;
    public function disassociateUserToCar(int $userId, int $carId): void;
    public function getUserCars(int $userId): Collection;
}