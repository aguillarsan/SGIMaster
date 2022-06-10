<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_job extends Model
{
    protected $connection = 'providers_ticket';

    protected $table = 'type_job';
}
