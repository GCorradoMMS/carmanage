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
        return $this->service->getUserById($id);
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->storeUser($request->validated());

        return $user;
    }

    public function update(UserUpdateRequest $request, int $id)
    {
        $user = $this->service->updateUser($id, $request->validated());

        return new UserResource($user);
    }

    public function destroy(int $id)
    {
        $this->service->destroyUser($id);

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function cars(int $id)
    {
        $userCars = $this->service->getUserCars($id);

        return response()->json($userCars);
    }
}
