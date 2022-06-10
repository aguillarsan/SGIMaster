<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_bateria extends Model
{
	protected $connection ='psa';


	protected $table = 'stock_baterias';

	public function marca(){

		return $this->belongsTo(Marca::class);
	}
	public function capacidad(){

		return $this->belongsTo(Capacidad::class);
	}
	public function negocio(){

		return $this->belongsTo(Negocio::class);
	} 


	public function scopeBuscar($query){

		if(request()->marca){
			$query->where('marca_id','=',request()->marca);
		}

		if(request()->negocio){
			$query->where('negocio_id','like',"%".request()->negocio."%");
		}



		





	}
}
