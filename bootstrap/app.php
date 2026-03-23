<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // ── Global web middleware ──────────────────────────────
        $middleware->web(append: [
            \App\Http\Middleware\SupabaseAuthMiddleware::class,
            \App\Http\Middleware\SetActiveWorkspace::class,
        ]);

        // ── CSRF exceptions ────────────────────────────────────
        $middleware->validateCsrfTokens(except: [
            'f/*',
            'f/*/*',
            'api/f/*',
            'api/paddle/webhook',
            'submit/*',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();