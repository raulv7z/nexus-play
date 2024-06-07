<?php

//! Config
///////////////////////////////////////////////////////////////////

// Root controllers

use App\Http\Controllers\Root\HomeController as RootHomeController;
use App\Http\Controllers\Root\DashboardController as RootDashboardController;
use App\Http\Controllers\Root\RenderController as RootRenderController;
use App\Http\Controllers\Root\EditionController as RootEditionController;
use App\Http\Controllers\Root\PlatformGroupController as RootPlatformGroupController;
use App\Http\Controllers\Root\LanguageController as RootLanguageController;
use App\Http\Controllers\Root\DocumentsController as RootDocumentsController;
use App\Http\Controllers\Root\CompanyController as RootCompanyController;

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

// Auto Redirect
Route::get('/', [RootHomeController::class, 'index'])->name('home');

Route::middleware(['layouts', 'lang'])->prefix('home')->name('root.')->group(function () {
    
    // Dashboard
    Route::get('/', [RootDashboardController::class, 'root'])->name('dashboard');

    // Lang
    Route::prefix('lang')->name('lang.')->group(function () {
        Route::post('/change', [RootLanguageController::class, 'changeLanguage'])->name('change');
    });
    
    // Serve pages
    Route::prefix('company')->name('company.')->group(function () {
        Route::get('contact-us', [RootCompanyController::class, 'contactUs'])->name('contact-us');
        Route::post('send-contact-message', [RootCompanyController::class, 'sendContactMessage'])->name('send-contact-message');
    });

    Route::prefix('platform-groups')->name('platform-groups.')->group(function () {
        Route::get('show/{id}', [RootPlatformGroupController::class, 'show'])->name('show');
        Route::get('filter-editions', [RootPlatformGroupController::class, 'renderFilteredEditions'])->name('filter-editions');
    });

    Route::prefix('editions')->name('editions.')->group(function () {
        Route::get('show/{id}', [RootEditionController::class, 'show'])->name('show');
    });

});