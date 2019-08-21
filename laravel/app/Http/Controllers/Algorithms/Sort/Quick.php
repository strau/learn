<?php

namespace App\Http\Controllers\Algorithms\Sort;

use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

/**
 * Class Quick 快速排序
 *
 * 选一基准元素，依次将剩余元素中小于该基准元素的值放置其左侧，大于等于该基准元素的值放置其右侧；
 * 然后，取基准元素的前半部分和后半部分分别进行同样的处理；以此类推，直至各子序列剩余一个元素时，即排序完成
 *
 * 不稳定的排序算法
 */
class Quick extends SortBaseController implements SortInterface
{
    public function quickSort($arr)
    {
        $length = count($arr);
        $left = $right = [];
        $stander = $arr[0];
        for ($i = 1; $i < $length; $i++) {
            if ($arr[$i] < $stander) {
                $left[] = $arr[$i];
            } else {
                $right[] = $arr[$i];
            }
        }
        if (count($left) > 1) {
            $left = $this->quickSort($left);
        }
        if (count($right) > 1) {
            $right = $this->quickSort($right);
        }
        return array_merge($left, [$stander], $right);
    }

    public function sort()
    {
        return $this->quickSort($this->sort);
    }
}