<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test3Controller extends Controller
{
    //

    public function test(Request $request){
        return '控制器 路由中间件';
    }

}
