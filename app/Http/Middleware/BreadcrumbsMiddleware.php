<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetBreadcrumbsMiddleware
{
    public function handle($request, Closure $next)
    {
        $routeName = Route::currentRouteName();
        $breadcrumbs = $this->generateBreadcrumbs($routeName);

        view()->share('breadcrumbs', $breadcrumbs);

        return $next($request);
    }

    protected function generateBreadcrumbs($routeName)
    {
        $breadcrumbs = [];

        $segments = explode('.', $routeName);
        $url = '';

        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $title = ucwords(str_replace('-', ' ', $segment));
            $breadcrumbs[] = [
                'title' => $title,
                'url' => $url
            ];
        }

        return $breadcrumbs;
    }
}
