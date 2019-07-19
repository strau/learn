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
});
