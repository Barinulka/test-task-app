<?php

namespace App\Repository\PartnershipRepository;

use App\Models\Partnership;
use Illuminate\Support\Collection;

class PartnershipRepository implements PartnershipRepositoryInterface
{
    public function __construct(
        private Partnership $model
    ) {
    }

    public function getList(): Collection
    {
        return $this->model->all();
    }
}
