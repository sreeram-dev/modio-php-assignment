<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeOne\Users;
use App\Http\Controllers\ChallengeTwo\Mods;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// TODO: add routes for challenge 1.0
Route::get('/users', [Users\IndexController::class, 'index']);
Route::post('/users', [Users\CreateController::class, 'create']);
Route::get('/users/{user}', [Users\ShowController::class, 'show']);

// TODO: add routes for challenge 2.0
Route::get('/mods', [Mods\IndexController::class, 'index']);
Route::post('/mods', [Mods\CreateController::class, 'create']);

// TODO: add routes for challenge 3.0
