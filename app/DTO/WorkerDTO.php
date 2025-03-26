<?php

namespace App\DTO;

class WorkerDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $secondName,
        public string $surname,
        public string $phone,
    ) {
    }
}
