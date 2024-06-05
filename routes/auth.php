<?php

//! Config
///////////////////////////////////////////////////////////////////

// Root controllers

use App\Http\Controllers\Root\HomeController as RootHomeController;
use App\Http\Controllers\Root\DashboardController as RootDashboardController;
use App\Http\Controllers\Root\RenderController as RootRenderController;
use App\Http\Controllers\Root\EditionController as RootEditionController;
use App\Http\Controllers\Root\PlatformGroupController as RootPlatformGroupController;

// Breeze controllers

use App\Http\Controllers\Breeze\AuthenticatedSessionController as BreezeAuthenticatedSessionController;
use App\Http\Controllers\Breeze\ConfirmablePasswordController as BreezeConfirmablePasswordController;
use App\Http\Controllers\Breeze\EmailVerificationNotificationController as BreezeEmailVerificationNotificationController;
use App\Http\Controllers\Breeze\EmailVerificationPromptController as BreezeEmailVerificationPromptController;
use App\Http\Controllers\Breeze\NewPasswordController as BreezeNewPasswordController;
use App\Http\Controllers\Breeze\PasswordController as BreezePasswordController;
use App\Http\Controllers\Breeze\PasswordResetLinkController as BreezePasswordResetLinkController;
use App\Http\Controllers\Breeze\RegisteredUserController as BreezeRegisteredUserController;
use App\Http\Controllers\Breeze\VerifyEmailController as BreezeVerifyEmailController;
use App\Http\Controllers\Breeze\ProfileController as BreezeProfileController;

// Admin controllers

use App\Http\Controllers\Admin\ManagerController as AdminManagerController;
use App\Http\Controllers\Admin\CrudController as AdminCrudController;
use App\Http\Controllers\Admin\ChartController as AdminChartController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PlatformGroupController as AdminPlatformGroupController;

// User controllers

use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;
use App\Http\Controllers\User\ReviewController as UserReviewController;

// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::middleware(['auth', 'layouts', 'lang'])->group(function () {

    // Breeze routes

    Route::get('verify-email', BreezeEmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', BreezeVerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('email/verification-notification', [BreezeEmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('confirm-password', [BreezeConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [BreezeConfirmablePasswordController::class, 'store']);
    Route::put('password', [BreezePasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [BreezeAuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [BreezeProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [BreezeProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [BreezeProfileController::class, 'destroy'])->name('profile.destroy');

    // Own routes

    Route::name('auth.')->group(function() {

        Route::prefix('carts')->name('carts.')->group(function () {

            Route::get('show', [UserCartController::class, 'show'])->name('show');
            Route::post('add/{editionId}', [UserCartController::class, 'addToCart'])->name('add');
            Route::delete('remove/{editionId}', [UserCartController::class, 'removeFromCart'])->name('remove');
            Route::put('decrement/{editionId}', [UserCartController::class, 'decreaseQuantity'])->name('decrement');
            Route::put('increment/{editionId}', [UserCartController::class, 'increaseQuantity'])->name('increment');
        });

        Route::middleware('verified')->prefix('payments')->name('payments.')->group(function () {
            Route::get('checkout', [UserPaymentController::class, 'checkout'])->name('checkout');
            Route::post('confirm', [UserPaymentController::class, 'confirm'])->name('confirm');
            Route::post('solidify', [UserPaymentController::class, 'solidify'])->name('solidify');
        });
    
        Route::prefix('reviews')->name('reviews.')->group(function () {
            Route::get('create/{editionId}', [UserReviewController::class, 'create'])->name('create');
            Route::post('store', [UserReviewController::class, 'store'])->name('store');
        });

    });
});
