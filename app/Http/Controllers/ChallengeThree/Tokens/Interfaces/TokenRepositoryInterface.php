<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens\Interfaces;

use App\Models\Token;
use App\Models\User;

interface TokenRepositoryInterface {

    /**
     * issue a token for the given user
     * (UUID string is fine)
     *
     * @param User $user
     * @return Token
     */
    public function issueToken(User $user): Token;

    /**
     * revoke the given token
     *
     * @param string $token
     * @return bool
     */
    public function revokeToken(string $token): bool;

}
