<?php

namespace App\Service;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthService
{
    public function login(LoginRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        if (Auth::attempt($validateData)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;

            return new JsonResponse(['token' => $token], Response::HTTP_OK);
        }

        return new JsonResponse(['error' => 'Неверные данные для входа', Response::HTTP_UNAUTHORIZED]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();

        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }
}
