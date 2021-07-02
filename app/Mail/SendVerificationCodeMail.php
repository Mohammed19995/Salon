<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendVerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $display_name;
    public function __construct($user , $display_name)
    {
        $this->user = $user;
        $this->display_name = $display_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.verification_code' , ['user' => $this->user , 'display_name' => $this->display_name]);
    }
}
