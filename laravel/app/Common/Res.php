<?php
namespace App\Common;

use Illuminate\Support\Collection;

class Res
{
    //--------------------------------------------------------------------------正常类
    /** 通用正常 */
    public const CODE_SUCCESS="00000";
    /** 找不到数据 */
    public const CODE_NO_DATA="00011";
    /** 验证不通过，不返回错误 */
    public const CODE_NOT_MATCH="00020";
    /** 后端返回确认提示 */
    public const CODE_CONFIRM="00090";
    //--------------------------------------------------------------------------权限类
    /** 缺乏权限 */
    public const CODE_PERMISSION_LACK="01001";
    /** 登录失效 */
    public const CODE_PERMISSION_LOGOUTED="01002";
    /** 缺乏文件系统权限     */
    public const CODE_PERMISSION_LACK_FILESYSTEM="01011";
    //--------------------------------------------------------------------------验证类
    /** 通用验证失败 */
    public const CODE_VERIFY_ERR="02001";
    /** 不符合规则 */
    public const CODE_VERIFY_ERR_NOTMATCH="02002";
    //--------------------------------------------------------------------------数据获取类
    /** 通用数据错误     */
    public const CODE_DATA_ERR="03001";
    /** 未找到数据     */
    public const CODE_DATA_ERR_NOTFIND="03002";
    /** 数据不合法     */
    public const CODE_DATA_ERR_ILLEGAL="03003";
    /** 数据重复 */
    public const CODE_DATA_ERR_REPEAT="03004";
    /** 数据保存失败 */
    public const CODE_DATA_ERR_SAVE="03005";
    //---------------------------------------------------------------------------数据发送类
    /** 通用数据发送错误 */
    public const CODE_DATA_SEND_ERR="04001";
    /** 通用目标已存在 **/
    public const CODE_DATA_SEND_ERR_TARGETEXISTED="04002";
    /** 文件上传失败 */
    public const CODE_DATA_SEND_ERR_FILEUPLAD="04011";
    /** 目标文件已存在 */
    public const CODE_DATA_SEND_ERR_FILEEXISTED="04012";
    /** 目标目录创建失败 */
    public const CODE_DATA_SEND_ERR_MAKE_DIR="04091";
    /** 目标文件移动失败 */
    public const CODE_DATA_SEND_ERR_MOVE_FILE="04092";
    //---------------------------------------------------------------------------支付类
    /** 通用支付错误 */
    public const CODE_PAY_ERR="05001";
    /** 下单支付错误 */
    public const CODE_PAY_ORDER="05002";
    /** 查询错误 */
    public const CODE_PAY_QUERY="05003";
    /** 申请退款错误 */
    public const CODE_PAY_REFUND="05004";
    //---------------------------------------------------------------------------非法操作类
    /** 通用非法操作错误 */
    public const CODE_HANDLE_ILLEGAL="99001";


    /**
     * 统一api响应方法
     *
     * @param string $code 响应状态码
     * @param string $msg 响应消息
     * @param mixed $data 返回的数据
     * @param \Closure|null $callback 处理返回的数据回调函数
     * @param bool $cut_prefix 是否去掉字段的前缀
     * @return \Illuminate\Http\JsonResponse
     * Author : KANG
     * Date   : 2019/7/16
     * Time   : 18:54
     */
    public static function response($code = self::CODE_SUCCESS, $msg = null, $data = null, \Closure $callback = null, $cut_prefix = true)
    {
        if ($callback) {
            if (is_array($data) || ($data instanceof Collection)) {
                //数组或集合
                foreach ($data as $key => &$value) {
                    $value = call_user_func_array($callback, [$value, $key]);
                }
            } else {
                $data = call_user_func_array($callback, [$data]);
            }
        }
//        if ($cut_prefix) {
//            $data = self::cutPrefix($data);
//        }
        if (env('APP_ENV', 'local') === 'local') {
            $debug = request()->all();
        } else {
            $debug = null;
        }
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $data, 'debug' => $debug]);
    }

    /**
     * 去掉返回数据的字段的前缀
     *
     * @param mixed $data 返回的数据
     * @return array 去掉字段前缀后的数据
     * Author : KANG
     * Date   : 2019/7/16
     * Time   : 18:58
     */
    public static function cutPrefix($data)
    {
        $tmp = [];
        if (is_array($data) || ($data instanceof Collection) || is_object($data)) {
            foreach ($data as $k => $v) {
                if (is_array($v) || ($v instanceof Collection) || is_object($v)) {
                    $v = self::cutPrefix($v);
                }
                $tmp[self::getNewKey($k)] = $v;
            }
        }
        return $tmp;
    }

    /**
     * 去掉字段前缀的具体方法
     *
     * @param string $key 字段名称
     * @return string 去掉前缀后的字段的名称
     * Author : KANG
     * Date   : 2019/7/16
     * Time   : 19:00
     */
    public static function getNewKey($key)
    {
        //TODO: 完善此方法（正则替换，去掉第一个_及其以前的部分）
        return $key;
    }
}