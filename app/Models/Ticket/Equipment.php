<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $connection = 'task';
    protected $table      = 'equipments';
}
