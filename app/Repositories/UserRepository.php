<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listUsers(): Collection
    {
        return $this->model->all();
    }

    public function getUserById(int $id): Collection
    {
        return $this->model->where('id', '=', $id)->get();
    }

    public function createUser(array $data): User
    {
        return $this->model->create($data);
    }

    public function updateUser(int $id, array $data): User
    {
        $user = $this->model->findOrFail($id);
        $user->update($data);

        return $user->fresh();
    }

    public function destroyUser(int $id): void
    {
        $user = $this->model->findOrFail($id);
        $user->delete();
    }

    function getCars(int $id): LengthAwarePaginator
    {
        $cars = $this->model->with('userCars.car')->findOrFail($id);
        return $cars->paginate(2);
    }
}
