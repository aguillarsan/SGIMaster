<?php

namespace App\Models\Sgc;

use Illuminate\Database\Eloquent\Model;
use App\Proveedor;
use App\Models\Sgc\Cumplimiento;
class Cumplimiento_global extends Model
{
    protected $connection = 'sgc';
    protected $table = 'cumplimiento_global';
    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }
    public function cumplimiento()
    {

        return $this->belongsTo(Cumplimiento::class);
    }
}
