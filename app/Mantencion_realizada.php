<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantencion_realizada extends Model
{
     protected $connection ='task';
	protected $table = 'mantenciones_realizadas';
}
