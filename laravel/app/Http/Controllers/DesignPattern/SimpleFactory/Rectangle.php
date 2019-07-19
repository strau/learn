<?php

namespace App\Http\Controllers\DesignPattern\SimpleFactory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class Rectangle extends Controller implements shapeInterface
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
