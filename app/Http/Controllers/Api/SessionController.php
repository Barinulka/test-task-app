<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\SessionNotFundException;
use App\Http\Controllers\Controller;
use App\Service\SessionService\SessionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    public function __construct(
        private SessionServiceInterface $service
    ) {
    }

    public function activeSession(Request $request): JsonResponse
    {
        $user = $request->user();

        $sessions = $this->service->activeSession($user);

        return response()->json($sessions, Response::HTTP_OK);
    }

    public function revokeSession(Request $request, string $tokenId): JsonResponse
    {
        $user = $request->user();

        try {
            $this->service->revokeSession($user, $tokenId);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return new JsonResponse([], Response::HTTP_NO_CONTENT);
    }
}
