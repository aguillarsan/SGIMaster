<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_boleta extends Model
{
    protected $connection = 'task';

    protected $table = 'tipo_boletas';

    public function solicitudes()
    {

        return $this->hasMany(SolicitudSgc::class);
    }
}
