<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\PartnershipService\PartnershipServiceInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PartnershipController extends Controller
{
    public function __construct(
        private PartnershipServiceInterface $service
    ) {
    }

    public function getList(): JsonResponse
    {
        $data = $this->service->getList();

        return response()->json(['data' => $data], Response::HTTP_OK);
    }
}
