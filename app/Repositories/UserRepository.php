<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface {
    protected $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function listUsers(): Collection {
        return User::all();
    }

    public function getUserById(int $id): Collection {
        return User::where('id', '=', $id)->get();
    }

    public function createUser(array $data): User {
        return $this->model->create($data);
    }

    public function updateUser(int $id, array $data): User {
        $user = User::findOrFail($id);
        $user->update($data);

        return $user->fresh();
    }
    
    public function destroyUser(int $id): void {
        $user = User::findOrFail($id);
        $user->delete();
    }
}