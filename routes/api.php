<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MessageController;


Route::prefix('v1')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/test', function() {
            return 'this is home';
        });

        Route::post('/add_message', [MessageController::class, 'addMessage']);
        Route::get('/messages', [MessageController::class, 'getMessages']);

        Route::post('/logout', [AuthController::class, 'logout']);
    });
});