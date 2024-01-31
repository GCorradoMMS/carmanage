<?php

namespace App\Repositories;

use App\Repositories\Contracts\CarRepositoryInterface;
use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;

class CarRepository implements CarRepositoryInterface {
    protected $model;

    public function __construct(Car $model) {
        $this->model = $model;
    }

    public function listCars(): Collection {
        return Car::all();
    }

    public function getCarById(int $id): Car {
        return Car::where('id', '=', $id)->get();
    }

    public function createCar(array $data): Car {
        return $this->model->create($data);
    }

    public function updateCar(int $id, array $data): Car {
        return $this->model->where('id', '=', $id)->update($data);
    }
    
    public function destroyCar(int $id): void {
        $this->model->where('id', '=', $id)->delete();
    }
}