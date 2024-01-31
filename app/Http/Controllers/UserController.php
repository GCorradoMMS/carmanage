<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\Service;
use App\Services\UserService;

class UserController extends Controller
{

    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->listUsers();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->service->getUserById($id);
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->createUser($request->validated());

        return new UserResource($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->service->updateUser($id, $request->validated());

        return new UserResource($user);
    }

    public function destroy($id)
    {
        $this->service->destroyUser($id);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
