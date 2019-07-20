<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::middleware(['api'])->group(function() {
    //用户注册
    Route::post('/user/register', 'Home\UserController@register')->name('user-register');
    //用户登录
    Route::post('/user/login', 'Home\UserController@login')->name('user-login');

    Route::middleware('jwt')->group(function() {
        //根据用户id获取用户数据
        Route::get('/user', 'Home\UserController@user')->name('user');
        //获取用户列表
        Route::get('/users', 'Home\UserController@users')->name('users');
    });
});
