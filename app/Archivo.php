<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $connection ='task';


    protected $table = 'archivos';
}
