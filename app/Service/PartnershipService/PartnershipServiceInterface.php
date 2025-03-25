<?php

namespace App\Service\PartnershipService;


use Illuminate\Support\Collection;

interface PartnershipServiceInterface
{
    public function getList(): Collection;
}
