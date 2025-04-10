<?php

use App\Http\Controllers\Auth\JWTAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('invitation', [RegisterController::class, 'invitationCode']);
Route::put('invitation/{userId}', [RegisterController::class, 'updateEmail']);

Route::middleware([JwtMiddleware::class])->group(function () {
    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout']);
});
