<?php

namespace App\Http\Controllers\Algorithms\Sort;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

/**
 * Class Insertion 插入排序
 *
 * 数列前面部分看为有序，依次将后面的无序数列元素插入到前面的有序数列中，
 * 初始状态有序数列仅有一个元素，即首元素。
 * 在将无序数列元素插入有序数列的过程中，采用了逆序遍历有序数列，相较于顺序遍历会稍显繁琐，但当数列本身已近排序状态效率会更高。
 *
 * 稳定的排序算法
 *
 * 在插入排序中，对于值相同的元素，我们可以选择将后面出现的元素，插入到前面出现元素的后面，这样就可以保持原有的前后顺序不变，
 * 所以插入排序是稳定的排序算法。
 */
class Insertion extends SortBaseController implements SortInterface
{
    public function insertionSort()
    {
        //
    }

    public function sort()
    {
        return $this->insertionSort();
    }
}