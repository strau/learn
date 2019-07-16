<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const REG_LIST = [
        'bank'              => '/^\d{16}|\d{19}$/',//银行卡号格式
        'phone'             => '/^1[\d]{10}$/',//手机号格式
        'email'             => '/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/i',//email格式
        'positive_integer'  => '/^[1-9]\d*/',//整数规则
        'positive_float'    => '/^[1-9]((\d*)|(\d*\.\d+))/',//浮点数规则
        'chinese'           => '/^[\x{4e00}-\x{9fa5}]{1,4}/u',//中文姓名规则
        'IDcard'            => '/^([0-9]{15}|[0-9]{17}[0-9a-z])$/i',//身份证规则
        'birthday'          => '/^(19|20)\d{2}-(1[0-2]|0?[1-9])-(0?[1-9]|[1-2][0-9]|3[0-1])$/',//生日格式
        'tel'               => '/^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/',//固定电话
        'qq'                => '/^[1-9]\d{4,12}$/',//QQ
        'post_code'         => '/^[1-9]\d{5}$/',//邮政编码
    ];
}
