<?php

namespace App\Services;

use App\Repositories\CarRepository;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarService {

    protected $carRepository;

    public function __construct(carRepository $carRepository) {
        $this->carRepository = $carRepository;
    }
    
    public function listCars(): Collection {
        return $this->carRepository->listCars();
    }

    public function getCarById(int $id): Car {
        return $this->carRepository->getCarById($id);
    }

    public function createCar(array $data): Car {
        return $this->carRepository->createCar($data);
    }

    public function updateCar(int $id, array $data): Car {
        return $this->carRepository->updateCar($id, $data);
    }
    
    public function destroyCar(int $id): void {
        $this->carRepository->destroyCar($id);
    }

}