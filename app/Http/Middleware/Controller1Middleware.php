<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Controller1Middleware
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
        echo '这是控制器中间件1';
        return $next($request);
    }
}
