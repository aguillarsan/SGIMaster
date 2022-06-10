<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State_pop_halted extends Model
{

	protected $connection ='task';
	protected $table = 'state_pop_halted';

	public function halteds(){

		return $this->hasMany(Halted::class);
	}
}
