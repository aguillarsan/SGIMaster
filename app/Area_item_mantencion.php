<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area_item_mantencion extends Model
{
    protected $connection = 'task';
    protected $table      = 'area_item_mantencion';


    public function product()
    {

        return $this->belongsTo(Product::class);
    }

    public function area_mantencion()
    {

        return $this->belongsTo(Area_mantencion::class);
    }
}
