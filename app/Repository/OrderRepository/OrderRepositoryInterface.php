<?php

namespace App\Repository\OrderRepository;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function save(array $data): Order;
}
