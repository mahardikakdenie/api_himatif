<?php

use Illuminate\Http\Request;
use Modules\User\Http\Controllers\RoleController;
use Modules\User\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::get('me', [UserController::class, 'me'])->middleware('auth:sanctum');
    Route::prefix('manage')
        ->middleware(['auth:sanctum', "role:1"])->group(function () {
            Route::get('', [UserController::class, 'index']);
            Route::post('add', [UserController::class, 'store']);
            Route::put('{id}', [UserController::class, 'update']);
            Route::get('{id}', [UserController::class, 'show']);
        });
});

Route::prefix('role')->group(function () {
    Route::prefix('manage')->group(function () {
        Route::get('', [RoleController::class, 'index']);
        Route::post('', [RoleController::class, 'store']);
    });
});
