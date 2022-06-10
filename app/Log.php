<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $connection = 'task';
    protected $table      = 'logs';

    protected $fillable = ['id', 'ticket_id', 'descripicon', 'user_id'];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
