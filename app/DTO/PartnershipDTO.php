<?php

namespace App\DTO;

class PartnershipDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }
}
