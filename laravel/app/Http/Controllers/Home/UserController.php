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
}
