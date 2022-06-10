<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $connection ='psa';


	protected $table = 'negocios';

	public function solicitud(){

		return $this->hasMany(Solicitud::class);
	}
	public function stock_bateria(){

		return $this->hasMany(Stock_bateria::class);
	}

}
