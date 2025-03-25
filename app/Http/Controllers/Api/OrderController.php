<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Service\OrderService\OrderServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function __construct(
        private OrderServiceInterface $service,
    ) {
    }

    public function createOrder(OrderRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        $order = $this->service->saveOrder($validateData);

        return response()->json(['id' => $order->id], Response::HTTP_CREATED);
    }
}
