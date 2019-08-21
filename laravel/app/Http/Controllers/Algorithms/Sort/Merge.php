<?php

namespace App\Http\Controllers\Algorithms\Sort;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

/**
 * Class Merge 归并排序
 *
 * 采用了分治和递归的思想，递归&分治-排序整个数列如同排序两个有序数列，
 * 依次执行这个过程直至排序末端的两个元素，再依次向上层输送排序好的两个子列进行排序直至整个数列有序
 * 如果要排序一个数组，我们先把数组从中间分成前后两部分，然后对前后两部分分别排序，再将排好序的两部分合并在一起，这样整个数组就都有序了。
 *
 * 稳定的排序算法
 *
 * 合并数组的时候保持先后顺序不变，就能保证归并排序是稳定的排序算法
 */
class Merge extends SortBaseController implements SortInterface
{
    public function mergeSort()
    {
        //
    }

    public function sort()
    {
        return $this->mergeSort();
    }
}