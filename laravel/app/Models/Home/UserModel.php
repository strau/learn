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

    const PHONE_REG = '/^1[\d]{10}$/';    //手机号正则验证规则

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
        return $this->primaryKey;
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
}
