<?php

namespace App\Service\OrderService;

use App\Models\Order;

interface OrderServiceInterface
{
    public function saveOrder(array $data): Order;
}
