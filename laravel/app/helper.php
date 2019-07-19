<?php
/**
 * 自定义辅助函数
 *
 * User: KANG
 * Date: 2019/7/18
 * Time: 17:22
 */

if (! function_exists('validate')) {
    /**
     * 使用laravel的验证器验证接收的数据
     *
     * @param array $vd 要验证的数据
     * @param array $vr 验证规则
     * @param array $vm 自定义的验证错误消息
     * @throws \App\Exceptions\ValidatorFailedException
     * User: KANG
     * Date: 2019/7/18
     * Time: 17:32
     */
    function validate($vd, $vr, $vm) {
        $validator = validator($vd, $vr, $vm);
        if ($validator->fails()) {
            //验证失败
            throw new \App\Exceptions\ValidatorFailedException(
                \App\Common\Res::response(\App\Common\Res::CODE_VERIFY_ERR_NOTMATCH,
                                                $validator->errors()->getMessages()));
        }
    }
}

if (! function_exists('verifyPassword')) {
    /**
     * 验证一段给定的未加密字符串与给定的哈希值是否一致
     *
     * @param string $password 未加密的密码
     * @param string $hashedPassword 加密后的密码
     * @return bool
     * User: KANG
     * Date: 2019/7/19
     * Time: 20:19
     */
    function verifyPassword($password, $hashedPassword) {
        return \Illuminate\Support\Facades\Hash::check($password, $hashedPassword);
    }
}