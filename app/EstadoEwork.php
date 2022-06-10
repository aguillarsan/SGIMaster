<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoEwork extends Model
{
    protected $connection ='ework';


    protected $table = 'estados';

     public function solicitud_eworks(){

        return $this->hasMany(Solicitud_ework::class);
    }
}
