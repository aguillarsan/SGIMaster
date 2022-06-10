<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $connection ='psa';


	protected $table = 'marcas';

	public function solicitud(){

		return $this->hasMany(Solicitud::class);
	}

	
	public function stock_bateria(){

		return $this->hasMany(Stock_bateria::class);
	}
}
