<?php

namespace App\Service\SessionService;

use App\Exceptions\SessionNotFundException;
use App\Models\User;

class SessionService implements SessionServiceInterface
{
    public function activeSession(User $user): array
    {
        return $user->tokens->toArray();
    }

    /**
     * @throws SessionNotFundException
     */
    public function revokeSession(User $user, string $tokenId): void
    {
        $token = $user->tokens()->find($tokenId);

        if (!$token) {
            throw new SessionNotFundException();
        }

        $token->delete();
    }
}
