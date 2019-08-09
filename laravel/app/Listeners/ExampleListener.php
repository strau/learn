<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

//测试监听器
class ExampleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(ExampleEvent $event)
    {
        Log::debug('测试监听器执行时间：' . date('Y-m-d H:i:s'));
        sleep(5);
        Log::debug('测试监听器sleep(5)后的时间：' . date('Y-m-d H:i:s'));
        Log::info(json_encode($event->data));
    }
}
