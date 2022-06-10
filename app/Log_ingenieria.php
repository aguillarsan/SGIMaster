<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_ingenieria extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'logs';
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
