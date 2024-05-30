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

Route::middleware('guest', 'layouts')->group(function () {

    // Breeze routes
    Route::get('register', [BreezeRegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [BreezeRegisteredUserController::class, 'store']);
    Route::get('login', [BreezeAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [BreezeAuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [BreezePasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [BreezePasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [BreezeNewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [BreezeNewPasswordController::class, 'store'])->name('password.store');
    
    // Own routes

    Route::name('guest')->group(function() {



    });
    
});
