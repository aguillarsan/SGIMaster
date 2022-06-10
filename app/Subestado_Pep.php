<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subestado_Pep extends Model
{
     protected $connection = 'control_pep';

    protected $table = 'sub_estados';
}
