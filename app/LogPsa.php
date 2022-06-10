<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogPsa extends Model
{
     protected $connection ='psa';


	protected $table = 'logs';
	 public function user(){

		return $this->belongsTo(User::class);
	}
}
