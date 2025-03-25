<?php

namespace App\Repository\UserRepository;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function createUser(array $data): User;

    public function getList(): Collection;
}
