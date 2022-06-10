<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
      protected $connection = 'task';
    protected $table      = 'materials';
}
