<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoPsa extends Model
{
    protected $connection = 'psa';

    protected $table = 'motivos';

    public function psa_solicitud()
    {

        return $this->hasMany(PsaSolicitud::class);
    }
}
