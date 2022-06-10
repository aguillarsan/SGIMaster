<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlertRequestBanc extends Model
{
     protected $connection ='psa';


	protected $table = 'alert_request_banc';

	public function user(){

		return $this->belongsTo(User::class);
	}

	public function site(){

		return $this->belongsTo(Site::class);
	}
}
