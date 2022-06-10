<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $connection ='sgc';

	public $timestamps = false;
	
	protected $table = 'cargos';
}
