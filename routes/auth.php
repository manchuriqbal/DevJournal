<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Auth\PasswordController;
use App\Http\Controllers\Frontend\Auth\NewPasswordController;
use App\Http\Controllers\Frontend\Auth\VerifyEmailController;
use App\Http\Controllers\Frontend\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\Auth\PasswordResetLinkController;
use App\Http\Controllers\Frontend\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Frontend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    // Admin Authentication Routes
    Route::get('admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])
        ->name('admin.login');
    Route::post('admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])
        ->name('admin.login.store');
    Route::post('admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])
        ->name('admin.logout');
    

    // Creator Authentication Routes
    Route::get('creator/login', [App\Http\Controllers\Creator\Auth\LoginController::class, 'showLoginForm'])
        ->name('creator.login');
    Route::post('creator/login', [App\Http\Controllers\Creator\Auth\LoginController::class, 'login'])
        ->name('creator.login.store');
    Route::post('creator/logout', [App\Http\Controllers\Creator\Auth\LoginController::class, 'logout'])
        ->name('creator.logout');

    // User Authentication Routes
    
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

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
