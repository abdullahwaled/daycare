<?php

use App\Http\Controllers\TeacherAuth\AuthenticatedSessionController;
use App\Http\Controllers\TeacherAuth\ConfirmablePasswordController;
use App\Http\Controllers\TeacherAuth\EmailVerificationNotificationController;
use App\Http\Controllers\TeacherAuth\EmailVerificationPromptController;
use App\Http\Controllers\TeacherAuth\NewPasswordController;
use App\Http\Controllers\TeacherAuth\PasswordController;
use App\Http\Controllers\TeacherAuth\PasswordResetLinkController;
use App\Http\Controllers\TeacherAuth\RegisteredUserController;
use App\Http\Controllers\TeacherAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:teacher')->group(function () {
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


