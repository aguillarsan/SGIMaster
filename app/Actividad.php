<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
      protected $connection ='repositorio';

    
     protected $table = 'actividades';

    public function user()
    {

        return $this->belongsTo(User::class);
    }
     public function carpeta()
    {

        return $this->belongsTo(Carpeta::class);
    }
}
