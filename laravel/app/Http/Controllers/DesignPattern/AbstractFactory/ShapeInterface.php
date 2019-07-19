<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 19:03
 */

namespace App\Http\Controllers\DesignPattern\AbstractFactory;

/**
 * 形状接口，所有形状类都要实现这个接口
 *
 * Interface ShapeInterface
 * @package App\Http\Controllers\designPattern\AbstractFactory
 * User: KANG
 * Date: 2019/6/27
 * Time: 20:40
 */
interface ShapeInterface
{
    public function getArea();
    public function getPerimeter();
}