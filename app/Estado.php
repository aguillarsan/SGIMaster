<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
      protected $connection ='task';


    protected $table = 'estados';

     public function tikecets(){

        return $this->hasMany(ticket::class);
    }
}
