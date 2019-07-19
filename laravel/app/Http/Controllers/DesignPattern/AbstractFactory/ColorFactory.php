<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 17:37
 */

namespace App\Http\Controllers\DesignPattern\AbstractFactory;


use App\Http\Controllers\Controller;
use App\Http\Controllers\designPattern\AbstractFactory\entity\Blue;
use App\Http\Controllers\designPattern\AbstractFactory\entity\Red;

/**
 * 颜色工厂（实例化各种颜色类）
 *
 * Class ColorFactory
 * @package App\Http\Controllers\designPattern\AbstractFactory
 */
class ColorFactory extends Controller implements AbstractFactory
{
    public function getShape(...$shape)
    {
        return null;
    }

    public function getColor($color)
    {
        switch ($color) {
            case 'Red':
                return new Red();
                break;
            case 'Blue':
                return new Blue();
                break;
            default:
                throw new \Exception("暂时没有{$color}");
        }
    }
}