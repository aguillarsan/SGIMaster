<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_type extends Model
{
	protected $connection ='sitios';



	protected $table = 'site_types';
    public function sites(){

        return $this->hasMany(Site::class);
    }
}
