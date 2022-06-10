<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
	protected $connection ='sitios';
	protected $table = 'crms';
	public function zonas(){

		return $this->hasMany(Zona::class);
	}

		public function tickets(){

		return $this->hasMany(ticket::class);
	}

	

}
