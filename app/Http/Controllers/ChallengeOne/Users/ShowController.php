<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeOne\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

final class ShowController extends Controller
{

    /**
     * show a user by given model
     *
     * @param Request $request
     * @param User $user
     * @return UserResource
     */
    public function show(Request $request, User $user): UserResource
    {
        // TODO: challenge 1.0

        return new UserResource($user);
    }
}
