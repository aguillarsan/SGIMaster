<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    protected $connection ='sitios';



	protected $table = 'technologies';


	public function site(){

		return $this->belongsTo(Site::class);
	} 

	public function tickets(){

		return $this->hasMany(Ticket::class);
	}
}
