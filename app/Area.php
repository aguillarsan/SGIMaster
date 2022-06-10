<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
      protected $connection ='task';


    protected $table = 'areas';

     public function tikecets(){

        return $this->hasMany(ticket::class);
    }
    public function halteds(){

		return $this->hasMany(Halted::class);
	}
}
