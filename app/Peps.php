<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peps extends Model
{
    protected $connection = 'control_pep';

    protected $table = 'peps';

    protected $crm;

    public function site()
    {

        return $this->belongsTo(Site::class);
    }
    public function flujo()
    {

        return $this->belongsTo(Flujos::class);
    }
    public function tipo_pep()
    {

        return $this->belongsTo(Tipo_Pep::class);
    }
    public function total_pep()
    {

        return $this->belongsTo(Total_pep::class);
    }
    public function estado()
    {

        return $this->belongsTo(EstadoControlPep::class);
    }
    public function subestado()
    {

        return $this->belongsTo(Subestado_Pep::class);
    }
    

    public function scopeFiltroCrm($query, $crm)
    {

        $this->crm = $crm;
        $query->whereIn('site_id',
            Site::whereHas('pop', function ($q) {
                $q->whereHas('comuna', function ($p) {
                    $p->whereHas('zona', function ($z) {
                        $z->whereHas('crm', function ($c) {
                            $c->where('id', $this->crm);
                        });
                    });
                });
            })->pluck('id'))->paginate(20);

    }

    public function scopeFiltroCrmCentroSurSur($query)
    {
        $query->whereIn('site_id',
            Site::whereHas('pop', function ($q) {
                $q->whereHas('comuna', function ($p) {
                    $p->whereHas('zona', function ($z) {
                        $z->whereHas('crm', function ($c) {
                            $c->where('id', '!=', 1)->where('id', '!=', 2)->where('id', '!=', 3)->where('id', '!=', 6);
                        });
                    });
                });
            })->pluck('id'))->paginate(20);

    }
      public function scopeFiltroCrmMetropolitano($query)
    {
        $query->whereIn('site_id',
            Site::whereHas('pop', function ($q) {
                $q->whereHas('comuna', function ($p) {
                    $p->whereHas('zona', function ($z) {
                        $z->whereHas('crm', function ($c) {
                            $c->where('id', '!=', 1)->where('id', '!=', 2)->where('id', '!=', 4)->where('id', '!=', 5)->where('id', '!=', 6);
                        });
                    });
                });
            })->pluck('id'))->paginate(20);

    }

    public function scopeFiltroCrmSurAustral($query)
    {
        $query->whereIn('site_id',
            Site::whereHas('pop', function ($q) {
                $q->whereHas('comuna', function ($p) {
                    $p->whereHas('zona', function ($z) {
                        $z->whereHas('crm', function ($c) {
                            $c->where('id', '!=', 1)->where('id', '!=', 2)->where('id', '!=', 3)->where('id', '!=', 4)->where('id', '!=', 5);
                        });
                    });
                });
            })->pluck('id'))->paginate(20);

    }

    public function scopeBuscar($query)
    {

        if (request()->codigo) {
            $query->where('id', 'like', "%" . request()->codigo . "%");
        }

        if (request()->pep) {
            $query->where('pep', 'like', "%" . request()->pep . "%");
        }

        if (request()->ework) {
            $query->where('ework', 'like', "%" . request()->ework . "%");
        }

        if (request()->estado) {
            $query->where('estado_id', '=', request()->estado);
        }

        if (request()->site) {
            $query->whereIn('site_id',
                Site::where('nem_site', 'like', "%" . request()->site . "%")->orWhere('nombre', 'like', "%" . request()->site . "%")->pluck('id')
            );
        }

        if (request()->crm) {
            $query->whereIn('site_id',
                Site::whereHas('pop', function ($q) {
                    $q->whereHas('comuna', function ($p) {
                        $p->whereHas('zona', function ($z) {
                            $z->whereHas('crm', function ($c) {
                                $c->where('id', request()->crm);
                            });
                        });
                    });
                })

                    ->pluck('id')
            );

        }

        if (request()->zona) {
            $query->whereIn('site_id',
                Site::whereHas('pop', function ($q) {
                    $q->whereHas('comuna', function ($p) {
                        $p->whereHas('zona', function ($z) {
                            $z->where('id', request()->zona);

                        });
                    });
                })

                    ->pluck('id')
            );

        }

        if (request()->categoria) {
            $query->whereIn('site_id',
                Site::where('classification_type_id', request()->categoria)->pluck('id')
            );
        }

        if (request()->flujo_id) {
            $query->where('flujo_id', request()->flujo_id);
        }
        if (request()->tipo_pep_id) {
            $query->where('tipo_pep_id', request()->tipo_pep_id);
        }

    }
}
