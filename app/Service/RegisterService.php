<?php

namespace App\Service;

use App\Http\Requests\RegisterRequest;
use App\Repository\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterService
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $user = $this->userRepository->createUser($validateData);

        return new JsonResponse(['id' => $user->id], Response::HTTP_CREATED);
    }
}
