<?php

namespace App\DTO;

class OrderTypeDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }
}
