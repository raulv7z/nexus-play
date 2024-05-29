<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetLayoutMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->hasRole('admin')) {
            view()->share('getLayout', 'layouts.admin');
        } elseif ($user) {
            view()->share('getLayout', 'layouts.app');
        } else {
            view()->share('getLayout', 'layouts.guest');
        }

        return $next($request);
    }
}
