<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use \Spatie\Permission\Middleware\RoleMiddleware;
use \Spatie\Permission\Middleware\PermissionMiddleware;
use \Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use \App\Http\Middleware\SetLayoutMiddleware;
use \App\Http\Middleware\SetBreadcrumbsMiddleware;
use \App\Http\Middleware\SetLanguageMiddleware;
use \App\Http\Middleware\EnsureAjaxRequestMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'layouts' => SetLayoutMiddleware::class,
            'breadcrumbs' => SetBreadcrumbsMiddleware::class,
            'lang' => SetLanguageMiddleware::class,
            'ajax' => EnsureAjaxRequestMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
