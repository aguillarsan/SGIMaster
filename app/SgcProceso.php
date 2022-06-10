<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SgcProceso extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'procesos';

}
