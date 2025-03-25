<?php

namespace App\Service\PartnershipService;

use App\DTO\PartnershipDTO;
use App\Repository\PartnershipRepository\PartnershipRepositoryInterface;
use Illuminate\Support\Collection;

class PartnershipService implements PartnershipServiceInterface
{
    public function __construct(
        private PartnershipRepositoryInterface $repository
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
            return new PartnershipDTO($item->id, $item->name);
        });
    }
}
