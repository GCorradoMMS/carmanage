<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function listUsers(): Collection;
    public function getUserById(int $id): Collection;
    public function createUser(array $data): User;
    public function updateUser(int $id, array $data): User;
    public function destroyUser(int $id): void;
}