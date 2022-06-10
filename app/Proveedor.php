<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $connection ='sgc';


    protected $table = 'proveedores';

     public function solicitudes(){

		return $this->hasMany(SolicitudSgc::class);
	}
}
