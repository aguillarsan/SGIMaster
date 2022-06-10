<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSupporMessage extends Mailable
{
    use Queueable, SerializesModels;

  
    public $user;
    public $mensaje;
    public $ticket;
    public $mail_responsable;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user , $mensaje,$ticket,$mail_responsable)
    {
        $this->user = $user;
        $this->mensaje = $mensaje;
        $this->ticket = $ticket;
        $this->mail_responsable = $mail_responsable;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.SendMessageSuport')->subject('Ticket de soporte');;
    }
}
