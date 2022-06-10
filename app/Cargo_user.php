<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo_user extends Model
{
    protected $connection ='sgc';

	public $timestamps = false;
	
	protected $table = 'cargo_user';
}
