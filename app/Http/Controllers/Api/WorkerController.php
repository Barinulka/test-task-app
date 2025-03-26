<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkersOrderTypeIdsRequest;
use App\Service\WorkerService\WorkerServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerController extends Controller
{
    public function __construct(
        private WorkerServiceInterface $service,
    ) {
    }

    public function getList(): JsonResponse
    {
        $list = $this->service->getList();

        return response()->json(['data' => $list], Response::HTTP_OK);
    }

    public function getWorkerByOrderTypeIds(WorkersOrderTypeIdsRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $workers = $this->service->getWorkersByOrderTypeIds($validateData);

        return response()->json(['data' => $workers], Response::HTTP_OK);
    }
}
