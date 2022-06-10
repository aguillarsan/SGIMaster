<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    
   protected $connection ='sitios';


    protected $table = 'zonas';
	public function comunas(){

		return $this->hasMany(Comuna::class);
	}

	public function crm(){

		return $this->belongsTo(Crm::class);
	}

}
