<?php

namespace App\DTO;

class UserListDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public ?PartnershipDTO $partnership
    ) {
    }
}
