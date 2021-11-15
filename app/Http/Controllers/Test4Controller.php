<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test4Controller extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('controller1_middleware');
        // 只设定有效方法
        $this->middleware('controller1_middleware')->only('test2');
        $this->middleware('controller2_middleware')->only(['test1', 'test2']);
        // 只设定排除方法
        $this->middleware('controller3_middleware')->except(['test1', 'test2']);
        // 回调方式定义中间件
        $this->middleware(function($request, $next){
            echo '这是回调方式定义中间件';
            return $next($request);
        });

    }

    public function test1(Request $request){

        return '控制器 构造 添加中间件';
    }


    public function test2(Request $request){
        return "构造器中间件方式限制";
    }

    public function test3(Request $request){
        return "构造器中间件方式限制-多个";
    }

    public function test4(Request $request){
        return "构造器中间件方式限制-排除";
    }
}
