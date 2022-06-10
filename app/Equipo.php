<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
      protected $connection ='task';


    protected $table = 'equipos';

     public function tikecets(){

        return $this->hasMany(ticket::class);
    }

      public function equipement_tickets(){

		return $this->hasMany(Equipement_ticket::class);
	}
}
