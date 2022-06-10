<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'actividades';
}
