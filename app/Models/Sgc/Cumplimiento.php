<?php

namespace App\Models\Sgc;

use Illuminate\Database\Eloquent\Model;

class Cumplimiento extends Model
{
    protected $connection = 'sgc';
    protected $table = 'cumplimientos';
}
