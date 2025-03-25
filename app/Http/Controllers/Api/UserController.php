<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(
        private UserServiceInterface $service,
    ) {
    }

    public function getList(): JsonResponse
    {
        $data = $this->service->getList();

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
