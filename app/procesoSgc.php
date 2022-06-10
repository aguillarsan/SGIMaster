<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class procesoSgc extends Model
{
    protected $connection ='sgc';
	protected $table = 'procesos'; 
}
