<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 17:37
 */

namespace App\Http\Controllers\DesignPattern\AbstractFactory;


use App\Http\Controllers\Controller;
use App\Http\Controllers\designPattern\AbstractFactory\entity\Circle;
use App\Http\Controllers\designPattern\AbstractFactory\entity\Rectangle;
use App\Http\Controllers\designPattern\AbstractFactory\entity\Square;

/**
 * 形状工厂（实例化各种形状类）
 *
 * Class ShapeFactory
 * @package App\Http\Controllers\designPattern\AbstractFactory
 */
class ShapeFactory extends Controller implements AbstractFactory
{
    public function getShape(...$param)
    {
        switch ($param[0]) {
            case 'Circle':
                return new Circle($param[1]);
                break;
            case 'Rectangle':
                return new Rectangle($param[1], $param[2]);
                break;
            case 'Square':
                return new Square($param[1]);
                break;
            default:
                throw new \Exception("暂时没有{$param[0]}");
        }
    }

    public function getColor($color)
    {
        return null;
    }
}