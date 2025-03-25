<?php

namespace App\Service\SessionService;

use App\Models\User;

interface SessionServiceInterface
{
    public function activeSession(User $user): array;
    public function revokeSession(User $user, string $tokenId): void;
}
