<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{
	protected $connection ='sitios';

	protected $fillable=['id','nombre','direccion','comuna_id'];

	protected $table = 'pops';

	public function comuna(){

		return $this->belongsTo(Comuna::class);
	}
    

	public function crm(){
 
		return $this->belongsTo(Crm::class);
	}
	public function sites(){

		return $this->hasMany(Site::class);
	}

	public function solicitud(){

		return $this->hasMany(Solicitud::class);
	}

	 public function room()
    {

        return $this->belongsTo(Room::class);
    }
	
 
}
