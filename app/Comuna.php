<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    
	protected $connection ='sitios';



	protected $table = 'comunas';
	public function pops(){

		return $this->hasMany(Pop::class);
	}

	


	public function zona(){

		return $this->belongsTo(Zona::class);
	}

	public function region(){

		return $this->belongsTo(Region::class);
	}
}
