<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    public function activeSession(Request $request): JsonResponse
    {
        $user = $request->user();

        return new JsonResponse($user->tokens);
    }

    public function revokeSession(Request $request, string $tokenId): JsonResponse
    {
        $user = $request->user();
        $token = $user->tokens()->find($tokenId);

        if (!$token) {
            return new JsonResponse(['error' => 'Токен не найден'], Response::HTTP_NOT_FOUND);
        }

        $token->delete();

        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }
}
