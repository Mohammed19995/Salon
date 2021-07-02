<?php

namespace App\Providers;

use App\Events\CloseAuctionEvent;
use App\Events\OpenAuctionEvent;
use App\Events\SendVerificationCodeEvent;
use App\Events\TestEvent;
use App\Events\UserNotificationEvent;
use App\Listeners\CloseAuctionListener;
use App\Listeners\OpenAuctionListener;
use App\Listeners\SendVerificationCodeListener;
use App\Listeners\TestListener;
use App\Listeners\UserNotificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
