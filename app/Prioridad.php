<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $connection = 'plataforma';
    protected $table      = 'prioridad';
}
