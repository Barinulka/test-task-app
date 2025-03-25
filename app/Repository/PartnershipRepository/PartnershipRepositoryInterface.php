<?php

namespace App\Repository\PartnershipRepository;

use Illuminate\Support\Collection;

interface PartnershipRepositoryInterface
{
    public function getList(): Collection;
}
