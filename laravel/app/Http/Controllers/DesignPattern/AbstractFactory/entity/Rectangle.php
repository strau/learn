<?php
/**
 * Created by PhpStorm.
 * User: EDZ
 * Date: 2019/6/27
 * Time: 19:22
 */
namespace App\Http\Controllers\DesignPattern\AbstractFactory\entity;

use App\Http\Controllers\DesignPattern\AbstractFactory\ShapeInterface;

class Rectangle implements ShapeInterface
{
    public $l;
    public $w;

    public function __construct($l, $w)
    {
        $this->l = $l;
        $this->w = $w;
    }
    public function getArea()
    {
        return $this->l * $this->w;
    }
    public function getPerimeter()
    {
        return 2 * ($this->l + $this->w);
    }
}