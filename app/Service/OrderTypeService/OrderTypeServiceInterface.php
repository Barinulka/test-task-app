<?php

namespace App\Service\OrderTypeService;


use Illuminate\Support\Collection;

interface OrderTypeServiceInterface
{
    public function getList(): Collection;
}
