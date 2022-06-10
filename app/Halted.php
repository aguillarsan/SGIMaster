<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halted extends Model
{
	protected $connection ='task';
	protected $table = 'halteds';

	protected $dates = ['fecha_inicio','fecha_solucion'];


	public function state_halted(){

		return $this->belongsTo(State_halted::class);
	}

	public function state_pop_halted(){

		return $this->belongsTo(State_pop_halted::class);
	}

	public function area(){

		return $this->belongsTo(Area::class);
	}



	public function tecnica(){

		return $this->belongsTo(Tecnica::class);
	}


	public function equipo(){

		return $this->belongsTo(Equipo::class);
	}

	public function crm(){

		return $this->belongsTo(Crm::class);
	}
	public function site(){

		return $this->belongsTo(Site::class);
	}

	public function user(){

		return $this->belongsTo(User::class);
	}
	public function scopeUserg($query) 
	{
		$query->where('crm_id','!=' ,1)
		->where('crm_id','!=' ,2)
		->where('crm_id','!=' ,3)
		->where('crm_id','!=' ,4);
		
	}



	public function scopeBuscar($query){

		if (request()->sitio) {
			$query->whereIn('pop_id',
				Pop::where('nem_fijo', 'like', "%".request()->sitio."%" )->orWhere('nem_movil','like',"%".request()->sitio."%")->orWhere('nombre','like',"%".request()->sitio."%")->pluck('id')
			);
		}



		//if (request()->classificacion) {
			//$query->whereIn('pop_id',
				//Pop::whereHas('classification_id', Classification::where('classification','like',"%".request()->classificacion."%")->pluck('id'))
			//);
		//}




		if(request()->crm){

			$query->whereIn('pop_id',
				Pop::whereHas('comuna',function($q){
					$q->whereHas('zona',function($p){
						$p->whereHas('crm',function($c){
							$c->where('crm','like',"%".request()->crm."%"); 
						});
					});
				})
				->pluck('id')
			);


		}


		if(request()->zona){
			$query->whereIn('pop_id',
				Pop::whereHas('comuna',function($q){
					$q->whereHas('zona',function($p){
						$p->where('zona',request()->zona);
					});
				})
				->pluck('id')
			);

		}


		if(request()->codigo){
			$query->where('id','like',"%".request()->codigo."%");
		}



		

		if (request()->estado) {
			$query->whereIn('estado_id',
				Estado::where('descripcion', 'like', "%".request()->estado."%" )->pluck('id')
			);
		}




		if (request()->area) {
			$query->whereIn('area_id',
				Area::where('descripcion', 'like', "%".request()->area."%" )->pluck('id')
			);
		}
		if (request()->usuario) {
			$query->whereIn('user_id',
				User::where('name', 'like', "%".request()->usuario."%" )->orWhere('apellido','like',"%".request()->usuario."%")->pluck('id')
			);
		}

		if(request()->categoria){
			$query->whereIn('pop_id',
				Pop::whereHas('classification',function ($q){
					$q->where('classification',request()->categoria);
				})
				->pluck('id')
			);
		}


	}


}


