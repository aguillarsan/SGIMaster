<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_mantencion extends Model
{
    protected $connection = 'task';
    protected $table      = 'tipo_mantenciones';
}
