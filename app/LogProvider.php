<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogProvider extends Model
{
    protected $connection = 'providers_ticket';

    protected $table = 'logs';
}
