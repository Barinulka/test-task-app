<?php

namespace App\Repository\UserRepository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private User $model,
    ) {
    }

    public function createUser(array $data): User
    {
        return $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'partnership_id' => $data['partnership_id'] ?? null,
        ]);
    }
}
