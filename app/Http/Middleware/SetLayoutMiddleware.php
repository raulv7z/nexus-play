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
            view()->share('getLayout', 'admin');
        } elseif ($user) {
            view()->share('getLayout', 'app');
        } else {
            view()->share('getLayout', 'guest');
        }

        return $next($request);
    }
}
