<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Services\CarService;
use App\Http\Resources\CarResource;

class CarController extends Controller
{

    protected $service;

    public function __construct(CarService $service) {
        $this->service = $service;
    }

    public function create(CarRequest $request)
    {
        $car = $this->service->createCar($request->validated());

        return new CarResource($car);
    }

    public function list()
    {
        $cars = $this->service->listCars();

        return CarResource::collection($cars);
    }

    public function update(CarRequest $request, $id)
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
