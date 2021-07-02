<?php

namespace App\Listeners;

use App\Events\UserNotificationEvent;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Notifications\WinnerAuctionNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UserNotificationListener implements ShouldQueue
{
    use Queueable, InteractsWithQueue;
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
     * @param  UserNotificationEvent $event
     * @return void
     */
    public function handle(UserNotificationEvent $event)
    {
        $data = $event->data;
        $country_id = $data['country_id'];
        if ($data['filter'] == 1) {
            $users = User::with('city.country')
                ->Status($data['status'])
                ->Type($data['type'])
                ->PhoneCodeStatus($data['phone_status'])
                ->Country($country_id);

            if ($country_id != -1 && !empty($country_id) && !is_null($country_id)) {
                $users = $users->City($data['city_id']);
            }
        } else {
            $users = User::whereIn('id', $data['users']);
        }

        $users->chunk(100, function ($users) use($event) {
            Notification::send($users, new UserNotification($event->user_notification_id ,$event->title , $event->message));
        });

    }
}
