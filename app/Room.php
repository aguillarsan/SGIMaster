<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $connection ='sitios';



	protected $table = 'rooms';



	public function solicitudes(){

		return $this->hasMany(Solicitud::class);
	}


}
