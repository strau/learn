<?php
use \Illuminate\Support\Facades\Route;
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

Route::get('/', function() {
    return "OK";
});
Route::get('/run', 'RunController@run');

/*
|--------------------------------------------------------------------------
|回退路由应始终是你应用程序注册的最后一个路由。
|--------------------------------------------------------------------------
|
|如果没有匹配到任何路由，返回vue的单页面入口
|如果前端路由也没有匹配到
|由前端渲染404页面
*/
Route::fallback(function () {
    // TODO：改为不是闭包的写法，方便缓存路由
    return view('app');
});
