<?php

namespace App\Repository\WorkerRepository;

use App\Models\Worker;
use Illuminate\Support\Collection;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function __construct(
        private Worker $model,
    ) {
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }

    public function getWorkersByOrderTypeIds(array $orderTypeIds): Collection
    {
        return $this->model->whereDoesntHave('exOrderTypes', function($query) use($orderTypeIds) {
            $query->whereIn('order_type_id', $orderTypeIds);
        })->get();
    }
}
