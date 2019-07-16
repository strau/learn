<?php
namespace App\Http\Logics;

use App\Common\Res;
use App\Exceptions\DatabaseException;
use App\Models\Home\UserModel;
use Illuminate\Support\Facades\Validator;

/**
 * 逻辑处理层基类
 */
class UserLogic extends BaseLogic
{
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

        $validator = Validator::make($vd, $vr, $vm);
        if ($validator->fails()) {
            return Res::response(Res::CODE_VERIFY_ERR_NOTMATCH, $validator->errors()->getMessages());
        }

        $user->user_password   = bcrypt($user->user_password);
        $user->user_updated_at = $user->user_created_at = date('Y-m-d H:i:s');
        try {
            $user->save();
        } catch (\Exception $e) {
            //TODO:记录日志
            throw new DatabaseException(Res::response(Res::CODE_DATA_ERR_SAVE, '操作失败，请稍后再试或联系管理员'));
        }
        return Res::response(Res::CODE_SUCCESS);
    }
}