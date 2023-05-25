<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeOne\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

final class CreateController extends Controller
{

    /**
     * create a user
     *
     * @param Request $request
     * @return UserResource
     */
    public function create(Request $request): UserResource
    {
         $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'] // tried to use Password:: object to define more complex rules
        ], [
            'password.string' => 'The password must be a string.'
        ]);

        // TODO: challenge 1.0
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return new UserResource($user);
    }


}
