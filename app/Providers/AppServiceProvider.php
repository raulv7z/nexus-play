<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\PlatformGroup;
use App\Models\Edition;
use App\Models\Platform;
use App\Models\Videogame;
use App\Observers\CartObserver;
use App\Observers\EditionObserver;
use App\Observers\VideogameObserver;
use App\Observers\PlatformGroupObserver;
use App\Observers\PlatformObserver;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register model observers
        $this->registerObservers();

        // Register validator functions
        $this->registerValidatorCustomRules();

        // Register view composers
        View::composer('*', function ($view) {
            $view->with('platformGroups', PlatformGroup::all());
        });
    }

    /**
     * Register model observers.
     */
    protected function registerObservers(): void
    {
        Videogame::observe(VideogameObserver::class);
        PlatformGroup::observe(PlatformGroupObserver::class);
        Platform::observe(PlatformObserver::class);
        Edition::observe(EditionObserver::class);
        Cart::observe(CartObserver::class);
    }

    protected function registerValidatorCustomRules(): void
    {
        // Luhn credit cards rule

        Validator::extend('luhn_credit_card', function ($attribute, $value, $parameters, $validator) {
            $value = preg_replace('/\D/', '', $value);
            $digits = str_split(strrev($value));
            $sum = 0;
            $alt = false;
            foreach ($digits as $digit) {
                $digit = intval($digit);
                if ($alt) {
                    $digit *= 2;
                    if ($digit > 9) {
                        $digit -= 9;
                    }
                }
                $sum += $digit;
                $alt = !$alt;
            }
            return $sum % 10 === 0;
        });
    }
}
