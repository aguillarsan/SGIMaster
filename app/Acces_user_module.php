<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acces_user_module extends Model
{
    protected $connection = 'plataforma';
    protected $table      = 'acces_user_module';
    protected $fillable   = ['user_id', 'modulo_id'];
}
