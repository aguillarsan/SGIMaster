<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pep_blocked extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'pep_blocked';
}
