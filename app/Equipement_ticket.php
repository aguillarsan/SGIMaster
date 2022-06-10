<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement_ticket extends Model
{
   protected $connection ='task';


    protected $table = 'equipement_ticket';


	public function equipo(){

		return $this->belongsTo(Equipo::class);
	}
}
