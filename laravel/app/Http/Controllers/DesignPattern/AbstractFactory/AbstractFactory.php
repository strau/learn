<?php

namespace App\Http\Controllers\DesignPattern\AbstractFactory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 抽象工厂（工厂的工厂），所有的工厂类都要实现这个接口
 *
 * Interface AbstractFactory
 * @package App\Http\Controllers\designPattern\AbstractFactory
 * User: KANG
 * Date: 2019/6/27
 * Time: 20:35
 */
interface AbstractFactory
{
    public function getShape(...$shape);
    public function getColor($color);
}
