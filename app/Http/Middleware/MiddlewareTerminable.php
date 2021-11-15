<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MiddlewareTerminable
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
        echo '开始写文件';
        
        return $next($request);
    }

    public function terminable($request, $response){
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $txt = "Bill Gates\n";
        fwrite($myfile, $txt);
        $txt = "Steve Jobs\n";
        fwrite($myfile, $txt);

        $txt = time();
        fwrite($myfile, $txt);
        fclose($myfile); 
    }
}
