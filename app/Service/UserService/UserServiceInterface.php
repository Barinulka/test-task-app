<?php

namespace App\Service\UserService;


use Illuminate\Support\Collection;

interface UserServiceInterface
{
    public function getList(): Collection;
}
