<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivoSgc extends Model
{
    protected $connection = 'sgc';

    protected $table = 'archivos';
}
