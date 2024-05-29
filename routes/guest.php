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

Route::middleware('guest', 'layouts')->group(function () {

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