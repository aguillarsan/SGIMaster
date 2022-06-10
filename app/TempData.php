<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempData extends Model
{
    protected $connection ='fomulario_online';


    protected $table = 'temp_data';
}
