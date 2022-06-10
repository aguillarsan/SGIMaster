<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Control_cambio_data extends Model
{
    protected $connection = 'control_cambios';

    protected $table = 'control_cambio_data'; 

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function tipo_documento()
    {
        return $this->belongsTo(Tipo_documento::class);
    }
    public function cambio_estado()
    {
        return $this->belongsTo(Cambio_estado::class);
    }
    public function estado_control_cambio()
    {
        return $this->belongsTo(Estado_control_cambio::class);
    }
}
