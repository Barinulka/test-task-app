<?php

namespace App\Service\WorkerService;

use App\DTO\WorkerDTO;
use App\Repository\WorkerRepository\WorkerRepositoryInterface;
use Illuminate\Support\Collection;

class WorkerService implements WorkerServiceInterface
{
    public function __construct(
        private WorkerRepositoryInterface $repository,
    ) {
    }

    public function getList(): Collection
    {
        $list = $this->repository->getList();

        return $this->transformToDTO($list);
    }

    public function getWorkersByOrderTypeIds(array $data): Collection
    {
        $list = $this->repository->getWorkersByOrderTypeIds($data['order_type_ids']);

        return $this->transformToDTO($list);
    }

    private function transformToDTO(Collection $collection): Collection
    {
        return $collection->map(function ($item) {
            return new WorkerDTO(
                $item->id,
                $item->name,
                $item->second_name,
                $item->surname,
                $item->phone
            );
        });
    }
}
