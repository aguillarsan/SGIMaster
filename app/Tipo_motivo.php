<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_motivo extends Model
{
    protected $connection ='ework';


	protected $table = 'tipo_motivos';

	 public function tikecets(){

        return $this->hasMany(ticket::class);
    }

}
