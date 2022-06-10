<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproceso extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'subprocesos';
    public function ticket_ingenieria()
    {

        return $this->hasMany(Ticket_ingenieria::class);
    }
}
