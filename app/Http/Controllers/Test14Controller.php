<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class Test14Controller extends Controller
{
    //
    public function test1(Request $request){


        // dump($request->get('name'));
        // // dd($request->all());
        // return '123';


        $validata = $request->validate([
            'name' => 'required',
            'id' => 'required',
        ]);
        return response()->json(
            [
                'status' => 200,
                'message' => '校验成功',
                'data' => $request->all(),
                'method' => $request-> method(),
            ], 
            200);
        
    }

    public function test2(Request $request){
        $validator = $request -> validateWithBag('info_errors2', [
            'name' => 'required',
            'id' => 'required',
        ]);
        // return redirect()->back()->withErrors($validator, 'info_errors2');
        return response()->json(['status'=> 'ok', 'data'=>$request->all()]);
    }


    public function test4(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:30',
            'id' => 'required',
        ], $messages = [
            'name.required' => '指定属性错误提升',
            'name.min' => '指定错误属性',
            'required' => ':attribute 必须',
            // 'id' => 'id必须',
        ]);

        $validator->after(function ($validator) {
            echo '校验钩子';
            // if ($this->somethingElseIsInvalid()) {
            //     $validator->errors()->add(
            //         'field', 'Something is wrong with this field!'
            //     );
            // }
        });

        if($validator->fails()){
            return response()->json(['status'=> 'erorr', 'message'=> $validator->errors()]);;
        } 

        return response()->json(['status'=> 'ok']);
    }

    public function test5(ValidateTestRequest $request){
        if($request->isMethod('get')){
            return 'get ok';
        } else {
            return response()->json(['status'=> 'test5 ok']);
        }
    }


    public function test6(Request $request){
        $request->validate([
            'name' => 'required',
            'id' => 'required',
        ]);
        return 'test6 ok';
    }


    public function test7(Request $request){
        $request->validate([
            // 必须存在 并且不能为空
            'name' => 'required',
        ]);
        return response()->json(['message'=> 'test7 ok']);
    }

    public function test8(Request $request){
        $request->validate([
            // 只能 true / 1 中2选一常用用于同意协议
            'is_accepted' => 'accepted',
        ]);
        return response()->json(['message'=> 'test8 ok']);
    }

    public function test9(Request $request){
        $request->validate([
            // 必须为合法url
            'address' => 'active_url',
        ]);
        return response()->json(['message'=> 'test9 ok']);
    }

    public function test10(Request $request){
        $request->validate([
            // 只能大于给定日期
            'date' => 'after:2021-11-17',
        ]);
        return response()->json(['message'=> 'test10 ok']);
    }

    public function test11(Request $request){
        $request->validate([
            // 大于等于给定日期
            'date' => 'after_or_equal:2021-11-17',
        ]);
        return response()->json(['message'=> 'test11 ok']);
    }


    public function test12(Request $request){
        $request->validate([
            // 只能为字母
            'name' => 'alpha',
        ]);
        return response()->json(['message'=> 'test12 ok']);
    }


    public function test13(Request $request){
        $request->validate([
            // 限制为字母 数字 下划线 破折号
            'name' => 'alpha_dash',
        ]);
        return response()->json(['message'=> 'test13 ok']);
    }


    public function test14(Request $request){
        $request->validate([
            // 字母和数字
            'name' => 'alpha_num',
        ]);
        return response()->json(['message'=> 'test14 ok']);
    }


    public function test15(Request $request){

        dump($request->all());

        $request->validate([
            // 数组
            'name' => 'array',
        ]);
        return response()->json(['message'=> 'test15 ok']);
    }


    public function test16(Request $request){

        // dump($request->all());

        $request->validate([
            // 小于给定时间
            'date' => 'before:2021-11-17',
        ]);
        return response()->json(['message'=> 'test16 ok']);
    }


    public function test17(Request $request){

        // dump($request->all());

        $request->validate([
            // 小于等于给定时间
            'date' => 'before_or_equal:2021-11-17',
        ]);
        return response()->json(['message'=> 'test17 ok']);
    }

    public function test18(Request $request){

        // dump($request->all());
        // return '1000';
        $request->validate([
            // 小于等于给定时间
            'value' => 'between:1,10',
        ]);
        return response()->json(['message'=> 'test18 ok']);
    }
}
