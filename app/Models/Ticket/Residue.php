<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class Residue extends Model
{
    protected $connection = 'task';
    protected $table      = 'residues';
}