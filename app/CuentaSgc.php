<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaSgc extends Model
{
     protected $connection = 'sgc';
    protected $table      = 'cuentas';
}
