<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora_Pep extends Model
{
    protected $connection = 'control_pep';

    protected $table = 'bitacoras';
}
