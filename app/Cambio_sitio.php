<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambio_sitio extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'cambio_sitio';
}
