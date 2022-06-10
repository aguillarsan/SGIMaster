<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cod_sap extends Model
{
    protected $connection ='psa';


	protected $table = 'cod_saps';

	public function solicitud(){

		return $this->hasMany(Solicitud::class);
	}

}
