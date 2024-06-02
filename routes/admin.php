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
use App\Http\Controllers\Admin\PlatformController as AdminPlatformController;
use App\Http\Controllers\Admin\PlatformGroupController as AdminPlatformGroupController;
use App\Http\Controllers\Admin\EditionController as AdminEditionController;

// User controllers

use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\PaymentController as UserPaymentController;
use App\Http\Controllers\User\ReviewController as UserReviewController;

// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::middleware(['role:admin', 'breadcrumbs', 'layouts', 'lang'])->prefix('admin')->name('admin.')->group(function () {

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
        Route::get('chart', [AdminChartController::class, 'videogamesEditionsCount'])->name('chart');
    });

    Route::prefix('platform-groups')->name('platform-groups.')->group(function () {
        // management
        Route::get('/', [AdminManagerController::class, 'managePlatformGroups'])->name('manager');

        // actions
        Route::get('create', [AdminPlatformGroupController::class, 'create'])->name('create');
        Route::post('store', [AdminPlatformGroupController::class, 'store'])->name('store');
        Route::get('show/{platformGroup}', [AdminPlatformGroupController::class, 'show'])->name('show');
        Route::get('edit/{platformGroup}', [AdminPlatformGroupController::class, 'edit'])->name('edit');
        Route::put('update{platformGroup}', [AdminPlatformGroupController::class, 'update'])->name('update');
        Route::get('delete/{platformGroup}', [AdminPlatformGroupController::class, 'delete'])->name('delete');
        Route::delete('destroy/{platformGroup}', [AdminPlatformGroupController::class, 'destroy'])->name('destroy');

        // ajax
        Route::get('crud', [AdminCrudController::class, 'platformGroups'])->name('crud');
        Route::get('chart', [AdminChartController::class, 'platformGroupSales'])->name('chart');
    });

    Route::prefix('platforms')->name('platforms.')->group(function () {
        // management
        Route::get('/', [AdminManagerController::class, 'managePlatforms'])->name('manager');

        // actions
        Route::get('create', [AdminPlatformController::class, 'create'])->name('create');
        Route::post('store', [AdminPlatformController::class, 'store'])->name('store');
        Route::get('show/{platform}', [AdminPlatformController::class, 'show'])->name('show');
        Route::get('edit/{platform}', [AdminPlatformController::class, 'edit'])->name('edit');
        Route::put('update{platform}', [AdminPlatformController::class, 'update'])->name('update');
        Route::get('delete/{platform}', [AdminPlatformController::class, 'delete'])->name('delete');
        Route::delete('destroy/{platform}', [AdminPlatformController::class, 'destroy'])->name('destroy');

        // ajax
        Route::get('crud', [AdminCrudController::class, 'platforms'])->name('crud');
        Route::get('chart', [AdminChartController::class, 'platformsEditionsCount'])->name('chart');
    });

    Route::prefix('editions')->name('editions.')->group(function () {
        // management
        Route::get('/', [AdminManagerController::class, 'manageEditions'])->name('manager');

        // actions
        Route::get('create', [AdminEditionController::class, 'create'])->name('create');
        Route::post('store', [AdminEditionController::class, 'store'])->name('store');
        Route::get('show/{edition}', [AdminEditionController::class, 'show'])->name('show');
        Route::get('edit/{edition}', [AdminEditionController::class, 'edit'])->name('edit');
        Route::put('update{edition}', [AdminEditionController::class, 'update'])->name('update');
        Route::get('delete/{edition}', [AdminEditionController::class, 'delete'])->name('delete');
        Route::delete('destroy/{edition}', [AdminEditionController::class, 'destroy'])->name('destroy');

        // ajax
        Route::get('crud', [AdminCrudController::class, 'editions'])->name('crud');
        Route::get('chart', [AdminChartController::class, 'editionsBestSeller'])->name('chart');
    });
});
