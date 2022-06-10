<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarpetaCompartida extends Model
{
     protected $connection ='repositorio';

    
     protected $table = 'carpeta_compartidas';

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function scopeBuscar($query){

		

		if(request()->nombre){
			$query->where('nombre','like',"%".request()->nombre."%" 
				
			);
		}
	


	}
}
