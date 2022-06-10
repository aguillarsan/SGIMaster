<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_mantencion_olt extends Model
{
    protected $connection = 'task';
    protected $table      = 'ticket_mantencion_olt'; 

     public function product()
    {

        return $this->belongsTo(Product::class);
    }

    public function area_mantencion()
    {

        return $this->belongsTo(Area_mantencion::class);
    }
}
