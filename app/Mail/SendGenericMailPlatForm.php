<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendGenericMailPlatForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $image;
    public $mesage_satate;
    public $body_message;
    public $user;
    public $subject;
    public $url;
    public function __construct($user, $image , $mesage_satate,$body_message,$url,$subject)
    {
        $this->user = $user;
        $this->url = $url;
        $this->image = $image; 
        $this->mesage_satate = $mesage_satate;
        $this->body_message = $body_message;
        $this->subject=$subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.ChangeStatusTicket')->subject($this->subject);
    }
}
