<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\TestUser;
use App\Http\Middleware\ValidUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['testuser'=>TestUser::class, 'validuser'=>ValidUser::class]);
        // $middleware->prependToGroup('ok-user',[TestUser::class,ValidUser::class]); //both are working same
        // $middleware->appendToGroup('ok-user',[TestUser::class,ValidUser::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
