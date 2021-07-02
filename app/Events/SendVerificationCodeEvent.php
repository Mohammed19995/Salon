<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendVerificationCodeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user;
    public $type;
    public function __construct($user , $type = 1)
    {
        $this->user = $user;
        $this->type = $type;
    }

}
