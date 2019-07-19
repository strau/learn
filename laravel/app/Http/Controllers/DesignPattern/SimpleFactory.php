<?php

namespace App\Http\Controllers\DesignPattern;

use App\Http\Controllers\Controller;

class SimpleFactory extends Controller
{
    public function index(\App\Http\Controllers\designPattern\SimpleFactory\SimpleFactory $simpleFactory)
    {
        //通过简单工厂获取对象
        $circle = $simpleFactory->getShape('Circle', 2);
        $rectangle = $simpleFactory->getShape('Rectangle', 5, 2);
        $square = $simpleFactory->getShape('Square', 2);

        echo "半径为2的圆面积为："           . $circle->getArea()         . "<br />";
        echo "半径为2的圆周长为："           . $circle->getPerimeter()    . "<br />";
        echo "长为5宽为2的长方形面积为："     . $rectangle->getArea()      . "<br />";
        echo "长为5宽为2的长方形周长为："     . $rectangle->getPerimeter() . "<br />";
        echo "边长为2的正方形面积为："        . $square->getArea()         . "<br />";
        echo "边长为2的正方形周长为："        . $square->getPerimeter()    . "<br />";
    }
}
