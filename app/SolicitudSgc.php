<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitudSgc extends Model
{
    protected $connection = 'sgc';
    protected $table      = 'nuevassolicitudes';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function site()
    {

        return $this->belongsTo(Site::class);
    }
    public function tps()
    {

        return $this->hasMany(Tp::class);
    }

    public function interesado_solicitud()
    {

        return $this->hasMany(Interesado_solicitud::class);
    }

    public function area()
    {

        return $this->belongsTo(AreaSgc::class);
    }
    public function solicitante()
    {
        return $this->belongsTo(Solicitante::class);
    }
    public function pm_interno()
    {
        return $this->belongsTo(Pm_interno::class);
    }
    public function pm_proyecto()
    {
        return $this->belongsTo(Pm_proyecto::class);
    }
    public function motivo_trabajo()
    {
        return $this->belongsTo(Motivo_Trabajos_ing::class);
    }

    public function job_ingenieria()
    {
        return $this->belongsTo(TipoTrabajoIng::class);
    }
    public function tipo_equipamiento()
    {
        return $this->belongsTo(TipoEquipamiento::class);
    }
    public function tipo_servicio()
    {
        return $this->belongsTo(TipoServicio::class);
    }
    public function cuenta()
    {
        return $this->belongsTo(CuentaSgc::class);
    }

    public function flujo_trabajo()
    {
        return $this->belongsTo(FlujoTrabajo::class);

    }
    public function tipo_gasto()
    {
        return $this->belongsTo(Tipo_gasto::class);

    }

    public function responsable_pago()
    {
        return $this->belongsTo(Responsable_pago::class);
    }

    public function tipo_trabajo()
    {

        return $this->belongsTo(Tipo_trabajo::class);
    }

    public function trabajoing()
    {

        return $this->belongsTo(TipoTrabajoIng::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
    public function temp_sgc_pop()
    {

        return $this->belongsTo(TempSgcPop::class);
    }
    public function proveedor()
    {

        return $this->belongsTo(Proveedor::class);
    }
    public function tipo_moneda()
    {

        return $this->belongsTo(Tipo_moneda::class);
    }

    public function tipo_boleta()
    {

        return $this->belongsTo(Tipo_boleta::class);
    }

    public function contingencia()
    {

        return $this->belongsTo(Contingencia::class);
    }

    public function proceso()
    {

        return $this->belongsTo(procesoSgc::class);
    }
    public function tipo_pago()
    {
        return $this->belongsTo(tipo_pago::class);
    }
    public function solicitud_duplicada()
    {

        return $this->belongsTo(Solicitud_duplicada::class);
    }
    public function subestado()
    {

        return $this->belongsTo(subestadoSgc::class);
    }

    public function solicitud_montos()
    {

        return $this->hasMany(Solicitud_monto::class);
    }
    public function solicitud_das()
    {

        return $this->hasMany(Solicitud_das::class);
    }

    public function scopeInactivaOym($query)
    {
        $query
            ->where('proceso_id', '!=', 1)
            ->where('proceso_id', '!=', 2)
            ->where('proceso_id', '!=', 3)
            ->where('proceso_id', '!=', 4)
            ->where('proceso_id', '!=', 5)
            ->where('proceso_id', '!=', 6)
            ->where('proceso_id', '!=', 7)
            ->where('proceso_id', '!=', 8)
            ->where('proceso_id', '!=', 9)
            ->where('proceso_id', '!=', 10)
            ->where('proceso_id', '!=', 11)
            ->where('proceso_id', '!=', 12)
            ->where('proceso_id', '!=', 15)
            ->where('proceso_id', '!=', 16)
        ;

    }
    public function ScopeFiltroEstado($query)
    {
        $query

            ->whereIn('subestado_id', [2, 6, 3, 1]);
    }
    public function scopeFiltroInfGuia($query)
    {
        $query
            ->where('subestado_id', '!=', 1)
            ->where('subestado_id', '!=', 2)

            ->where('subestado_id', '!=', 4)
            ->where('subestado_id', '!=', 5)
            ->where('subestado_id', '!=', 6)
            ->where('subestado_id', '!=', 7)
            ->where('subestado_id', '!=', 8)
            ->where('subestado_id', '!=', 9)
            ->where('subestado_id', '!=', 10)
            ->where('subestado_id', '!=', 11)
            ->where('subestado_id', '!=', 12)
            ->where('subestado_id', '!=', 15)
            ->where('subestado_id', '!=', 16)
            ->where('subestado_id', '!=', 17)
            ->where('subestado_id', '!=', 18)

        ;

    }

    public function scopeInactivaPmo($query)
    {
        $query
            ->where('area_creadora_id', 1)
            ->where('proceso_id', '!=', 1)
            ->where('proceso_id', '!=', 2)
            ->where('proceso_id', '!=', 3)
            ->where('proceso_id', '!=', 4)
            ->where('proceso_id', '!=', 5)
            ->where('proceso_id', '!=', 6)
            ->where('proceso_id', '!=', 7)
            ->where('proceso_id', '!=', 8)
            ->where('proceso_id', '!=', 9)
            ->where('proceso_id', '!=', 10)
            ->where('proceso_id', '!=', 11)
            ->where('proceso_id', '!=', 12)
            ->where('proceso_id', '!=', 15)
            ->where('proceso_id', '!=', 16)
            ->where('proceso_id', '!=', 17)

        ;

    }

    public function scopeBuscar($query)
    {
        if (request()->idsolicitud) {
            $query->where('id', '=', request()->idsolicitud)->orWhere('solicitud_duplicada_id', '=', request()->idsolicitud);
        }
        if (request()->ework) {
            $query->where('ework', 'like', "%" . request()->ework . "%");
        }
        if (request()->cotizacion) {
            $query->where('cotizacion', 'like', "%" . request()->cotizacion . "%");
        }
        if (request()->boleta) {
            $query->where('boleta', 'like', "%" . request()->boleta . "%");
        }

        if (request()->ocCesta) {
            $query->where('cesta', 'like', "%" . request()->ocCesta . "%")->orWhere('oc', 'like', "%" . request()->ocCesta . "%");
        }

        if (request()->proceso) {
            $query->where('proceso_id', '=', request()->proceso);
        }

        if (request()->sitio) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->sitio . "%")->orWhere('nombre', 'like', "%" . request()->sitio . "%")->pluck('id')
            )->orWhereIn('temp_sgc_pop_id',
                TempSgcPop::where('nem_movil', 'like', "%" . request()->sitio . "%")->pluck('id')
            );
        }
        if (request()->user_id) {
            $query->where('user_id', '=', request()->user_id);
        }

        if (request()->subproceso) {
            $query->where('subestado_id', '=', request()->subproceso);
        }

        if (request()->proveedor) {
            $query->whereIn('proveedor_id',
                Proveedor::where('PROVEEDOR', 'like', "%" . request()->proveedor . "%")->pluck('id')
            );
        }

    }

    public function scopeSearchFile($query)
    {
        if (request()->search) {
            $query->where('id', '=', request()->search)->orWhereIn('site_id', Site::where('nem_site', 'like', "%" . request()->search . "%")->orWhere('nombre', 'like', "%" . request()->search . "%")->pluck('id'))->orWhereIn('user_id', User::where('name', 'like', "%" . request()->search . "%")->pluck('id'));
        }
     

    }

}
