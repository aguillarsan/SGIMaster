<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_acceso extends Model
{
     protected $connection = 'plataforma';
    protected $table      = 'solicitud_acceso';
     public function user()
    {

        return $this->belongsTo(User::class);
    }
     public function modulo()
    {

        return $this->belongsTo(Modulo::class);
    }
}
