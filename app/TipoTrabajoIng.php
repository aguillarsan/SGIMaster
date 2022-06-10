<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTrabajoIng extends Model
{
     protected $connection ='sgc';


    protected $table = 'tipo_trabajo_ingenierias';

    public function solicitudSgc(){

		return $this->hasMany(SolicitudSgc::class);
	}
}
