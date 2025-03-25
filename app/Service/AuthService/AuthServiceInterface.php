<?php

namespace App\Service\AuthService;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function login(array $data): array;
    public function logout(Request $request): void;
}
