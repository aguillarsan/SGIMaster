<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlujoTrabajo extends Model
{
    protected $connection = 'sgc';

    protected $table = 'flujo_trabajos';
    public function solicitudSgc()
    {

        return $this->hasMany(SolicitudSgc::class);
    }
}
