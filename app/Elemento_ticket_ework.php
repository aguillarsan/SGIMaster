<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento_ticket_ework extends Model
{
    protected $connection ='ework';


	protected $table = 'elemento_ticket_ework';

	public function elemento(){

		return $this->belongsTo(Elemento::class);
	}
}
