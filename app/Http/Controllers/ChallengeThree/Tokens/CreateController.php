<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\Controller;

final class CreateController extends Controller
{

    /**
     * create a mod and related it to the given user
     *
     * @param TokenRepositoryInterface $repository
     * @return TokenResource
     */
    public function create(TokenRepositoryInterface $repository): TokenResource
    {
        // TODO: challenge 3.0
    }
}
