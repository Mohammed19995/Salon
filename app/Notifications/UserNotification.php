<?php

namespace App\Notifications;

use App\Channels\CustomDbChannel;
use App\Channels\FirebaseChannel;
use App\Facades\Firebase\FirebaseNotificationFacade;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserNotification extends Notification
{
    use Queueable , NotificationTrait;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user_notification_id;
    public $title;
    public $message;
    public function __construct($user_notification_id ,$title , $message)
    {
        $this->user_notification_id = $user_notification_id;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDbChannel::class , FirebaseChannel::class];

    }

    public function toFirebase($notifiable) {
        $fcms = $notifiable->tokens()->pluck('fcm')->toArray();
        if (count($fcms) > 0) {
            $data = $this->getData($notifiable);
            FirebaseNotificationFacade::send($data['title'], $data['sub_title'], $data, $fcms);
        }
    }
    public function toDatabase($notifiable) {
        return $this->getData($notifiable);
    }

    public function getData($notifiable)
    {
        $data = [
            '_title_'   => $this->title,
            '_message_' => $this->message,
        ];
        return [
            'user_notification_id' => $this->user_notification_id,
            'title'                => $this->getTitleNotification(self::class,$data , $notifiable->lang) ,
            'sub_title'            => $this->getSubTitleNotification(self::class,$data , $notifiable->lang) ,
            '_title_'              => $this->title,
            '_message_'            => $this->message,
            'user_id'              => null ,
            'auction_id'           => null ,
        ];
    }
}
