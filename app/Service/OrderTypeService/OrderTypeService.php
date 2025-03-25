<?php

namespace App\Service\OrderTypeService;

use App\DTO\OrderTypeDTO;
use App\Repository\OrderTypeRepository\OrderTypeRepositoryInterface;
use Illuminate\Support\Collection;

class OrderTypeService implements OrderTypeServiceInterface
{
    public function __construct(
        private OrderTypeRepositoryInterface $repository,
    ) {
    }

    public function getList(): Collection
    {
        $list = $this->repository->getList();
        return $this->transformToDTO($list);
    }

    private function transformToDTO(Collection $collection): Collection
    {
        return $collection->map(function ($item) {
            return new OrderTypeDTO($item->id, $item->name);
        });
    }
}
