<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MessageController;
use App\Http\Controllers\Api\V1\UserController;

Route::prefix('v1')->group(function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::get('/my_profile', [UserController::class, 'myProfile']);
        Route::post('/update_profile', [UserController::class, 'updateProfile']);

        Route::get('/conversations', [MessageController::class, 'conversations']);
        Route::get('/messages/{conversationId}', [MessageController::class, 'getMessages']);
        Route::post('/add_message', [MessageController::class, 'addMessage']);

        Route::post('/logout', [AuthController::class, 'logout']);
    });
});