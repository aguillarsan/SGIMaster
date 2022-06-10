<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coverage_types extends Model
{
    protected $connection ='sitios';

    
     protected $table = 'coverage_types';

     public function sites(){

		return $this->hasMany(sites::class);
	}
}
