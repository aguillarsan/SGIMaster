<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona_user extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'zona_user';
    public $timestamps    = false; 
}
