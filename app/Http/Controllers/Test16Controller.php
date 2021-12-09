<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Test16Controller extends Controller
{
    // 设置缓存
    public function test_cache1(Request $request){
        $name = $request -> input('name') ?? 'not name';
        Cache::put('name', "name");
        return 'ok';
    }

    public function test_cache2(Request $request){
        $name = $request -> input('name') ?? 'not name';
        return Cache::get("name");
    }

    public function test_cache3(Request $request){
        $name = $request -> input('name');
        $value = $request -> input('value');
        if($name == null || $value == null) {
            return '参数错误';
        } else {
            Cache::store('database') -> put($name, $value);
            return 'ok';
        }
    }

    public function test_cache4(Request $request) {
        $name = $request -> input('name') ?? 'name';
        return Cache::store('database') -> get($name);
    }


    public function test_cache5(Request $request){
        $name = $request -> input('name');
        $value = $request -> input('value');
        if($name == null || $value == null) {
            return '参数错误';
        } else {
            Cache::put($name, $value);
            return 'ok';
        }
        
    }


    public function test_cache6(Request $request){
        $name = $request -> input('name1111');
        return Cache::get($name, '默认test');
    }


    public function test_cache7(Request $request){
        $name = $request -> input('name');
        $value = $request -> input('value');
        return Cache::put($name, $value, $seconds = 10);
    }


    public function test_cache8(Request $request){
        $name = $request -> input('name');
        return Cache::forget($name);
    }


    public function test_cache9(Request $request){
        return cache()->flush();
    }
}

