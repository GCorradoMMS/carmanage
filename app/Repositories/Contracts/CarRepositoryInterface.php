<?php

namespace App\Repositories\Contracts;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Collection;

interface CarRepositoryInterface
{
    public function listCars(): Collection;
    public function getCarById(int $id): Car;
    public function createCar(array $data): Car;
    public function updateCar(int $id, array $data): Car;
    public function destroyCar(int $id): void; // delete relationship with user
}