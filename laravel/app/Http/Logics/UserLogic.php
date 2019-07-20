<?php
namespace App\Http\Logics;

use App\Common\Res;
use App\Exceptions\DatabaseException;
use App\Models\Home\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * 逻辑处理层基类
 */
class UserLogic extends BaseLogic
{
    /**
     * 前台用户注册
     *
     * @param UserModel $user
     * @return \Illuminate\Http\JsonResponse
     * @throws DatabaseException
     * @throws \App\Exceptions\ValidatorFailedException
     * User: KANG
     * Date: 2019/7/18
     * Time: 17:11
     */
    public function register(UserModel $user)
    {
        //验证数据
        $vd = $vr = $vm = [];

        $vd['name']            = $user->user_name;
        $vr['name']            = ['required', 'between:1,32'];
        $vm['name.required']   = '请填写名称';
        $vm['name.between']    = '名称长度必须在1-32个字';

        $vd['phone']           = $user->user_phone;
        $vr['phone']           = ['required', 'regex:' . UserModel::PHONE_REG,
                                  'unique:user_users,user_phone'];
        $vm['phone.required']  = '请填写手机号码';
        $vm['phone.regex']     = '手机号码格式不正确';
        $vm['phone.unique']    = '手机号码已经注册，请确认后再试';

        $vd['password']           = $user->user_password;
        $vr['password']           = ['required'];
        $vm['password.required']  = '请填写密码';

        validate($vd, $vr, $vm);

        $user->user_password   = bcrypt($user->user_password);    //加密密码
        $user->user_updated_at = $user->user_created_at = date('Y-m-d H:i:s');
        try {
            $user->save();
        } catch (\Exception $e) {
            //TODO:记录日志
            throw new DatabaseException();
        }
        return Res::response(Res::CODE_SUCCESS);
    }

    /**
     * 前台用户登录
     *
     * @param string $user_phone 手机号
     * @param string $user_password 未加密的密码
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ValidatorFailedException
     * User: KANG
     * Date: 2019/7/19
     * Time: 19:16
     */
    public function login($user_phone, $user_password)
    {
        //验证数据
        $vd = $vr = $vm = [];

        $vd['phone']           = $user_phone;
        $vr['phone']           = ['required', 'regex:' . UserModel::PHONE_REG];
        $vm['phone.required']  = '请填写手机号码';
        $vm['phone.regex']     = '手机号码格式不正确';

        $vd['password']           = $user_password;
        $vr['password']           = ['required'];
        $vm['password.required']  = '请填写密码';

        validate($vd, $vr, $vm);

        $user = UserModel::where('user_phone', $user_phone)->first();
        if (!$user) {
            return Res::response(Res::CODE_DATA_ERR, '用户不存在');
        }

        //验证用户账号状态
        if ($user->user_status === UserModel::STATUS_LOCK) {
            //锁定
            return Res::response(Res::CODE_DATA_ERR, '您的密码输入错误次数过多，请联系管理员或明日再试');
        }
        if ($user->user_status === UserModel::STATUS_STOP) {
            //封号
            return Res::response(Res::CODE_DATA_ERR, '您的账号已封号，请联系管理员');
        }

        //验证密码是否正确
        if (!verifyPassword($user_password, $user->user_password)) {
            //密码不正确，密码错误次数+1
            $user->user_error += 1;
            if ($user->user_error >= 5) {
                $user->user_status = UserModel::STATUS_LOCK;
            }
            try {
                $user->save();
            } catch (\Exception $e) {
                //TODO:记录日志
                throw new DatabaseException();
            }
            return Res::response(Res::CODE_DATA_ERR, '密码不正确，您今日还有' . (5 - $user->user_error) . '次机会');
        }

        $token = auth()->guard('user_jwt')->login($user);
//        $token = auth()->guard('user_jwt')->attempt(['user_phone' => $user_phone, 'password' => $user_password, 'user_status' => 1]);
//        if (!$token) {
//            return Res::response(Res::CODE_DATA_ERR, '用户名或密码错误');
//        }
        if (config('app.encrypt_token')) {
            //加密token
            $token = encrypt($token);
        }
        return Res::response(Res::CODE_SUCCESS, '登录成功', ['token' => $token]);
    }

    /**
     * 根据用户id获取用户数据
     *
     * @param $user_id
     * @return array|\Illuminate\Http\JsonResponse
     * Author : KANG
     * Date   : 2019/7/20
     * Time   : 15:53
     */
    public function user($user_id)
    {
        $user = UserModel::find($user_id);
        return $user;
    }

    //获取用户列表
    //TODO:分页
    public function users()
    {
        $users = UserModel::get();
        return $users;
    }
}