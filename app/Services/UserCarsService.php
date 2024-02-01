<?php

namespace App\Services;

use App\Models\UserCar;
use App\Repositories\UserCarsRepository;
use Illuminate\Http\JsonResponse;

class UserCarsService
{

    protected $userCarsRepository;

    public function __construct(UserCarsRepository $userCarsRepository)
    {
        $this->userCarsRepository = $userCarsRepository;
    }

    public function associateUserToCar(int $userId, int $carId): UserCar | JsonResponse
    {
        return $this->userCarsRepository->associateUserToCar($userId, $carId);
    }

    public function disassociateUserToCar(int $userId, int $carId): void
    {
        $this->userCarsRepository->disassociateUserToCar($userId, $carId);
    }
}
