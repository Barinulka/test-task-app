<?php

namespace App\Repository\OrderTypeRepository;

use App\Models\OrderType;
use Illuminate\Support\Collection;

class OrderTypeRepository implements OrderTypeRepositoryInterface
{
    public function __construct(
        private OrderType $model
    ) {
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }
}
