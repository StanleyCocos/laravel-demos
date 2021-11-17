<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class ValidateTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'id' => 'required',
        ];
    }


    // public function messages()
    // {
    //     // return '123';
    //     return [
    //         'required' => ':attribute 必须',
    //     ];
    // }


    // public function withValidator(){
    //     // echo 'withValidator';
    // }


    // protected function  failedValidation(Validator $validator)
    // {
    //     $error = $validator->errors()->all();
    //     throw new HttpResponseException(response()->json(['code'=>400,'msg'=>'数据校验失败','data'=>$error],500));
    // } //failedValidation(){}
}
