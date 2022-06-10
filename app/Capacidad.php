<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capacidad extends Model
{
    protected $connection ='psa';


	protected $table = 'capacidades';

	public function solicitudpsa(){

		return $this->hasMany(PsaSolicitud::class);
	}
	public function stock_bateria(){

		return $this->hasMany(Stock_bateria::class);
	}
}
