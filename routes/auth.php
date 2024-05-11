<?php

// Auth controllers

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;

// Admin controllers

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlatformGroupController as AdminPlatformGroupController;
use App\Http\Controllers\Admin\PlatformController as AdminPlatformController;
use App\Http\Controllers\Admin\EditionController as AdminEditionController;
use App\Http\Controllers\Admin\VideogameController as AdminVideogameController;
use App\Http\Controllers\Admin\CartEntryController as AdminCartEntryController;
use App\Http\Controllers\Admin\CartController as AdminCartController;

// User controllers

use App\Http\Controllers\User\PlatformGroupController as UserPlatformGroupController;
use App\Http\Controllers\User\PlatformController as UserPlatformController;
use App\Http\Controllers\User\EditionController as UserEditionController;
use App\Http\Controllers\User\VideogameController as UserVideogameController;
use App\Http\Controllers\User\CartEntryController as UserCartEntryController;
use App\Http\Controllers\User\CartController as UserCartController;

// Routes

use Illuminate\Support\Facades\Route;

//! Routes for non-authenticated users
Route::middleware('guest')->group(function () {

    // Pre-setted routes

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');

    // Not pre-setted routes

    //

});

//! Routes for authenticated users
Route::middleware('auth')->group(function () {

    // Pre-setted routes

    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Not pre-setted routes

    // ..

    //! User routes

    // My content page
    Route::prefix('content')->name('content.')->group(function () {
        Route::prefix('platform-groups')->name('platform-groups.')->group(function () {

            Route::get('/', [UserPlatformGroupController::class, 'index'])->name('index'); // List all platform groups
            Route::get('/{id}', [UserPlatformGroupController::class, 'show'])->name('show'); // Show specific platform group

            Route::post('/', [UserPlatformGroupController::class, 'store'])->name('store')->middleware('can:create platform groups');
            Route::put('/{id}', [UserPlatformGroupController::class, 'update'])->name('update')->middleware('can:update platform groups');
            Route::delete('/{id}', [UserPlatformGroupController::class, 'destroy'])->name('destroy')->middleware('can:delete platform groups');
        });
    });

    //! Admin routes
    Route::middleware('can:manage admin')->group(function () {

        // admin views
        Route::prefix('admin')->group(function () {

            // dashboard
            Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

            // cruds
            Route::get('/games', [AdminController::class, 'manageGames'])->name('admin.videogames.crud');
            Route::get('/editions', [AdminController::class, 'manageEditions'])->name('admin.editions.crud');
            Route::get('/platforms', [AdminController::class, 'managePlatforms'])->name('admin.platforms.crud');
            Route::get('/platform-groups', [AdminController::class, 'managePlatformGroups'])->name('admin.platform-groups.crud');
        });
    });
});
