<?php

use App\Http\Middleware\HandleAppearance;
use App\Http\Middleware\SecurityHeaders;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->encryptCookies(except: ['appearance', 'sidebar_state']);

        $middleware->web(append: [
            SecurityHeaders::class,
            HandleAppearance::class,
            HandleInertiaRequests::class,
            AddLinkHeadersForPreloadedAssets::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Galat yang terjadi saat aplikasi masih sehat dirender sebagai halaman
        // Inertia, supaya navbar dan footer ikut tampil dan pengunjung punya
        // jalan keluar. 500 dan 503 sengaja tidak ada di sini: keduanya justru
        // muncul saat basis data atau hasil build bisa jadi tidak tersedia, dan
        // ditangani resources/views/errors/{500,503}.blade.php yang berdiri
        // sendiri tanpa kueri maupun aset Vite.
        $exceptions->respond(function (Response $response, \Throwable $e, Request $request) {
            $status = $response->getStatusCode();

            // Dashboard memakai Blade dan template Bootstrap "Berry"; chrome
            // situs publik tidak pada tempatnya di sana.
            if ($request->expectsJson() || $request->is('dashboard', 'dashboard/*')) {
                return $response;
            }

            if (! in_array($status, [401, 403, 404, 419, 429], true)) {
                return $response;
            }

            return Inertia::render('Error', ['status' => $status])
                ->toResponse($request)
                ->setStatusCode($status);
        });
    })->create();
