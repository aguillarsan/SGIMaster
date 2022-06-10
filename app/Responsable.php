<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $connection = 'plataforma';
    protected $table      = 'responsables';
}
