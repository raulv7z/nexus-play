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
use App\Http\Controllers\Admin\VideogameController as AdminVideogameController;
use App\Http\Controllers\Admin\PlatformGroupController as AdminPlatformGroupController;

// User controllers

use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;
use App\Http\Controllers\User\ReviewController as UserReviewController;

// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::middleware(['role:admin', 'breadcrumbs', 'layouts'])->prefix('admin')->name('admin.')->group(function () {

    // dashboard
    Route::get('/', [RootDashboardController::class, 'admin'])->name('dashboard');

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

    Route::prefix('videogames')->name('videogames.')->group(function () {
        // management
        Route::get('/', [AdminManagerController::class, 'manageVideogames'])->name('manager');

        // actions
        Route::get('create', [AdminVideogameController::class, 'create'])->name('create');
        Route::post('store', [AdminVideogameController::class, 'store'])->name('store');
        Route::get('show/{videogame}', [AdminVideogameController::class, 'show'])->name('show');
        Route::get('edit/{videogame}', [AdminVideogameController::class, 'edit'])->name('edit');
        Route::put('update{videogame}', [AdminVideogameController::class, 'update'])->name('update');
        Route::get('delete/{videogame}', [AdminVideogameController::class, 'delete'])->name('delete');
        Route::delete('destroy/{videogame}', [AdminVideogameController::class, 'destroy'])->name('destroy');

        // ajax
        Route::get('crud', [AdminCrudController::class, 'videogames'])->name('crud');
        // Route::get('chart', [AdminChartController::class, 'usersRegistrationByDate'])->name('chart');
    });

});
