<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $connection ='task';
	protected $table = 'notificaciones';
}
