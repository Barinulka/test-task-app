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

    public function getOrderById(int $id): Order
    {
        return $this->model->find($id);
    }

    public function assignWorkerToOrder(Order $order, array $data): void
    {
        $order->workers()->attach($data['worker_id'], ['amount' => $data['amount']]);
    }
}
