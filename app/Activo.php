<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
     protected $connection ='psa';


	protected $table = 'activos';
		public function solicitudespsa(){

		return $this->hasMany(PsaSolicitud::class);
	}
}
