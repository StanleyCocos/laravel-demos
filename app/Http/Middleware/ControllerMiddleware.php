<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControllerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        echo '控制器-路由中间件 ';
        return $next($request);
    }
}
