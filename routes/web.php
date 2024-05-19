<?php

// Global controllers
use App\Http\Controllers\HomeController;

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

use App\Http\Controllers\Admin\ManagerController as AdminManagerController;
use App\Http\Controllers\Admin\CrudController as AdminCrudController;
use App\Http\Controllers\Admin\ChartController as AdminChartController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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
use App\Http\Controllers\User\PaymentController as UserPaymentController;

// Routes

use Illuminate\Support\Facades\Route;

//! Routes for non-authenticated users
Route::middleware('guest')->group(function () {

    Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

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
Route::middleware(['auth', 'breadcrumbs'])->group(function () {

    Route::get('/content', [HomeController::class, 'dashboard'])->name('dashboard');

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

    //! User routes

    Route::prefix('content')->name('content.')->group(function () {

        Route::prefix('carts')->name('carts.')->group(function () {
            Route::get('show', [UserCartController::class, 'show'])->name('show');
            Route::delete('remove/{editionId}', [UserCartController::class, 'removeFromCart'])->name('remove');
            Route::put('decrement/{editionId}', [UserCartController::class, 'decreaseQuantity'])->name('decrement');
            Route::put('increment/{editionId}', [UserCartController::class, 'increaseQuantity'])->name('increment');
        });

        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('checkout', [UserPaymentController::class, 'checkout'])->name('checkout');
            Route::post('payment', [UserPaymentController::class, 'makePayment'])->name('payment');
        });

        Route::prefix('platform-groups')->name('platform-groups.')->group(function () {
            Route::get('show/{id}', [UserPlatformGroupController::class, 'show'])->name('show');
        });

        Route::prefix('editions')->name('editions.')->group(function () {
            Route::get('show/{id}', [UserEditionController::class, 'show'])->name('show');
        });
    });

    //! Admin routes

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {

        // dashboard
        Route::get('/', [AdminManagerController::class, 'index'])->name('dashboard');

        // Users Management
        Route::prefix('users')->name('users.')->group(function () {
            // management
            Route::get('/', [AdminManagerController::class, 'manageUsers'])->name('manager');

            // actions

            Route::get('create', [AdminUserController::class, 'create'])->name('create');
            Route::get('show/{user}', [AdminUserController::class, 'show'])->name('show');
            Route::post('store', [AdminUserController::class, 'store'])->name('store');
            Route::get('edit/{user}', [AdminUserController::class, 'edit'])->name('edit');
            Route::put('update/{user}', [AdminUserController::class, 'update'])->name('update');
            Route::get('delete/{user}', [AdminUserController::class, 'delete'])->name('delete');
            Route::delete('destroy/{user}', [AdminUserController::class, 'destroy'])->name('destroy');

            // ajax
            Route::get('crud', [AdminCrudController::class, 'users'])->name('crud');
            Route::get('chart', [AdminChartController::class, 'userRolesDistribution'])->name('chart');
        });

        // Videogames Management
        Route::prefix('games')->name('videogames.')->group(function () {
            Route::get('/', [AdminManagerController::class, 'manageGames'])->name('manager');
        });

        // Editions Management
        Route::prefix('editions')->name('editions.')->group(function () {
            Route::get('/', [AdminManagerController::class, 'manageEditions'])->name('manager');
        });

        // Platforms Management
        Route::prefix('platforms')->name('platforms.')->group(function () {
            Route::get('/', [AdminManagerController::class, 'managePlatforms'])->name('manager');
        });

        // Platform Groups Management
        Route::prefix('platform-groups')->name('platform-groups.')->group(function () {
            Route::get('/', [AdminManagerController::class, 'managePlatformGroups'])->name('manager');
        });
    });
});
