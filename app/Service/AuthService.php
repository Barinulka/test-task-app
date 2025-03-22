<?php

namespace App\Service;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        if (Auth::attempt($validateData)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            return new JsonResponse(['token' => $token], 200);
        }

        return new JsonResponse(['error' => 'Неверные данные для входа', 401]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();

        return new JsonResponse([], 204);
    }
}
