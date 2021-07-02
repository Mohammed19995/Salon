<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\SendVerificationCodeEvent;

// notifications
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendVerificationCodeNotification;

class SendVerificationCodeListener implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {

    }


    public function handle(SendVerificationCodeEvent $event)
    {
        Notification::send($event->user, new SendVerificationCodeNotification($event->user , $event->type));
    }
}
