<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_supervision extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'tipo_supervision';
}
