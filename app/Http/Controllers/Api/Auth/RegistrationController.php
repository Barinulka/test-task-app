<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Service\RegisterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(
        private RegisterService $registerService,
    ) {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        return $this->registerService->register($request);
    }
}
