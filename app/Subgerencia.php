<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subgerencia extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'subgerencias';

}
