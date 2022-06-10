<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
     protected $connection ='sitios';

    
     protected $table = 'categories';

     public function pops(){

		return $this->hasMany(Pop::class);
	}
}
