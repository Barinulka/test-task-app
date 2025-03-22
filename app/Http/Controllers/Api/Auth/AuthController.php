<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->authService->login($request);
    }

    public function logout(Request $request): JsonResponse
    {
        return $this->authService->logout($request);
    }
}
