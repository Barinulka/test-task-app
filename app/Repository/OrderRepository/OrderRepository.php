<?php

namespace App\Repository\OrderRepository;

use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function __construct(
        private Order $model
    ) {
    }

    public function save(array $data): Order
    {
        $order = $this->model->create($data);

        return $order;
    }
}
