<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketSuport extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $user;
    public $solicitante;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket , $user, $solicitante)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->solicitante = $solicitante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.TicketSupportCreated')->subject('Ticket de soporte creado');
    }
}
