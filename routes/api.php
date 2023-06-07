<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Moderator\ProductController as ModeratorProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->group(function() {
    Route::middleware([AdminMiddleware::class])
        ->prefix('admin')
        ->group(function() {
            Route::post('grant-moderator/{user}', [UserController::class, 'grantModerator']);
        })
    ;
    Route::middleware([])
        ->prefix('moderator')
        ->group(function() {
            Route::apiResource('products', ModeratorProductController::class);
        })
    ;
});
