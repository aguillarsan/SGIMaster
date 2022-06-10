<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteresadoSolicitud extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'interesado_solicitud';
    public $timestamps    = false;

    public function soli()
    {

        return $this->belongsTo(SolicitudSgc::class);
    }
}
