<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_type_job extends Model
{
    protected $connection = 'providers_ticket';

    protected $table = 'conctact_type_job';
    public function providers_pre_tickets()
    {

        return $this->hasMany(Providers_Pre_Tickets::class);
    }
}
