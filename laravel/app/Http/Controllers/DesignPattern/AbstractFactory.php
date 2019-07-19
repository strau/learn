<?php

namespace App\Http\Controllers\DesignPattern;

use App\Http\Controllers\Controller;
use App\Http\Controllers\designPattern\AbstractFactory\FactoryProducer;

class AbstractFactory extends Controller
{
    public function index()
    {
        //获取形状工厂
        $shape_factory = FactoryProducer::getFactory('Shape');
        //获取形状为Circle的对象
        $circle        = $shape_factory->getShape('Circle', 10);
        //获取形状为Rectangle的对象
        $rectangle     = $shape_factory->getShape('Rectangle', 5, 3);
        //获取形状为Square的对象
        $square        = $shape_factory->getShape('Square', 5);


        //获取颜色工厂
        $color_factory = FactoryProducer::getFactory('Color');
        //获取颜色为Red的对象
        $red           = $color_factory->getColor('Red');
        //获取颜色为Blue的对象
        $blue          = $color_factory->getColor('Blue');

        echo "半径为10的圆的面积为：" . $circle->getArea() . "，颜色为：" . $red->getColor() . "<br />";
        echo "半径为10的圆的周长为：" . $circle->getPerimeter() . "，颜色为：" . $red->getColor() . "<br />";
        echo "长为5宽为3的长方形面积为：" . $rectangle->getArea() . "，颜色为：" . $blue->getColor() . "<br />";
        echo "长为5宽为3的长方形周长为：" . $rectangle->getPerimeter() . "，颜色为：" . $blue->getColor() . "<br />";
    }
}
