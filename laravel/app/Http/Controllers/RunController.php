<?php

namespace App\Http\Controllers;

//测试控制器
use App\Events\ExampleEvent;
use App\Exceptions\DatabaseException;
use App\Http\Controllers\Algorithms\Sort\Bubble;
use App\Http\Controllers\Algorithms\Sort\Quick;
use App\Http\Controllers\Algorithms\Sort\Selection;
use App\Http\Controllers\Algorithms\Sort\SortFactory;
use App\Http\Controllers\ElasticSearch\ElasticSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RunController extends Controller
{
    public function run(Request $request, SortFactory $sortFactory)
    {
        return $this->sort($sortFactory);
    }





/** ************************************************************************************************* */
    //测试自定义记录路径的日志
    public function testLog()
    {
        Log::channel('database')->info('database');
        Log::channel('info')->info('daily_info');
    }

    //测试laravel的事件
    //laravel的事件是同步执行的
    public function testEvent()
    {
        Log::debug('访问时间：' . date('Y-m-d H:i:s'));
        event(new ExampleEvent(['time' => date('Y-m-d H:i:s')]));
        Log::debug('响应时间：' . date('Y-m-d H:i:s'));
    }

    //测试ES搜索引擎
    public function testElasticSearch(ElasticSearch $elasticSearch)
    {
        return $elasticSearch->createIndex();
    }

    /**
     * @throws DatabaseException
     * User: KANG
     * Date: 2019/8/21
     * Time: 16:52
     */
    public function testException()
    {
//        abort(404);
        throw new DatabaseException();
    }

    /**
     * @param SortFactory $sortFactory
     * @return mixed
     * @throws \Exception
     * User: KANG
     * Date: 2019/8/21
     * Time: 16:52
     */
    public function sort(SortFactory $sortFactory)
    {
        return $sortFactory->getSortMethod(Quick::class)->sort();
        return $sortFactory->getSortMethod(Selection::class)->sort();
        return $sortFactory->getSortMethod(Bubble::class)->sort();
    }
}
