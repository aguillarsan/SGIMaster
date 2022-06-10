<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subestado extends Model
{
     protected $connection ='task';


    protected $table = 'subestados';

     public function tikecets(){

        return $this->hasMany(ticket::class);
    }
}
