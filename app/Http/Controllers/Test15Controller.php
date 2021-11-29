<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Test15Controller extends Controller
{
    //


    public function test1(Request $request){

        Log::debug('debug 日志');
        return 'ok';
    }


    public function test2(Request $request){

        Log::emergency('emergency 日志');
        return 'ok';
    }

    public function test3(Request $request){

        Log::alert('alert 日志');
        return 'ok';
    }

    public function test4(Request $request){
        
        Log::critical('critical 日志');
        return 'test4 ok';
    }

    public function test5(Request $request){
        
        Log::error('error 日志');
        return 'test5 ok';
    }


    public function test6(Request $request){
        
        Log::warning('warning 日志');
        return 'test6 ok';
    }
    
    public function test7(Request $request){
        
        Log::notice('notice 日志');
        return 'test7 ok';
    }


    public function test8(Request $request){
        Log::info('info 日志');
        return 'test8 ok';
    }
}
