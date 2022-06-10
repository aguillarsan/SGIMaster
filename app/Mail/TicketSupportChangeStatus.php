<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSupportChangeStatus extends Mailable
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
    public function __construct($image,$mesage_satate,$body_message,$user)
    {
        $this->image = $image;
        $this->mesage_satate = $mesage_satate;
        $this->body_message = $body_message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.StateTicketSupport')->subject('Ticket de soporte');
    }
}
