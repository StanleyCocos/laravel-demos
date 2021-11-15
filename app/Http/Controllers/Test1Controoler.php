<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test1Controoler extends Controller
{
    //
    public function test(Request $request){
        return "这是基础控制器";
    }
}
