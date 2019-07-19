<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 19:22
 */
namespace App\Http\Controllers\DesignPattern\AbstractFactory\entity;

use App\Http\Controllers\DesignPattern\AbstractFactory\ShapeInterface;

class Circle implements ShapeInterface
{
    public $r;

    public function __construct($r)
    {
        $this->r = $r;
    }
    public function getArea()
    {
        return M_PI * $this->r * $this->r;
    }
    public function getPerimeter()
    {
        return 2 * M_PI * $this->r;
    }
}