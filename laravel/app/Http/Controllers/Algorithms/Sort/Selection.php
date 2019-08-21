<?php

namespace App\Http\Controllers\Algorithms\Sort;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

/**
 * Class Selection 选择排序
 *
 * 首先初始化最小元素索引值为首元素，依次遍历待排序数列，
 * 若遇到小于该最小索引位置处的元素则刷新最小索引为该较小元素的位置，
 * 直至遇到尾元素，结束一次遍历，并将最小索引处元素与首元素交换；
 * 然后，初始化最小索引值为第二个待排序数列元素位置，同样的操作，可得到数列第二个元素即为次小元素；以此类推。
 *
 * 不稳定排序算法
 *
 * 选择排序每次都要找剩余未排序元素中的最小值，并和前面的元素交换位置，这样破坏了稳定性。
 * 比如 5，8，5，2，9 这样一组数据，使用选择排序算法来排序的话，第一次找到最小元素 2，与第一个 5 交换位置，
 * 那第一个 5 和中间的 5 顺序就变了，所以就不稳定了。
 *
 */
class Selection extends SortBaseController implements SortInterface
{
    public function selectionSort()
    {
        $length = count($this->sort);
        for ($i = 0; $i < $length; $i++) {
            for ($j = $i +1; $j < $length; $j ++) {
                if ($this->sort[$i] > $this->sort[$j]) {
                    list($this->sort[$i], $this->sort[$j]) = [$this->sort[$j], $this->sort[$i]];
                }
            }
        }
        return ['data' => $this->sort];
    }

    public function sort()
    {
        return $this->selectionSort();
    }
}