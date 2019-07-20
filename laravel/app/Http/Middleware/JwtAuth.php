<?php

namespace App\Http\Middleware;

use App\Common\Res;
use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->token;
        if (!$token) {
            //没有token
            return response()->json(Res::response(Res::CODE_JWT_ERR, '没有访问令牌token'));
        }

        if (config('app.encrypt_token')) {
            //解密token
            $token = decrypt($token);
            //设置jwt的token
            auth()->guard('user_jwt')->setToken($token);
        }
        //验证token
        if (!auth()->guard('user_jwt')->check()) {
            //token不正确
            return response()->json(Res::response(Res::CODE_JWT_INVALID, '访问令牌token无效或已经过期，请重新登录'));
        }
        //TODO: 解析自定义载荷，缓存起来

        return $next($request);
    }
}
