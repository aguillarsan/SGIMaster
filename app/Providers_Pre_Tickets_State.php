<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers_Pre_Tickets_State extends Model
{
    protected $connection = 'providers_ticket';

    protected $table = 'providers_pre_tickets_state';

    public function providers_pre_tickets()
    {

        return $this->hasMany(Providers_Pre_Tickets::class);
    }
}
