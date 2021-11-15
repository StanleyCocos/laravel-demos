<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Fruitcake\Cors\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'test'=> \App\Http\Middleware\TestMiddleware::class,
        // 中间件
        'middleware_test1' => \App\Http\Middleware\MiddlewareTest1::class,
        // 前置中间件
        'middleware_test2' => \App\Http\Middleware\MiddlewareTest2::class,
        // 后置中间件
        'middleware_test3' => \App\Http\Middleware\MiddlewareTest3::class,

        // 中间件 排序测试
        'middleware_test4' => \App\Http\Middleware\MiddlewareTest4::class,
        'middleware_test5' => \App\Http\Middleware\MiddlewareTest5::class,
        'middleware_test6' => \App\Http\Middleware\MiddlewareTest6::class,
        'middleware_parame' => \App\Http\Middleware\MiddlewareParame::class,
        'middleware_terminable' => \App\Http\Middleware\MiddlewareTerminable::class,
        'controller_middleware' => \App\Http\Middleware\ControllerMiddleware::class,
        'controller1_middleware'=> \App\Http\Middleware\Controller1Middleware::class,
        'controller2_middleware'=> \App\Http\Middleware\Controller2Middleware::class,
        'controller3_middleware'=> \App\Http\Middleware\Controller3Middleware::class,

        // 默认参数
        'default_cans_middleware' => \App\Http\Middleware\URLDefaultMiddleware::class,
    ];




    protected $middlewarePriority = [
        \App\Http\Middleware\MiddlewareTest5::class,
        \App\Http\Middleware\MiddlewareTest4::class,
        \App\Http\Middleware\MiddlewareTest6::class
    ];
}
