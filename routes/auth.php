<?php

//! Config
///////////////////////////////////////////////////////////////////

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
use App\Http\Controllers\User\ReviewController as UserReviewController;

// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::middleware(['auth', 'breadcrumbs', 'layouts'])->group(function () {

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
            Route::post('add/{editionId}', [UserCartController::class, 'addToCart'])->name('add');
            Route::delete('remove/{editionId}', [UserCartController::class, 'removeFromCart'])->name('remove');
            Route::put('decrement/{editionId}', [UserCartController::class, 'decreaseQuantity'])->name('decrement');
            Route::put('increment/{editionId}', [UserCartController::class, 'increaseQuantity'])->name('increment');
        });

        Route::prefix('payments')->name('payments.')->group(function () {
            Route::get('checkout', [UserPaymentController::class, 'checkout'])->name('checkout');
            Route::get('paid', [UserPaymentController::class, 'paid'])->name('paid');
            Route::post('confirm', [UserPaymentController::class, 'confirm'])->name('confirm');
        });

        Route::prefix('platform-groups')->name('platform-groups.')->group(function () {
            Route::get('show/{id}', [UserPlatformGroupController::class, 'show'])->name('show');
            Route::get('filter-editions', [UserPlatformGroupController::class, 'renderFilteredEditions'])->name('filter-editions');
        });

        Route::prefix('editions')->name('editions.')->group(function () {
            Route::get('show/{id}', [UserEditionController::class, 'show'])->name('show');
        });

        Route::prefix('reviews')->name('reviews.')->group(function () {
            // Route::get('show/{id}', [UserReviewController::class, 'show'])->name('show');
            Route::get('create/{editionId}', [UserReviewController::class, 'create'])->name('create');
            Route::post('store', [UserReviewController::class, 'store'])->name('store');
        });
    });
});