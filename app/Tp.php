<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tp extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'tps';
    protected $fillable =['nuevassolicitud_id','nro_tp'];

    public function SolicitudSgc(){

		return $this->belongsTo(SolicitudSgc::class);
	}
}
