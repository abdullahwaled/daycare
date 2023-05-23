<?php

use App\Http\Controllers\DadAuth\AuthenticatedSessionController;
use App\Http\Controllers\DadAuth\ConfirmablePasswordController;
use App\Http\Controllers\DadAuth\EmailVerificationNotificationController;
use App\Http\Controllers\DadAuth\EmailVerificationPromptController;
use App\Http\Controllers\DadAuth\NewPasswordController;
use App\Http\Controllers\DadAuth\PasswordController;
use App\Http\Controllers\DadAuth\PasswordResetLinkController;
use App\Http\Controllers\DadAuth\RegisteredUserController;
use App\Http\Controllers\DadAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:dad')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});


   Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


