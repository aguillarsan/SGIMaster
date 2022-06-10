<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	protected $connection ='sitios';



	protected $table = 'sites';

	public function pop(){

		return $this->belongsTo(Pop::class);
	}

	public function tickets(){

		return $this->hasMany(Ticket::class);
	}

	public function solicitudes(){

		return $this->hasMany(SolicitudSgc::class);
	}

	public function classification(){

		return $this->belongsTo(Classification::class);
	}
	public function coverage_type(){

		return $this->belongsTo(Coverage_types::class);
	}
	
	public function categorie(){

		return $this->belongsTo(Categories::class);
	}

	public function attention_prioritie(){

		return $this->belongsTo(Attention_prioritie::class);
	}
	public function halteds(){

		return $this->hasMany(Halted::class);
	}

	public function classification_type(){

		return $this->belongsTo(Classification_type::class);
	}
	public function site_type(){

		return $this->belongsTo(Site_type::class);
	}

	public function technologies(){

		return $this->hasMany(Technologies::class);
	}

	
}
