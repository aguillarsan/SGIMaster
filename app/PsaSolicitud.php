<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PsaSolicitud extends Model
{
    protected $connection = 'psa';

    protected $table = 'solicitudes';
    public function almacen()
    {

        return $this->belongsTo(Almacen::class);
    }

    public function site()
    {

        return $this->belongsTo(Site::class);
    }

    public function prioridad()
    {

        return $this->belongsTo(PrioridadPsa::class);
    }
    public function activo()
    {

        return $this->belongsTo(Activo::class);
    }
    public function crm()
    {

        return $this->belongsTo(Crm::class);
    }
    public function archivo()
    {

        return $this->belongsTo(ArchivosPsa::class);
    }
    public function estado()
    {

        return $this->belongsTo(EstadoPsa::class);
    }
    public function subestado()
    {

        return $this->belongsTo(SubestadoPsa::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function codSap()
    {

        return $this->belongsTo(Cod_sap::class);
    }
    public function negocio()
    {

        return $this->belongsTo(Negocio::class);
    }
    public function motivo()
    {

        return $this->belongsTo(MotivoPsa::class);
    }

    public function marca()
    {

        return $this->belongsTo(Marca::class);
    }
    public function capacidad()
    {

        return $this->belongsTo(Capacidad::class);
    }

    public function oficina()
    {

        return $this->belongsTo(Oficina::class);
    }

    public function scopeFilterF($query)
    {
        $query
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }

    public function scopeBuscar($query)
    {

        if (request()->codigo) {
            $query->where('id', 'like', "%" . request()->codigo . "%");
        }
        if (request()->estado) {
            $query->where('estado_id', 'like', "%" . request()->estado . "%");
        }
        if (request()->total) {
            $query->where('total_activo', 'like', "%" . request()->total . "%");
        }
        if (request()->prioridad_id) {
            $query->where('prioridad_id', 'like', "%" . request()->prioridad_id . "%");
        }

        if (request()->cod_sap) {
            $query->where('cod_sap_id', 'like', "%" . request()->cod_sap . "%");
        }
        if (request()->sitio) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->sitio . "%")->orWhere('nombre', 'like', "%" . request()->sitio . "%")->pluck('id')
            )->orWhereIn('oficina_id', Oficina::where('region', 'like', "%" . request()->sitio . "%")->orWhere('zona', 'like', "%" . request()->sitio . "%")->pluck('id'));
        }
        if (request()->user) {
            $query->whereIn('user_id',
                User::where('name', 'like', "%" . request()->user . "%")->orWhere('apellido', 'like', "%" . request()->user . "%")->pluck('id')
            );
        }
        if (request()->categoria) {
            $query->whereIn('site_id',
                Site::where('classification_type_id', 'like', "%" . request()->categoria . "%")->pluck('id')
            );
        }



        if (request()->motivo) {
            $query->where('motivo_id', 'like', "%" . request()->motivo . "%");
        }

        if (request()->crm) {
            $query->whereIn('site_id',
                Site::whereHas('pop', function ($q) {
                    $q->whereHas('comuna', function ($p) {
                        $p->whereHas('zona', function ($z) {
                            $z->where('crm_id', 'like', "%" . request()->crm . "%");
                        });
                    });
                })

                    ->pluck('id')
            );

        }

    }

}
