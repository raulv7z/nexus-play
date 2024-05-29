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

Route::middleware(['role:admin', 'breadcrumbs', 'layouts'])->prefix('admin')->name('admin.')->group(function () {

    // dashboard
    Route::get('/', [AdminManagerController::class, 'index'])->name('dashboard');

    // Users Management
    Route::prefix('users')->name('users.')->group(function () {
        // management
        Route::get('/', [AdminManagerController::class, 'manageUsers'])->name('manager');

        // actions
        Route::get('create', [AdminUserController::class, 'create'])->name('create');
        Route::post('store', [AdminUserController::class, 'store'])->name('store');
        Route::get('show/{user}', [AdminUserController::class, 'show'])->name('show');
        Route::get('edit/{user}', [AdminUserController::class, 'edit'])->name('edit');
        Route::put('update{user}', [AdminUserController::class, 'update'])->name('update');
        Route::get('delete/{user}', [AdminUserController::class, 'delete'])->name('delete');
        Route::delete('destroy/{user}', [AdminUserController::class, 'destroy'])->name('destroy');

        // ajax
        Route::get('crud', [AdminCrudController::class, 'users'])->name('crud');
        Route::get('chart', [AdminChartController::class, 'usersRegistrationByDate'])->name('chart');
    });

    //

    
});
