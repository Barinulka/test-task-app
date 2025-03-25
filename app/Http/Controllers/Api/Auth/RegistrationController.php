<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Service\RegisterService\RegisterService;
use App\Service\RegisterService\RegisterServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends Controller
{
    public function __construct(
        private RegisterServiceInterface $service,
    ) {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->service->register($request);
        return response()->json(['id' => $user->id], Response::HTTP_CREATED);
    }
}
