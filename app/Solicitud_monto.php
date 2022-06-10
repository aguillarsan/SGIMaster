<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_monto extends Model
{
    protected $connection ='sgc';

   
  
    protected $table = 'solicitud_montos'; 
    public function SolicitudSgc(){

		return $this->belongsTo(SolicitudSgc::class);
	}
   

}
