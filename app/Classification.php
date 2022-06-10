<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
        protected $connection ='sitios';

    
     protected $table = 'classification_types';

     public function sites(){

		return $this->hasMany(sites::class);
	}
}
