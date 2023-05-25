<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeThree\Tokens;

use App\Http\Controllers\ChallengeThree\Tokens\Interfaces\TokenRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenDeleteRequest;
use Illuminate\Http\Response;

final class DeleteController extends Controller
{

    /**
     * delete a given token, return a resp
     *
     * @param TokenRepositoryInterface $repository
     * @param TokenDeleteRequest $request
     * @return Response
     */
    public function delete(TokenRepositoryInterface $repository, TokenDeleteRequest $request): Response
    {
        // TODO: challenge 3.0
    }


}
