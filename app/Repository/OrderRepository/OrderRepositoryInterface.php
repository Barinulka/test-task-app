<?php

namespace App\Repository\OrderRepository;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function save(array $data): Order;
    public function getOrderById(int $id): Order;
    public function assignWorkerToOrder(Order $order, array $data): void;
}
