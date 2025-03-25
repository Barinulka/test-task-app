<?php

namespace App\Service\OrderService;

use App\Models\Order;
use App\Repository\OrderRepository\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
    public function __construct(
        private OrderRepositoryInterface $repository,
    ) {
    }

    public function saveOrder(array $data): Order
    {
        return $this->repository->save($data);
    }

    public function assignWorkerToOrder(array $data): array
    {
        $order = $this->repository->getOrderById($data['order_id']);

        $this->repository->assignWorkerToOrder($order, $data);

        return ['message' => 'Испольнитель добавлен к заказу'];
    }
}
