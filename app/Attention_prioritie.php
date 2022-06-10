<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attention_prioritie extends Model
{
    protected $connection ='sitios';

    
     protected $table = 'attention_priorities';

     public function pops(){

		return $this->hasMany(Pop::class);
	}
}
