<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Http\Resources\CarResource;
use App\Services\CarService;

class CarController extends Controller
{
    protected $service;

    public function __construct(CarService $service) {
        $this->service = $service;
    }

    public function index()
    {
        $cars = $this->service->listCars();

        return CarResource::collection($cars);
    }

    public function show(int $id)
    {
        return $this->service->getCarById($id);
    }

    public function store(CarRequest $request)
    {
        $car = $this->service->storeCar($request->validated());

        return $car;
    }


    public function update(CarUpdateRequest $request, $id)
    {
        $car = $this->service->updateCar($id, $request->validated());

        return new CarResource($car);
    }

    public function destroy($id)
    {
        $this->service->destroyCar($id);

        return response()->json(['message' => 'Car deleted successfully']);
    }
}
