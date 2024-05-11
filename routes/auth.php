<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PlatformGroupController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

//! Routes for non-authenticated users
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

//! Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //! Routes prefixed differentiating on just view or create/edit permissions inside

    // Platform Groups
    Route::prefix('platform-groups')->name('platform-groups.')->group(function () {

        // Route to view a specific platform group (global access)

        Route::get('/', [PlatformGroupController::class, 'index'])->name('index');
        Route::get('/{id}', [PlatformGroupController::class, 'show'])->name('show');
        
        // Routes with permissions for creating and editing platform groups
        Route::middleware('can:create platform groups,edit platform groups')->group(function () {
            Route::get('/create', [PlatformGroupController::class, 'create'])->name('create');
            Route::post('/', [PlatformGroupController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PlatformGroupController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PlatformGroupController::class, 'update'])->name('update');
            Route::delete('/{id}', [PlatformGroupController::class, 'destroy'])->name('destroy');
        });
        
    });


    // ..


    //! Admin routes with manage permission middleware
    Route::middleware('can:manage admin')->group(function () {

        // admin views
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
            Route::get('/games', [AdminController::class, 'manageGames'])->name('admin.cruds.videogames');
            Route::get('/editions', [AdminController::class, 'manageEditions'])->name('admin.cruds.editions');
            Route::get('/platforms', [AdminController::class, 'managePlatforms'])->name('admin.cruds.platforms');
            Route::get('/platform-groups', [AdminController::class, 'managePlatformGroups'])->name('admin.cruds.platform-groups');
        });
    });



});
