<?php

namespace App\Service\OrderTypeService;

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
        return $this->repository->getList();
    }
}
