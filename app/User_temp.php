<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_temp extends Model
{
    protected $connection = 'task';
    protected $table      = 'users_temp';
     public function crm(){

		return $this->belongsTo(Crm::class);
	}
	
	public function zona(){

		return $this->belongsTo(Zona::class);
	}
}
