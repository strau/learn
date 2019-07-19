<?php
namespace App\Exceptions;

use App\Common\Res;
use Illuminate\Http\Request;

/**
 * 数据验证失败
 */
class ValidatorFailedException extends BaseException
{
//    protected $res = null;    //返回的数据Res::response()
//
//    public function __construct($res)
//    {
//        parent::__construct();
//        $this->res = $res;
//    }
//
//    public function render(Request $request)
//    {
//        if ($request->expectsJson()) {
//            return $this->res;
//        }
//        return view('pages.error', $this->res);
//    }
}