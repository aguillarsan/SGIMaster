<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'supervisores';

}
