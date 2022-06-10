<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $connection ='psa';


	protected $table = 'almacenes';
	public function solicitudpsa(){

		return $this->hasMany(PsaSolicitud::class);
	}
}
