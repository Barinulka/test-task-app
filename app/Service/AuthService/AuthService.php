<?php

namespace App\Service\AuthService;

use App\Exceptions\InvalidAuthCredentialsException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthService implements AuthServiceInterface
{
    /**
     * @throws InvalidAuthCredentialsException
     */
    public function login(array $data): array
    {
        if (!Auth::attempt($data)) {
            throw new InvalidAuthCredentialsException('Неправильные данные для входа');
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->accessToken;

        return ['token' => $token];
    }

    public function logout(Request $request): void
    {
        $request->user()->token()->revoke();
    }
}
