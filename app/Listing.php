<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    
    protected $connection ='task';
	protected $table = 'listings';
}
