<?php

namespace App\Service\WorkerService;


use Illuminate\Support\Collection;

interface WorkerServiceInterface
{
    public function getList(): Collection;
    public function getWorkersByOrderTypeIds(array $data): Collection;
}
