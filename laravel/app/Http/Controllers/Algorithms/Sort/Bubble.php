<?php

namespace App\Http\Controllers\Algorithms\Sort;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

/**
 * Class Bubble 冒泡排序
 *
 * 依次比较相邻两元素，若前一元素大于后一元素则交换之，直至最后一个元素即为最大；
 * 然后重新从首元素开始重复同样的操作，直至倒数第二个元素即为次大元素；
 * 依次类推。如同水中的气泡，依次将最大或最小元素气泡浮出水面。
 *
 * 稳定排序算法
 *
 * 在冒泡排序中，只有交换才可以改变两个元素的前后顺序。
 * 为了保证冒泡排序算法的稳定性，当有相邻的两个元素大小相等的时候，我们不做交换，
 * 相同大小的数据在排序前后不会改变顺序，
 * 所以冒泡排序是稳定的排序算法。
 *
 */
class Bubble extends SortBaseController implements SortInterface
{
    public function bubbleSort()
    {
        $length   = count($this->sort);
        $times    = 0;
        for ($i = 0; $i < $length; $i ++) {

//            $exchange = false;

            for ($j = 0; $j < $length - $i -1; $j ++) {
//                $times++;
                if ($this->sort[$j] > $this->sort[$j + 1]) {
                    list($this->sort[$j], $this->sort[$j + 1]) = [$this->sort[$j + 1], $this->sort[$j]];
//                    $exchange = true;
                }
            }

//            if (!$exchange) {
//                break;
//            }

        }
        return ['data' => $this->sort, 'times' => $times];
    }

    public function sort()
    {
        return $this->bubbleSort();
    }
}