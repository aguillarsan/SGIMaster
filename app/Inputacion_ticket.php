<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inputacion_ticket extends Model
{
    protected $connection ='task';
	protected $table = 'inputacion_ticket';

	public function inputacion(){

		return $this->belongsTo(Inputacion::class);
	}
}
