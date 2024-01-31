<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserCarsRepositoryInterface
{
    public function associateUserToCar(int $userId, int $carId): bool;
    public function disassociateUserToCar(int $userId, int $carId): bool;
    public function getUserCars(int $userId): Collection;
}