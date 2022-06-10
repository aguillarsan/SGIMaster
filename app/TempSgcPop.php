<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempSgcPop extends Model
{
    protected $connection ='sitios';



	protected $table = 'temp_sgc_pops';

	public function solicitudes(){

        return $this->hasMany(SolicitudSgc::class);
    }
}
