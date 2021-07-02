<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PHPUnit\Util\Test;

class TestListener implements ShouldQueue
{
    use Queueable , InteractsWithQueue;
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
     * @param  TestEvent  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {
        Order::find(1)->update(['status' => 5]);
    }
}
