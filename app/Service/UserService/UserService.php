<?php

namespace App\Service\UserService;

use App\DTO\OrderTypeDTO;
use App\DTO\PartnershipDTO;
use App\DTO\UserListDTO;
use App\Models\User;
use App\Repository\UserRepository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    public function __construct(
        private UserRepositoryInterface $repository,
    ) {
    }

    public function getList(): Collection
    {
        $list = $this->repository->getList();
        return $this->transformToDTO($list);
    }

    private function transformToDTO(Collection $collection): Collection
    {
        return $collection->map(function ($item) {
            return new UserListDTO(
                $item->id,
                $item->name,
                $item->email,
                $this->getPartnershipInfo($item)
            );
        });
    }

    private function getPartnershipInfo(User $user): ?PartnershipDTO
    {
        if (empty($user->partnership)) {
            return null;
        }

        return new PartnershipDTO(
            $user->partnership->id,
            $user->partnership->name
        );
    }
}
