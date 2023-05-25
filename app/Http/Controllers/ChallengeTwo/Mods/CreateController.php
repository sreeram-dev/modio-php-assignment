<?php

declare(strict_types=1);

namespace App\Http\Controllers\ChallengeTwo\Mods;

use App\Http\Resources\ModResource;
use App\Models\Mod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class CreateController
{

    /**
     * create a mod and related it to the given user
     *
     * @param Request $request
     * @return ModResource
     */
    public function create(Request $request): ModResource
    {
        $request->validate([
            'name' => ['required', 'string'],
            'path' => ['required', 'string'],
        ], [
            'path.string' => 'The path must be a string.'
        ]);

        $mod = Mod::create([
            'name' => $request->name,
            'path' => $request->path,
            'user_id' => Auth::user()->id,
        ]);

        return new ModResource($mod);
    }
}
