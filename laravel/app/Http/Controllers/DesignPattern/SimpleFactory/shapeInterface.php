<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 14:41
 */

namespace App\Http\Controllers\DesignPattern\SimpleFactory;


interface shapeInterface
{
    public function getArea();
    public function getPerimeter();
}