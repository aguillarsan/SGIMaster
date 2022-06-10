<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUserLog extends Model
{
    protected $connection = 'plataforma';
    protected $table      = 'temuserlog';
}
