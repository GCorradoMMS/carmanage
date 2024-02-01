<?php

namespace App\Http\Controllers;

use App\Services\UserCarsService;
use App\Http\Requests\UserCarRequest;

class UserCarController extends Controller
{

    protected $service;

    public function __construct(UserCarsService $service)
    {
        $this->service = $service;
    }

    public function associate(UserCarRequest $request)
    {
        $this->service->associateUserToCar(
            $request->input('userId'),
            $request->input('carId'),
        );

        return response()->json(['message' => 'User associated with car successfully']);
    }

    public function disassociate(UserCarRequest $request)
    {
        $this->service->disassociateUserToCar(
            $request->input('userId'),
            $request->input('carId')
        );

        return response()->json(['message' => 'User disassociated from car successfully']);
    }
}
