<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $connection ='sitios';



	protected $table = 'regions';
    	public function comunas(){

		return $this->hasMany(Comuna::class);
	}

}
