<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeOne\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class IndexController extends Controller
{

    /**
     * return a collection of users
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        // TODO: challenge 1.0
        return UserResource::collection(User::all());
    }
}
