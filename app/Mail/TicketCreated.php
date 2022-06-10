<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ticket_id;
    public $motivo_desc;
    public $user_send;
    public $descripcion;
    public  $name_encargado;
    public function __construct($ticket_id,$motivo_desc,$user_send,$descripcion,$name_encargado) {
        $this->ticket_id = $ticket_id;
        $this->motivo_desc = $motivo_desc;
        $this->user_send = $user_send;
        $this->descripcion = $descripcion;
        $this->name_encargado = $name_encargado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->view('Mail.TicketCreado')
        ->subject('Ticket Creado');
    }
}
