<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_rack extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'tipo_racks';
}
