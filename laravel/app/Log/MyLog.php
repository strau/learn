<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/7/8
 * Time: 20:33
 */

namespace App\Log;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * 自定义日志
 */
class MyLog
{
    public function __invoke(array $config)
    {
        return new Logger('customer', [new StreamHandler($config['path'], 'info')]);
    }
}