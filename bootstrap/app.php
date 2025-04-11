<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'AuthAdmin' => \App\Http\Middleware\AuthAdmin::class,
            'AuthResident' => \App\Http\Middleware\AuthResident::class,
            'AuthStaff' => \App\Http\Middleware\AuthStaff::class,
            'VerifyResident' => \App\Http\Middleware\VerifyResident::class,
            'CheckPWA' => \App\Http\Middleware\CheckPWA::class,
            'PwaRedirect' => \App\Http\Middleware\PwaRedirect::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

