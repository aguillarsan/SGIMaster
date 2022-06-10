<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraSgc extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'bitacoras'; 
    public function user(){

		return $this->belongsTo(User::class);
	}
 
}
