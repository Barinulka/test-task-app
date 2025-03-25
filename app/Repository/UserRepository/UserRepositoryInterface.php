<?php

namespace App\Repository\UserRepository;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(array $data): User;
}
