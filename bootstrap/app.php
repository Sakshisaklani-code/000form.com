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
        // ✅ All middleware in ONE call
        $middleware->web(append: [
            \App\Http\Middleware\SupabaseAuthMiddleware::class,
            \App\Http\Middleware\SetActiveWorkspace::class,
        ]);

        // CSRF exceptions
        $middleware->validateCsrfTokens(except: [
            'f/*',
            'f/*/*',
            'api/f/*',
            'submit/*',
            'http://127.0.0.1:8000/f/*',
            '127.0.0.1:8000/f/*',
            'localhost:8000/f/*',
            'api/paddle/webhook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();