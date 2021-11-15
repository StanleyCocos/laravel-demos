<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\UserModel;
use App\Http\Controllers;
use App\Models\Test1Model;
use App\Models\Test2Model;
use PHPUnit\Framework\Test;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'demo';
});

// 基础路由
Route::get('/base', function(){
    return "定义基础路由";
});

// 路由请求方式 - get
Route::get('type', function(){
    return "type: get";
});

// 路由请求方式 - post
Route::post('type', function(){
    return 'type: post';
});

// 路由请求方式 - put
Route::put('type', function(){
    return 'type: put';  
});

// 路由请求方式 - patch
Route::patch('type', function(){
    return 'type: patch';
});

// 路由请求方式 - delete
Route::delete('type', function(){
    return 'type: delete';
});

// 路由请求方式 -options
Route::options('type', function(){
    return 'type: options';
});

// 路由请求方式 -支持多种自定义
Route::match(['get', 'post'], 'match', function(){
    return 'type: get/post';
});

// 路由请求方式 - 支持所有请求方式
Route::any('any', function(){
    return '支持所有请求方式';
});


// 路由重定向
Route::get('old', function(){
    return '路由重定向 old';
});
Route::get('new', function(){
    return '路由重定向 new';
});
Route::get('new1', function(){
    return '路由重定向 new 301';
});
Route::redirect('/old', '/new');
Route::redirect('/old1', '/new1', 301);



// 视图路由
Route::view('view', 'view_test');


// 路由参数
Route::get('user/{id}', function($id){
    return "传入的id: $id";
});

// 多个参数
Route::get('work/{id}/image/{img_id}', function($id, $img_id){
    return "作品id: $id --- 图片id: $img_id";
});


// 可选参数
Route::get('/article/{id?}', function($id = 5){
    return "articleid默认是5 当前是: $id";
});

// 参数约束
Route::get('/cans/{id}', function($id){
    return '当前id参数只能为数字';
})->where('id', '[0-9]+');

// 全局约束指定参数
Route::get('/ljc/{ljc}', function($ljc){
    return "全局测试参数约束 -- RouteServiceProvider.php";
});


// 路由命名
Route::get('route-name', function(){
    // route('route name') 获取路由URL
    return route('route_name');
})->name('route_name');

// 重定向命名路由
Route::get('route_redirect', function(){
    // 重定向到指定命名路由
    return redirect()->route('route_name');
});

// 生成路由URL
Route::get('getRoutes/{id}', function($id){
    return route('getRoute', ['id'=> $id, 'cid'=> 2]);
})->name('getRoute');
Route::get('route_redirect1', function(){
    // 重定向到指定命名路由
    return redirect()->route('getRoute',['id'=> "0000000"]);
});

// 检查路由
Route::get('check', function(Request $request){
    if($request->route()->named('check')){
        return 'ok';
    }
    return "check";
})->name('check');


// 路由组
Route::middleware(['test'])->group(function(){
    Route::get('midd', function(){
        return "1";
    });
    Route::get('midd1', function(){
        return "2";
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/user', function(){
        return "admin.user";
    });

    Route::post('login', function(){
        return 'ok';
    });
});

Route::prefix('admin')->middleware(['test'])->group(function(){
    Route::get('/user', function(){
        return "admin.user";
    });

    Route::post('login', function(){
        return 'ok';
    });
});

// 路由组 键值对方式定义
Route::group([
    'middleware'=>'test',
    'prefix' => 'admin',
], function(){
    Route::get('midd3', function(){
        return "5";
    });
});


// 路由model 隐式绑定
Route::post('create', function(){
    $user = new UserModel();
    $user->name = 'test';
    $user->save();
    return 'ok';
});
Route::get('/test_user/{user}', function(UserModel $user){
    return response()->json(["name"=> $user->id]);
});

// 路由绑定 缺失处理
Route::get('/test1_user/{user}', function(UserModel $user){
    return response()->json(["name"=> $user->id]);
})->missing(function(){
    return response()->json(["message"=> "没有该用户"]);
});

// 路由显示绑定 -- RouteServiceProvider.php
Route::get('test2_user/{user_id}', function(UserModel $user){
    return response()->json(["name"=> $user->id]);
});

// 自定义绑定
Route::get('test3_user/{test_id}', function(UserModel $user){
    return response()->json(["name"=> $user->id]);
});

Route::get('test4_user/{user}', function(UserModel $user){
    return response()->json(["id"=> $user->id]);
});


// 默认路由 当找不到路由时 会进入到这里
Route::fallback(function (Request $request) {
    return response()->json([  
        'message' => '未找到路由哦', 
        'url' => $request->url(),
        'd' => $request->all(),
    ]);
});

/**************************************************************************/

// 中间件
Route::get('/middleware_test1', function(){
    return ' 这里之前会进入到中间件';
})->middleware('middleware_test1');

// 前置中间件
Route::get('/middleware_test2', function(){
    return ' 这里之前会进入到中间件';
})->middleware('middleware_test2');

// 后置中间件
Route::get('/middleware_test3', function(){
    return ' 这里之前会进入到中间件';
})->middleware('middleware_test3');

// 中间件排序
Route::get('middleware_sort', function(){
    return '这里是中间件排序';
})->middleware(['middleware_test5', 'middleware_test6', 'middleware_test4']);

// 中间件参数
Route::get('/middleware_parame', function(){
    return '这里是中间件传递参数';
})->middleware('middleware_parame:123123');

// 中间件 terminable
Route::get('/middleware_terminable', function(){
    echo time();
    // sleep(2);
    return '中间件后 terminable 调用';
})->middleware('middleware_terminable');


/**************************************************************************/
// 基础路由控制器
Route::get('/controller_base', [Controllers\Test1Controoler::class, 'test']);

// 单行为控制器
Route::get('/controller_invoke', Controllers\Test2Controller::class);

// 控制器 路由中间件
Route::get('/controller_middleware', [Controllers\Test3Controller::class, 'test'])->middleware('controller_middleware');

// 控制器 构造中间件
Route::get('/controller1_middleware', [Controllers\Test4Controller::class, 'test1']);

// 控制器 构造中间件方法限制
Route::get('/controller2_middleware', [Controllers\Test4Controller::class, 'test2']);

// 控制器 构造中间件方法限制
Route::get('/controller3_middleware', [Controllers\Test4Controller::class, 'test3']);

// 资源控制器 路由定义
Route::resource('/resources', Controllers\Resource1Controller::class);

// 资源控制 model绑定
Route::resource('/resources_bind', Controllers\ImageController::class);

// 资源控制 路由定义 限制方法
Route::resource('/resources1', Controllers\Test5Controller::class)->only(['index', 'store']);

// 资源控制 路由定义 限制方法
Route::resource('/resources2', Controllers\Test6Controller::class)->except(['show', 'store']);

// api资源控制器
Route::apiResource('/apiResources', Controllers\Test7Controller::class);

// 资源路由名称调整
Route::resource('/resources3', Controllers\Test8Controller::class)->names([
    'create' => 'resources3.build',
]);
Route::get('/resources_name', function(){
    return redirect()->route('resources3.build');
});

// 资源路由参数调整
Route::resource('/resources4', Controllers\Test10Controller::class)->parameters([
    'resources4' => 'test1Model',
]);


// 资源动作自定义
// /resources5/abc 自定义路由必须在资源路由前面 否则会被覆盖
Route::get('/resources5/abc', [Controllers\Test11Controller::class, 'test']); 
Route::resource('/resources5', Controllers\Test11Controller::class);


/**************************************************************************/
// 参数注入
// 回调注入
Route::get('/request0', function(Request $request){
    return $request->url();
});
// 控制器注入
Route::get('/request1', [Controllers\Test12Controller::class, 'test']);

// 自定义参数注入
Route::get('/request2/{id}', [Controllers\Test12Controller::class, 'test1']);

// Request 方法-path()
Route::get('/request3/test', [Controllers\Test12Controller::class, 'test2']);

// Request 方法-匹配 is() and routeIs()
Route::get('/request4/match', [Controllers\Test12Controller::class, 'test3']);
Route::get('/request5/match', [Controllers\Test12Controller::class, 'test4']);

// Request 方法 获取url url() and fullUrl
Route::get('/request6', [Controllers\Test12Controller::class, 'test5']);
Route::get('/request7', [Controllers\Test12Controller::class, 'test6']);

// Request 方法 判断请求方式 一般用到 支持多种请求方式 isMethod
Route::any('/request8', [Controllers\Test12Controller::class, 'test7']);


//  Request 方法 header
Route::get('/request9', [Controllers\Test12Controller::class, 'test8']);
Route::get('/request10', [Controllers\Test12Controller::class, 'test9']);

// Request 方法 获取客户端ip
Route::get('/request11', [Controllers\Test12Controller::class, 'test10']);

// Request 方法 获取请求内容类型
Route::get('/request12', [Controllers\Test12Controller::class, 'test11']);

// Request 方法 参数
Route::post('/request13', [Controllers\Test12Controller::class, 'test12']);
Route::post('/request14', [Controllers\Test12Controller::class, 'test13']);
Route::post('/request15', [Controllers\Test12Controller::class, 'test14']);
Route::post('/request16', [Controllers\Test12Controller::class, 'test15']);
Route::get('/request17', [Controllers\Test12Controller::class, 'test16']);
Route::get('/request18', [Controllers\Test12Controller::class, 'test17']);
Route::any('/request19', [Controllers\Test12Controller::class, 'test18']);
Route::get('/request20', [Controllers\Test12Controller::class, 'test19']);
Route::get('/request21', [Controllers\Test12Controller::class, 'test20']);
Route::get('/request22', [Controllers\Test12Controller::class, 'test21']);
Route::get('/request23', [Controllers\Test12Controller::class, 'test22']);
Route::get('/request24', [Controllers\Test12Controller::class, 'test23']);




/**************************************************************************/

// 响应
Route::get('/response1', function(Request $request){
    return '直接返回字符串';
});
// 返回数组 会转换成json
Route::get('/response2', function(Request $request){
    return [
        'state' => 200,
        'message' => '直接返回数组会自动转换成json',
    ];
});

// response 返回响应
Route::get('/response3', function(Request $request){
    return response('response 字符串', 202);
});

// response 修改头部
Route::get('/response4', function(Request $request){
    // return response('response 添加头部', 202)->header('header_ljc', 'header_value');
    return response(["a"=> 'b', "name"=>'ljc'])->withHeaders(
        [
            'test' => 'test_value',
            'key2' => 'key2_value', 
        ]
        );
});
// 响应模型
Route::get('/response5/{test}', function(Request $request, Test1Model $test){
    return $test;
});
// 添加cookie
Route::get('/response6', function(Request $request){
    return response('添加cookie: test')->cookie('test', 'ssssssss', 24 * 60);
});
// 删除cookie
Route::get('/response7', function(Request $request){
    return response('删除cookie: tesgt')->withoutCookie('test');
});

// cookie 明文
Route::get('/response8', function(){
    return response('测试cookie 明文')->cookie('cookie_test_key', '123456', 24 * 60);
});


// 重定向
Route::get('/response9_old', function(){
    return redirect('response9_new');
});
Route::get('/response9_new', function(){
    return response('这是response9_old 重定向后的响应');
});

Route::get('/response11_old', function(){
    return redirect()->route('response11_new', ['id'=> 20]);
});

Route::get('/response11_new/{id}', function($id){
    return response()->json([
        "message" => '这个是指定路由重定向响应',
        'id' => "这个是id参数 $id",
    ]);
})->name('response11_new');

// 重定向 模型参数
Route::post('/response12_create', function(){
    $test = new Test2Model();
    $test->name = 'xxxx';
    $test->age = '4';
    $test->save();
    return 'ok';
});

Route::get('/response12_old/{test}', function(Request $request, Test2Model $test){
    // return $test;
    return redirect()->route('response12_new', [$test]);
});

Route::get('/response12_new/{test}', function(Request $request, Test2Model $test){
    // return '123';
    return $test;
})->name('response12_new');




// 返回上个请求路由内容
Route::get('/response10', function(){
    return back()->withInput();
});

Route::get('/response14', [Controllers\Test13Controller::class, 'test2']);
Route::get('/response13', [Controllers\Test13Controller::class, 'test1']);

// 重定向到外部
Route::get('/response15', function(){
    return redirect()->away('https://www.google.com');
});

/// 返回视图
Route::get('/response16', function(){
    return response()->view('view_test');
});

// 响应宏
Route::get('response17', function(){
    return response()->caps('foo');;
});


/**************************************************************************/

// 创建URL
Route::get('/url1', function(){
    return url('/dfadsfasd/55');
});
// 获取当前url 不带query
Route::get('/url2', function(){
    // return url()->current();
    return URL::current();
});
// 获取当前url 带query
Route::get('/url3', function(){
    // return url()->full();
    return URL::full();
});
// 获取上一次请求url
Route::get('url4', function(){
    // return url()->previous();
    return URL::previous();
});

// 获取路由url
Route::get('/url5/{id}', function($id){
    return "url5 $id";
})->name('url5');

Route::get('/url6', function(){
    return route('url5', ['id'=> 5]);
});

// 模型参数 自动获取主键当做参数传递
Route::get('url7', function(){
    $test = Test2Model::find('1');
    return route('url5', ['id'=> $test]);
});

// 签名加密url
Route::get('/url9/{id}', function(Request $request ,$id){
    if(! $request->hasValidSignature()){
        return "被篡改";
    }
    return "url9 $id";
})->name('url9');
Route::get('/url8', function(){
   return URL::signedRoute('url9', ['id'=> '5']);
});

// 创建带时效性的签名url
Route::get('/url10', function(){
    return URL::temporarySignedRoute('url9', now()->addSecond(30), ["id"=> 20]);
});

Route::get('/url11', function(){
    return action([Controllers\Test13Controller::class, 'test2']);
});


Route::get('/url12/{locale}', function(){
    return URL::current();
})->name('url12');

Route::get('/url13', function(){
    return route('url12');
});



/**************************************************************************/

// 获取所有session
Route::get('/session1', function(Request $request){
    // return session()->all();
    return $request->session()->all();
});

// 获取单个session 
Route::get('/session2', function(Request $request){
    return session()->get('_token1',  '没有找到');
    // return $request->session()->get('_token1', '没有找到');
});

// 设定session 回调处理缺省值
Route::get('/session3', function(Request $request){
    // session(['_token2' => '新设置的值']);
    // $request->session()->put('_token3', 'dafadsfas');
    // $request->session()->push('user.info', 'test');
    // $request->session()->put([
    //     'user1' => [
    //         'name' => 'ljc',
    //         'time' => '123',
    //     ],
    //     'data' => [
    //         '1',
    //     ],
    //     'name' => 'ljc',
    // ]);
       

    return $request->session()->get('_token3', function(){
        return "没有找到";
    });
});

// 判断是否存在
Route::get('/session4', function(){
    if(session()->has('_token2')){
        return '存在token';
    } else {
        return '不存在token';    
    }
});

// 判断是否存在且不为空
Route::get('/session5', function(){
    if(session()->exists('_token2')){
        return '存在且不为空';
    } else {
        return '不存在或者为空';
    }
});

// 删除session
Route::delete('/session6', function(Request $request){
    // session()->pull('');
    return $request -> session()->pull('_token2', '123456');
    return session()->all();
});

// 加减操作
Route::get('/session7', function(){
    // session()->put('count', 0);
    // 加
    // session()->increment('count');
    // session()->increment('count', $incrementBy = 3);
    // 减
    // session()->decrement('count');
    // session()->decrement('count', $incrementBy=2);

    return session()->all();
    // session() -> 
    // return session()->all();
});

// 保存至下次请求
Route::get('/session8', function(){
    session()->flash('status', 'Task was successful!');
    return session()->all();
});

// 
Route::get('/session9', function(){
    // session()->reflash('status');
    session()->keep(['status']);
    return session()->all();
});