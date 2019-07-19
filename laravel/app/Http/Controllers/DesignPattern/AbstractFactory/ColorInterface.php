<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 19:03
 */

namespace App\Http\Controllers\DesignPattern\AbstractFactory;

/**
 * 颜色接口，所有颜色类都要实现这个接口
 *
 * Interface ColorInterface
 * @package App\Http\Controllers\designPattern\AbstractFactory
 * User: KANG
 * Date: 2019/6/27
 * Time: 20:35
 */
interface ColorInterface
{
    public function getColor();
}