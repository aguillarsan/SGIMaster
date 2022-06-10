<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_ticket extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'tipo_ticket';
}
