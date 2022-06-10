<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_ingenieria extends Model
{
    protected $connection = 'ticket_ingenieria';
    protected $table      = 'tickets';

    protected $appends = ['estado'];


    public function getEstadoAttribute()
    {
        
        return "{$this->proceso->descripcion} {$this->subproceso->descripcion}";
    } 
    public function room()
    {

        return $this->belongsTo(Room::class);
    }
    public function subgerencia()
    {

        return $this->belongsTo(Subgerencia::class);
    }
    public function tipo_ticket()
    {

        return $this->belongsTo(Tipo_ticket::class);
    }

    

    public function ticket_ingenieria_tp()
    {

        return $this->hasMany(Ticket_ingenieria_tp::class);
    }



    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function pop()
    {

        return $this->belongsTo(Pop::class);
    }

    public function site()
    {

        return $this->belongsTo(Site::class);
    }

    public function proceso()
    {

        return $this->belongsTo(Proceso::class);
    }

    public function subproceso()
    {

        return $this->belongsTo(Subproceso::class);
    }
    public function tipo_rack()
    {

        return $this->belongsTo(Tipo_rack::class);
    }
    public function tipo_moneda()
    {

        return $this->belongsTo(Tipo_moneda::class);
    }

    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }

    public function scopeBuscar($query)
    {

        if (request()->PopSalaSite) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->PopSalaSite . "%")->orWhere('nombre', 'like', "%" . request()->PopSalaSite . "%")->pluck('id')
            )->orWhereIn('pop_id',
                Pop::where('nombre', 'like', "%" . request()->PopSalaSite . "%")->orWhere('direccion', 'like', "%" . request()->PopSalaSite . "%")->pluck('id')
            );
        }

        if (request()->id) {
            $query->where('id', 'like', "%" . request()->id . "%");
        }

        if (request()->tp) {
            $query->where('tp', 'like', "%" . request()->tp . "%");
        }
        if (request()->sistema) {
            $query->where('sistema', 'like', "%" . request()->sistema . "%");
        }

        if (request()->bastidor) {
            $query->where('bastidor', 'like', "%" . request()->bastidor . "%");
        }

        if (request()->estado) {
            $query->where('subproceso_id', 'like', "%" . request()->estado . "%");
        }

        if (request()->user) {
            $query->whereIn('user_id',
                User::where('name', 'like', "%" . request()->user . "%")->orWhere('apellido', 'like', "%" . request()->user . "%")->pluck('id')
            );
        }

    }

}
