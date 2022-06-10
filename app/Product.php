<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'task';
    protected $table      = 'product';

     public function area_mantencion()
    {

        return $this->hasMany(Area_item_mantencion::class);
    }
}
