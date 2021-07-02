<?php

namespace App\Notifications;

use App\Channels\CustomDbChannel;
use App\Channels\FirebaseChannel;
use App\Channels\SmsChannel;
use App\Facades\Firebase\FirebaseNotificationFacade;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVerificationCodeNotification extends Notification
{
    use Queueable, NotificationTrait;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $type;

    public function __construct($user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];

    }

    public function toSms($notifiable)
    {
       // dd($this->user);
    }
}
