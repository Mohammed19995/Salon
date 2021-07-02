<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class CustomDbChannel
{

    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toDatabase($notifiable);
        return $notifiable->routeNotificationFor('database')->create([
            'id' => $notification->id,
            'auction_id'           => array_key_exists('auction_id' , $data) ? $data['auction_id'] : null,
            'user_id'              => array_key_exists('user_id' , $data) ? $data['user_id'] : null,
            'user_notification_id' => array_key_exists('user_notification_id' , $data) ? $data['user_notification_id'] : null,
            'type'                 => get_class($notification),
            'data'                 => $data,
            'read_at'              => null,
        ]);
    }

}