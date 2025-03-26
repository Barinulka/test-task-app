<?php

namespace App\Repository\WorkerRepository;


use Illuminate\Support\Collection;

interface WorkerRepositoryInterface
{
    public function getList(): Collection;
    public function getWorkersByOrderTypeIds(array $orderTypeIds): Collection;
}
