<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    protected $connection = 'task';
    protected $table      = 'tickets';

    protected $dates = ['fecha_inicio', 'fecha_compromiso'];

    public function estado()
    {

        return $this->belongsTo(Estado::class);
    }

    public function inputacion(){
         return $this->belongsTo(Inputacion::class);
    }

    public function area()
    {

        return $this->belongsTo(Area::class);
    }
    public function solicitudesSgc()
    {

        return $this->hasMany(SolicitudSgc::class);
    }

    public function tipo_motivo()
    {

        return $this->belongsTo(Tipo_motivo::class);
    }

    public function pep_available()
    {

        return $this->belongsTo(Pep_available::class);
    }

    public function tipo_mantencion()
    {

        return $this->belongsTo(Tipo_mantencion::class);
    }

    public function tecnica()
    {

        return $this->belongsTo(Tecnica::class);
    }

    public function equipo()
    {

        return $this->belongsTo(Equipo::class);
    }
    public function subestado()
    {

        return $this->belongsTo(Subestado::class);
    }

  
    public function crm()
    {

        return $this->belongsTo(Crm::class);
    }
    public function site()
    {

        return $this->belongsTo(Site::class);
    }

    public function technologie()
    {

        return $this->belongsTo(Technologies::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function scopeUserCreada($query)
    {
        $query
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4)
        ;

    }
    public function scopeFiltroCrm($query)
    {
        $query
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 6)
            ->where('crm_id', '!=', 3)
        ;

    }
    public function scopeFilterState($query)
    {
        $query
            ->where('estado_id', '!=', 5)
            ->where('estado_id', '!=', 6)
            ->where('estado_id', '!=', 7);

    }
    public function scopeUserCreada2($query)
    {
        $query->where('estado_id', '=', 2)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }
    public function scopeUserCreada3($query)
    {
        $query->where('estado_id', '=', 3)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }
    public function scopeUserCreada4($query)
    {
        $query->where('estado_id', '=', 4)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }

    public function scopeUserRechazada($query)
    {
        $query->where('estado_id', '=', 5)
            ->where('subestado_id', '=', 1)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }
    public function scopeUserEspera($query)
    {
        $query->where('estado_id', '=', 2)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }

    public function scopeUserJefe($query)
    {
        $query->where('estado_id', '=', 3)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }

    public function scopeUserFin($query)
    {
        $query->where('estado_id', '=', 4)
            ->where('crm_id', '!=', 1)
            ->where('crm_id', '!=', 2)
            ->where('crm_id', '!=', 3)
            ->where('crm_id', '!=', 4);

    }

    public function scopeDenunciaBuscar($query)
    {

        if (request()->codigo) {
            $query->where('id', 'like', "%" . request()->codigo . "%");
        }

        if (request()->sitio) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->sitio . "%")->orWhere('nombre', 'like', "%" . request()->sitio . "%")->pluck('id')
            )->orWhereIn('technologie_id',
                Technologies::where('nem_tech', 'like', "%" . request()->sitio . "%")->pluck('id')
            );
        }
        if (request()->area) {
            $query->where('area_id', 'like', "%" . request()->area . "%");
        }
        if (request()->crm) {

            $query->where('crm_id', 'like', "%" . request()->crm . "%");

        }
        if (request()->categoria) {
            $query->whereIn('site_id',
                Site::where('classification_type_id', 'like', "%" . request()->categoria . "%")->pluck('id')
            );
        }
        if (request()->motivo) {
            $query->where('tipo_motivo_id', 'like', "%" . request()->motivo . "%");
        }
        $fecha1 = request()->fecha1;
        $fecha2 = request()->fecha2;

        if ($fecha1 != null && $fecha2 != null) {
            $query->whereBetween('created_at', [$fecha1, $fecha2]);
        }

        if ($fecha1 != null && $fecha2 == null) {
            $query->where('created_at', 'like', "%" . request()->fecha1 . "%");
        }

        if ($fecha2 != null && $fecha1 == null) {
            $query->where('fecha_compromiso', 'like', "%" . request()->fecha2 . "%");
        }
        if (request()->descripcion) {
            $query->where('descripcion', 'like', "%" . request()->descripcion . "%");
        }

    }

    public function scopeControlBuscar($query)
    {

        if (request()->codigo) {
            $query->where('id', 'like', "%" . request()->codigo . "%");
        }

        if (request()->sitio) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->sitio . "%")->orWhere('nombre', 'like', "%" . request()->sitio . "%")->pluck('id')
            )->orWhereIn('technologie_id',
                Technologies::where('nem_tech', 'like', "%" . request()->sitio . "%")->pluck('id')
            );
        }
        if (request()->area) {
            $query->where('area_id', 'like', "%" . request()->area . "%");
        }
        if (request()->crm) {

            $query->where('crm_id', 'like', "%" . request()->crm . "%");

        }

        if (request()->categoria) {
            $query->whereIn('site_id',
                Site::where('classification_type_id', 'like', "%" . request()->categoria . "%")->pluck('id')
            );
        }
        if (request()->core) {
            $query->whereIn('site_id',
                Site::where('core', 'like', "%" . request()->core . "%")->pluck('id')
            );
        }
        if (request()->olt) {
            $query->whereIn('site_id',
                Site::where('olt_3play', 'like', "%" . request()->olt . "%")->pluck('id')
            );
        }
        if (request()->bafi) {
            $query->whereIn('site_id',
                Site::where('bafi', 'like', "%" . request()->bafi . "%")->pluck('id')
            );
        }
        if (request()->mpls) {
            $query->whereIn('site_id',
                Site::where('mpls', 'like', "%" . request()->mpls . "%")->pluck('id')
            );
        }
        if (request()->pe_3g) {
            $query->whereIn('site_id',
                Site::where('pe_3g', 'like', "%" . request()->pe_3g . "%")->pluck('id')
            );
        }
        if (request()->localidad) {
            $query->whereIn('site_id',
                Site::where('localidad_obligatoria', 'like', "%" . request()->localidad . "%")->pluck('id')
            );
        }
        if (request()->coverage) {
            $query->whereIn('site_id',
                Site::where('coverage_type_id', 'like', "%" . request()->coverage . "%")->pluck('id')
            );
        }

        if (request()->motivo) {
            $query->where('tipo_motivo_id', 'like', "%" . request()->motivo . "%");
        }

        if (request()->cotizacion) {
            $query->where('cotizacion', 'like', "%" . request()->cotizacion . "%");
        }
        if (request()->informeFinal) {
            $query->where('informe_final', 'like', "%" . request()->informeFinal . "%");
        }
        if (request()->pxq) {
            $query->where('pxq', 'like', "%" . request()->pxq . "%");
        }

        $fecha1 = request()->fecha1;
        $fecha2 = request()->fecha2;

        if ($fecha1 != null && $fecha2 != null) {
            $query->whereBetween('created_at', [$fecha1, $fecha2]);
        }

        if ($fecha1 != null && $fecha2 == null) {
            $query->where('created_at', 'like', "%" . request()->fecha1 . "%");
        }

        if ($fecha2 != null && $fecha1 == null) {
            $query->where('fecha_compromiso', 'like', "%" . request()->fecha2 . "%");
        }
        if (request()->descripcion) {
            $query->where('descripcion', 'like', "%" . request()->descripcion . "%");
        }
        if (request()->estado) {
            $query->where('estado_id', '=', request()->estado);
        }

    }
    public function scopeBuscar($query)
    {

        if (request()->sitio) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->sitio . "%")->orWhere('nombre', 'like', "%" . request()->sitio . "%")->pluck('id')
            )->orWhereIn('technologie_id',
                Technologies::where('nem_tech', 'like', "%" . request()->sitio . "%")->pluck('id')
            );
        }
        //if (request()->classificacion) {
        //$query->whereIn('pop_id',
        //Pop::whereHas('classification_id', Classification::where('classification','like',"%".request()->classificacion."%")->pluck('id'))
        //);
        //}

        if (request()->pep_val) {
            $query->where('pep_new_checked',  1);
        }

        if (request()->m_rc_2020) {
            $query->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020');
        }

        if (request()->descripcion) {
            $query->where('descripcion', 'like', "%" . request()->descripcion . "%");
        }

        $fecha1 = request()->fecha1;
        $fecha2 = request()->fecha2;

        if ($fecha1 != null && $fecha2 != null) {
            $query->whereBetween('created_at', [$fecha1, $fecha2]);
        }

        if ($fecha1 != null && $fecha2 == null) {
            $query->where('created_at', 'like', "%" . request()->fecha1 . "%");
        }

        if ($fecha2 != null && $fecha1 == null) {
            $query->where('fecha_compromiso', 'like', "%" . request()->fecha2 . "%");
        }

        if (request()->crm) {

            $query->where('crm_id', 'like', "%" . request()->crm . "%");

        }

        if (request()->crmSelect) {

            $query->where('crm_id', 'like', "%" . request()->crmSelect . "%");

        }

        if (request()->zona) {
            $query->whereIn('site_id',
                Site::whereHas('pop', function ($q) {
                    $q->whereHas('comuna', function ($p) {
                        $p->whereHas('zona', function ($z) {
                            $z->where('cod_zona', 'like', "%" . request()->zona . "%");
                        });
                    });
                })

                    ->pluck('id')
            );

        }

        if (request()->codigo) {
            $query->where('id', 'like', "%" . request()->codigo . "%");
        }

        if (request()->estado) {
            $query->where('estado_id', '=', request()->estado);
        }

        if (request()->area) {
            $query->where('area_id', 'like', "%" . request()->area . "%");
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
            $query->where('tipo_motivo_id', 'like', "%" . request()->motivo . "%");
        }

    }

}
