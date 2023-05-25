<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens\Interfaces;

use App\Models\User;

interface TokenServiceInterface {

    /**
     * check the given token is valid for the current user
     *
     * @param string $token
     * @param User $user
     * @return bool
     */
    public function checkToken(string $token, User $user): bool;

}
