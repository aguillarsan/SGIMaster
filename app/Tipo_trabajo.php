<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_trabajo extends Model
{
    protected $connection ='sgc';


    protected $table = 'tipo_trabajos';
    public function solicitudes(){

		return $this->hasMany(SolicitudSgc::class);
	}
}
