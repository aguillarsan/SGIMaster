<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_requisito extends Model
{
     protected $connection = 'plataforma';
    protected $table      = 'ticket_requisitos';

     public function area()
    {

        return $this->belongsTo(AreaRequisitoTicket::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function plataforma()
    {

        return $this->belongsTo(Plataforma::class);
    }
     public function responsable()
    {

        return $this->belongsTo(Responsable::class);
    }
    public function tipo_requisito()
    {

        return $this->belongsTo(Tipo_requisito::class);
    }
     public function prioridad()
    {

        return $this->belongsTo(Prioridad::class);
    }
     public function estado()
    {

        return $this->belongsTo(Estado_ticket_requisito::class);
    }
}
