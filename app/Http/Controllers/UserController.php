<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->service->listUsers();

        return UserResource::collection($users);
    }

    public function show(int $id)
    {
        return response()->json(['data' => $this->service->getUserById($id)], 200);
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->storeUser($request->validated());

        return response()->json(['data' => $user], 200);
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = $this->service->updateUser($id, $request->validated());

        return response()->json([ 'data' => new UserResource($user)], 200);
    }

    public function destroy(int $id)
    {
        $this->service->destroyUser($id);

        return response()->json(['message' => 'User deleted successfully'], 204);
    }

    public function cars(int $id)
    {
        $userCars = $this->service->getUserCars($id);

        return $userCars;
    }
}
