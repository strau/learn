<?php

namespace App\Models\Home;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * 前台注册用户模型
 */
class UserModel extends Authenticatable implements JWTSubject
{
    protected $table      = 'user_users';
    protected $primaryKey = 'user_id';
    protected $guarded    = [];
    public $timestamps    = false;
    public $hidden        = [
        'user_password'
    ];

    const PHONE_REG = '/^1[\d]{10}$/';    //手机号正则验证规则

    const STATUS_NORMAL = 1;    //账号状态-正常
    const STATUS_LOCK   = 2;    //账号状态-锁定（密码错误次数超出限制）
    const STATUS_STOP   = 3;    //账号状态-封号
    const STATUS_LIST   = [
        self::STATUS_NORMAL => '正常',
        self::STATUS_LOCK   => '锁定',
        self::STATUS_STOP   => '封号',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed|string
     * Author : KANG
     * Date   : 2019/7/16
     * Time   : 15:11
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     * Author : KANG
     * Date   : 2019/7/16
     * Time   : 15:11
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

//    public function getAuthPassword()
//    {
//        return $this->user_password;
//    }
//
//    protected function username()
//    {
//        return 'user_phone';
//    }
}
