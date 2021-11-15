<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test13Controller extends Controller
{
    //

    public function tttdks(){
        return "123";
    }

    public function test1(){
        // return response('这里不会调用');
        return redirect()->action([Test13Controller::class, 'test2']);
        
    }

    public function test3(){
        return response('这里不会调用11');
        return redirect()->action([Test13Controller::class, 'test2']);
        
    }

    public function test2(){
        return "test";
    }


    
    
}
