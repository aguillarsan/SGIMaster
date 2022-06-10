<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_duplicada extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'solicitud_duplicadas';

    public function solicitud_sgc()
    {

        return $this->hasMany(SolicitudSgc::class);
    }

    public function proceso()
    {

        return $this->belongsTo(procesoSgc::class);
    }
    public function subestado()
    {

        return $this->belongsTo(subestadoSgc::class);
    }

    public function tipo_moneda()
    {

        return $this->belongsTo(Tipo_moneda::class);
    }

    public function tipo_boleta()
    {

        return $this->belongsTo(Tipo_boleta::class);
    }

}
