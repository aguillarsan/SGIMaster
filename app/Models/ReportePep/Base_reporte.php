<?php

namespace App\Models\ReportePep;

use Illuminate\Database\Eloquent\Model;
use App\Models\ReportePep\Esfuerzo;
use App\Models\ReportePep\Rango;
use App\Site;
class Base_reporte extends Model
{
    protected $connection ="reports";
    protected $table      = 'base_reporte';

    public function esfuerzo()
    {

        return $this->belongsTo(Esfuerzo::class);
    }
    public function rango()
    {

        return $this->belongsTo(Rango::class);
    }
    public function site()
    {

        return $this->belongsTo(Site::class);
    }
}

