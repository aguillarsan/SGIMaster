<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_ingenieria_tp extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'ticket_tp';
    public function ticket_ingenieria()
    {

        return $this->belongsTo(Ticket_ingenieria::class);
    }

    public function actividad()
    {

        return $this->belongsTo(Actividades::class);
    }
    public function supervisor()
    {

        return $this->belongsTo(Supervisor::class);
    }

    public function tipo_supervision()
    {

        return $this->belongsTo(Tipo_supervision::class);
    }
    

 

}
