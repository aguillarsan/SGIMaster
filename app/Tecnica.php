<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnica extends Model
{
     protected $connection ='task';


    protected $table = 'tecnicas';

     public function tikecets(){

        return $this->hasMany(ticket::class);
    }
    public function halteds(){

		return $this->hasMany(Halted::class);
	}
}
