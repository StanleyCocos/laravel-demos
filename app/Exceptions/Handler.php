<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Mockery\Exception\InvalidOrderException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
           # return response(['key1'=>'value']);;
        });

        // $this->renderable(function (InvalidOrderException $e, $request) {
        //     return response()->view('errors.invalid-order', [], 500);
        // });
    
    }

    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        if ($e->response) {
            return $e->response;
        }
        // return response()->json(['message'=> '123'], 422);
        return response()->json($e->validator->errors()->getMessages(), 422);
    }

    // public function render($request)
    // {
    //     return response(['key'=>'value'], 402);
    // }

    // protected function convertExceptionToArray(Throwable $e)
    // {   
    //     echo '12';
    //     return $e->getMessage();
    // } //convertExceptionToArray(Exception $e){
    //     return [
    //         "ee" => 11,
    //     ];
    // }

//    protected function invalidJson($request, ValidationException $exception)
//    {
//        return $exception->getMessage();
//    }

//    protected function unauthenticated($request, AuthenticationException $exception)
//    {
//        return $exception->getMessage();
//    }

   

//    public function render($request, Exception $exception){

//         return parent::render($request, $exception);
//    }


//    public function render($request, Exception $exception)
//     {
//         //????????????????????????api/???????????????????????? api ???????????????
//         if($request->is("api/*")){
//             //??????????????? ValidationException????????????????????????????????????????????????
//             if($exception instanceof ValidationException){
//                 $result = [
//                     "statusCode"=>ERR_PARAMETER,
//                     //???????????? $exception->errors() ????????????????????????????????????????????????????????????????????????                ?????????array_values()???????????????????????????????????????????????????????????????????????? [0][0]
//                     "errorMsg"=>array_values($exception->errors())[0][0],
//                     "returnResult"=>null
//                 ];
//                 return response()->json($result);
//             }
//         }

//         return parent::render($request, $exception);
//     }

    // public function render($request, Throwable $e){
    //     return $e->error()->all();
    //     return parent::render($request, $e);
    // }


    // public function convertValidationExceptionToResponse(ValidationException $e, $request)
    // {
    //     $data = $e->validator->getMessageBag();
    //     // $msg = collect($data)->first();
    //     // if(is_array($msg)){
    //     //     $msg = $msg[0];
    //     // }
    //     return $data -> first();
    // }
}
