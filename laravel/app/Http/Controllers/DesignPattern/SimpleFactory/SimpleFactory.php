<?php

namespace App\Http\Controllers\DesignPattern\SimpleFactory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class SimpleFactory extends Controller
{
    public function getShape(...$param)
    {
        try {
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
                default :
                    throw new \Exception('参数不正确');
            }
        } catch (\Exception $e) {
            throw new \Exception('参数格式不正确');
        }
    }
}
