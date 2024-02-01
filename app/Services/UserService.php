<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers(): Collection
    {
        return $this->userRepository->listUsers();
    }

    public function getUserById(int $id): Collection
    {
        return $this->userRepository->getUserById($id);
    }

    public function storeUser(array $data): User
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser(int $id, array $data): User
    {
        return $this->userRepository->updateUser($id, $data);
    }

    public function destroyUser(int $id): void
    {
        $this->userRepository->destroyUser($id);
    }

    function getUserCars(int $id): LengthAwarePaginator
    {
        return $this->userRepository->getCars($id);
    }
}
