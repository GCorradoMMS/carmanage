<?php

namespace App\Services;

use App\Repositories\UserCarsRepository;

class UserCarsService {

    protected $userCarsRepository;

    public function __construct(UserCarsRepository $userCarsRepository) {
        $this->userCarsRepository = $userCarsRepository;
    }

    public function associateUserToCar(int $userId, int $carId): bool {
        return $this->userCarsRepository->associateUserToCar($userId, $carId);
    }

    public function disassociateUserToCar(int $userId, int $carId): bool {
        return $this->userCarsRepository->disassociateUserToCar($userId, $carId);
    }
    
    public function getUserCars(int $userId) {
        return $this->userCarsRepository->getUserCars($userId);
    }

}