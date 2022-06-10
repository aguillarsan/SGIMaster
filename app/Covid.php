<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $connection = 'mysql';
    protected $table      = 'formcovid';
    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }
}
