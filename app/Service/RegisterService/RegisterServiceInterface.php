<?php

namespace App\Service\RegisterService;

use App\Http\Requests\RegisterRequest;
use Illuminate\Database\Eloquent\Model;

interface RegisterServiceInterface
{
    public function register(RegisterRequest $request): Model;
}
