<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\PostTooLargeException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'guest' => \App\Http\Middleware\Guest::class,
            'role' => \App\Http\Middleware\CheckRole::class,
            'auth' => \App\Http\Middleware\Auth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (PostTooLargeException $exception) {
            return response(
                'Ukuran upload terlalu besar. Maksimal total upload adalah 64 MB, banner maksimal 15 MB, dan dokumentasi maksimal 5 MB per gambar.',
                413
            );
        });
    })->create();
