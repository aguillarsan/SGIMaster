<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers_Pre_Tickets extends Model
{
    protected $connection = 'providers_ticket';

    protected $table = 'pre_sgc';

    public function site() 
    {

        return $this->belongsTo(Site::class);
    }

    public function tipo_moneda()
    {

        return $this->belongsTo(Tipo_moneda::class);
    }
    public function typeJob()
    {

        return $this->belongsTo(Type_job::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function contactTypeJob()
    {

        return $this->belongsTo(Contact_type_job::class);
    }
    public function providersPreTicketsState()
    {

        return $this->belongsTo(Providers_Pre_Tickets_State::class);
    }

    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }
}
