<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test12Controller extends Controller
{
    //

    public function test(Request $request){
        echo $request->url();
        return response()->json(['message'=> '参数注入']);
    }


    public function test1(Request $request, $id){
        return $id;
    }

    public function test2(Request $request){
        return $request->path();
    }

    public function test3(Request $request){
        return $request->is('request4/*');
    }

    public function test4(Request $request){
        return $request->routeIs('request4/*');
    }

    public function test5(Request $request){
        return $request->url();
    }

    public function test6(Request $request){
        return $request->fullUrl();
    }

    public function test7(Request $request){
        if($request->isMethod('post')){
            return 'post';
        } else if($request->isMethod('get')){
            return 'get';
        } else if($request->isMethod('put')){
            return 'put';
        } 
        return '未知';
    }

    public function test8(Request $request){
        return response()->json($request->header());
    }

    public function test9(Request $request){
        return $request->header('cookie', '');
    }
    
    public function test10(Request $request){
        return $request->ip();
    }

    public function test11(Request $request){
        return $request->getAcceptableContentTypes();
    }

    public function test12(Request $request){
        return $request->all();
    }

    public function test13(Request $request){
        return $request->input('name', '1');
    }

    public function test14(Request $request){
        return $request->input('name', '1');
    }


    public function test15(Request $request){
        return $request->query('id');
        return $request->input('id', '没有name');
    }

    public function test16(Request $request){
        return $request->only(['id', 'name']);
    }

    public function test17(Request $request){
        return $request->except(['id', 'name']);
    }

    public function test18(Request $request){
        // return $request->input();
        // echo $request->input();
        if($request->has('name')){
            return $request->name;
        } else {
            return '不存在name';
        }

        // if($request->has(['name', 'ddd'])){
        //     return $request->name;
        // } else {
        //     return '不存在name';
        // }
    }

    public function test19(Request $request){
        $request->whenHas('name', function(){
            return 'callback';
        });
        return 'content json';
    }


    public function test20(Request $request){
        if($request->hasAny(['name', 'keys'])){
            return "ok";
        } else {
            return 'not key';
        }
    }


    public function test21(Request $request){
        if($request -> filled('name')){
            return '存在 并且不为空';
        } else {
            return '不存在 或者 为空';
        }
    }

    public function test22(Request $request){
        $request->whenFilled('name', function(){
            echo '存在 并且不为空';
        });
        return "ok";
    }


    public function test23(Request $request){
        if($request->missing('name')){
            return 'not keys';
        } 
        return 'ok';
    }



    

}
