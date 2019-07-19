<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 17:37
 */

namespace App\Http\Controllers\DesignPattern\AbstractFactory;

/**
 * 工厂制造类，实例化各种工厂
 *
 * Class FactoryProducer
 * @package App\Http\Controllers\designPattern\AbstractFactory
 */
class FactoryProducer
{
    public static function getFactory($factory)
    {
        switch ($factory) {
            case 'Shape':
                return new ShapeFactory();
                break;
            case 'Color':
                return new ColorFactory();
                break;
            default:
                throw new \Exception("暂时没有{$factory}");
        }
    }
}