<?php

namespace App\Service\RegisterService;

use App\Http\Requests\RegisterRequest;
use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class RegisterService implements RegisterServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
    ) {
    }

    public function register(RegisterRequest $request): Model
    {
        $validateData = $request->validated();

        return $this->repository->createUser($validateData);
    }
}
