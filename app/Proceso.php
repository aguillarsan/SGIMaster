<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'procesos';
    public function ticket_ingenieria(){

		return $this->hasMany(Ticket_ingenieria::class);
	}

}
