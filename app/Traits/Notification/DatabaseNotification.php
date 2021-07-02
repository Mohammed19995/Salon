<?php
/**
 * Created by PhpStorm.
 * User: Mohammed AlBanna
 * Date: 2021-04-27
 * Time: 12:19 PM
 */
namespace App\Traits\Notification;

use App\Models\Auction;
use Illuminate\Notifications\DatabaseNotification as StandardDatabaseNotification;

class DatabaseNotification extends StandardDatabaseNotification
{
    /**
     * Get the notifiable entity that the notification belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */

}