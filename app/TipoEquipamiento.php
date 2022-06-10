<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipamiento extends Model
{
    protected $connection ='sgc';


    protected $table = 'tipo_equipamientos';
}
