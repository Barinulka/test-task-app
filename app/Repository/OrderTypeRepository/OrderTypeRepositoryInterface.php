<?php

namespace App\Repository\OrderTypeRepository;

use Illuminate\Support\Collection;

interface OrderTypeRepositoryInterface
{
    public function getList(): Collection;
}
