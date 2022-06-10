<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPsa extends Model
{
    protected $connection ='psa';


	protected $table = 'estados';
}
