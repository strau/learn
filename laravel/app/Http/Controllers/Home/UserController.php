<?php

namespace App\Http\Controllers\Home;


use App\Common\Res;
use App\Common\Utils;
use App\Http\Logics\UserLogic;
use App\Models\Home\UserModel;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * 前台用户注册
     *
     * @param UserLogic $userLogic
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\DatabaseException
     * @throws \App\Exceptions\ValidatorFailedException
     * User: KANG
     * Date: 2019/7/18
     * Time: 17:10
     */
    public function register(UserLogic $userLogic)
    {
        $user = new UserModel();
        $user->user_name     = Utils::clean($this->request->name);    //用户名称
        $user->user_phone    = Utils::clean($this->request->phone);    //用户电话
        $user->user_password = Utils::clean($this->request->password);    //未加密的密码

        return $userLogic->register($user);
    }

    /**
     * 前台用户登录
     *
     * @param UserLogic $userLogic
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ValidatorFailedException
     * User: KANG
     * Date: 2019/7/19
     * Time: 19:25
     */
    public function login(UserLogic $userLogic)
    {
        $user_phone    = Utils::clean($this->request->phone);    //用户电话
        $user_password = Utils::clean($this->request->password);    //未加密的密码

        return $userLogic->login($user_phone, $user_password);
    }

    /**
     * 根据用户id获取用户数据
     *
     * @param UserLogic $userLogic
     * @return array|\Illuminate\Http\JsonResponse
     * Author : KANG
     * Date   : 2019/7/20
     * Time   : 16:11
     */
    public function user(UserLogic $userLogic)
    {
        $user_id = (int) $this->request->id;    //用户id
        $user    = $userLogic->user($user_id);
        if (!$user) {
            return Res::response(Res::CODE_NO_DATA, '暂无数据');
        }

        return Res::response(Res::CODE_SUCCESS, 'OK', $user, function($v) {
            unset($v->deleted_at);
            return $v;
        });
    }

    //获取用户列表
    public function users(UserLogic $userLogic)
    {
        $users = $userLogic->users();
        if ($users->isEmpty()) {
            return Res::response(Res::CODE_NO_DATA, '暂无数据');
        }

        return Res::response(Res::CODE_SUCCESS, 'OK', $users, function($user) {
            unset($user->deleted_at);
            return $user;
        });
    }
}
