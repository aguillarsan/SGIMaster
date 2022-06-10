<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesado_solicitud extends Model
{
    public $timestamps = false;

	protected $connection ='sgc';


	protected $table = 'interesado_solicitud'; 

	public function proyect()
    {
        return $this->belongsTo(SolicitudSgc::class);
    }

     public function user()
    {

        return $this->belongsTo(User::class);
    }

}
