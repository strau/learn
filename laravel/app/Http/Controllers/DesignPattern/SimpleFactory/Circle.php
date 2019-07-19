<?php

namespace App\Http\Controllers\DesignPattern\SimpleFactory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class Circle extends Controller implements shapeInterface
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
