<?php

namespace App\Http\Controllers\Home;


use App\Common\Res;
use App\Common\Utils;
use App\Http\Logics\UserLogic;
use App\Models\Home\UserModel;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function register(UserLogic $userLogic)
    {
        $user = new UserModel();
        $user->user_name     = Utils::clean($this->request->name);    //用户名称
        $user->user_phone    = Utils::clean($this->request->phone);    //用户电话
        $user->user_password = Utils::clean($this->request->password);    //未加密的密码

        return $userLogic->register($user);
    }
}
