<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $connection = 'control_pep';

    protected $table = 'ranking';

}
