<?php

namespace App\Models\ReportePep;

use Illuminate\Database\Eloquent\Model;

class Sap extends Model
{
    protected $connection ="reports";
    protected $table      = 'saps';
}
