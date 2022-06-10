<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{  
    
    protected $connection ='mysql';
    protected $table = 'role_user';

    public function role(){

      return $this->belongsTo(Rol::class);
    }
}
