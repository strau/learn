<?php
namespace App\Exceptions;

use App\Common\Res;
use Illuminate\Http\Request;

/**
 *自定义异常的基类
 */
class DatabaseException extends BaseException
{
    protected $res = null;    //返回的数据Res::response()

    public function __construct($res)
    {
        parent::__construct();
        $this->res = $res;
    }

    public function render(Request $request)
    {
        if ($request->expectsJson()) {
            return $this->res;
        }
        return view('pages.error', $this->res);
    }
}