<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inputacion extends Model
{
	protected $connection ='task';
	protected $table = 'inputaciones';
	public function tikecets(){

		return $this->hasMany(ticket::class);
	}

	public function imputacion_ticket(){

		return $this->hasMany(Imputacion_ticket::class);
	}

}
