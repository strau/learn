<?php

namespace App\Http\Controllers\Algorithms\Sort;


class SortFactory
{
    public function getSortMethod($name)
    {
        try {
            return new $name;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}