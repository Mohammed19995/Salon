<?php
/**
 * Created by PhpStorm.
 * User: Mohammed AlBanna
 * Date: 2021-04-27
 * Time: 12:19 PM
 */
namespace App\Traits\Notification;

use Illuminate\Notifications\Notifiable;

trait CustomNotifiable
{
    use Notifiable;

    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

}