<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $connection ='psa';


	protected $table = 'oficinas';
	
	public function solicitud(){

		return $this->hasMany(Solicitud::class);
	}
}
