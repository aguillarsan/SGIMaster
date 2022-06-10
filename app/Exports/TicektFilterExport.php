<?php

namespace App\Exports;

use App\crm_user;
use App\role_user;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicektFilterExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;

    }
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {

        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }
/////////////

//BUSQUEDA DEL CRM

        $crm = crm_user::where('user_id', Auth::user()->id)->get(['crm_id']);

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if ($RoleId == 1 || $RoleId == 8) {
            $ticket = Ticket::with([
                'user'                     => function ($query) {
                    $query->select('id', 'name', 'apellido');
                },
                'area'                     => function ($query) {
                    $query->select('id', 'descripcion');
                },
                'site'                     => function ($query) {
                    $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id', 'classification_type_id', 'attention_type_id', 'category_type_id', 'bafi', 'olt_3play');
                },
                'site.pop'                 => function ($query) {
                    $query->select('id', 'comuna_id');
                },
                'site.pop.comuna'          => function ($query) {
                    $query->select('id', 'zona_id');
                },
                'site.pop.comuna.zona'     => function ($query) {
                    $query->select('id', 'crm_id', 'cod_zona', 'nombre_zona');
                },
                'site.pop.comuna.zona.crm' => function ($query) {
                    $query->select('id', 'nombre_crm');
                },
                'crm'                      => function ($query) {
                    $query->select('id', 'nombre_crm');
                },
                'estado'                   => function ($query) {
                    $query->select('id', 'descripcion');
                },
                'tipo_motivo'              => function ($query) {
                    $query->select('id', 'descripcion');
                },

                'tecnica'                  => function ($query) {
                    $query->select('id', 'descripcion');
                },
                'equipo'                   => function ($query) {
                    $query->select('id', 'descripcion');
                },
                'solicitudesSgc'           => function ($query) {
                    $query->select('ticket_id', 'id');
                },
                'technologie'              => function ($query) {
                    $query->select('id', 'nem_tech');
                },
                'inputacion'               => function ($query) {
                    $query->select('id', 'descripcion');
                },
            ])->buscar()->orderBy('clasificacion_id', 'asc')->get(['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'user_id', 'equipo_id', 'tecnica_id', 'fecha_curso', 'fecha_validacion', 'fecha_finalizada', 'fecha_rechazada', 'mantencion_energia', 'mantencion_clima', 'mantencion_ge', 'technologie_id', 'inputacion_id', 'nro_imputacion']);

            return $ticket;
        }

        if (Auth::user()->id == 21) {
            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->orderBy('clasificacion_id', 'asc')->get();
                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                } else {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 21)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                }
            }

        }

        if (Auth::user()->id == 14) {
            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->orderBy('clasificacion_id', 'asc')->get();
                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                } else {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('especialista_id', 14)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                }
            }

        }

        if ($RoleId == 5) {
            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('user_id', Auth::user()->id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->orderBy('clasificacion_id', 'asc')->get();
                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('user_id', Auth::user()->id)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                } else {
                    $ticket = Ticket::buscar()->where('estado_id', $this->request->modulo)->where('user_id', Auth::user()->id)->orderBy('clasificacion_id', 'asc')->get();
                    return $ticket;
                }
            }

        }

        if (Auth::user()->id == 11) {
            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                    ->where('crm_id', '!=', 2)
                    ->where('crm_id', '!=', 3)
                    ->where('crm_id', '!=', 4)->where('estado_id', $this->request->modulo)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->get();

                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                        ->where('crm_id', '!=', 2)
                        ->where('crm_id', '!=', 3)
                        ->where('crm_id', '!=', 4)->where('estado_id', $this->request->modulo)->where('tipo_motivo_id', '!=', 3)->get();

                    return $ticket;
                } else {
                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                        ->where('crm_id', '!=', 2)
                        ->where('crm_id', '!=', 3)
                        ->where('crm_id', '!=', 4)->where('estado_id', $this->request->modulo)->get();

                    return $ticket;
                }
            }

        }
        if ($crm_id == 7 || $RoleId == 16) {

            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->orderBy('clasificacion_id', 'asc')->get();

                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->get();

                    return $ticket;
                } else {
                    $ticket = Ticket::with([
                        'user'                     => function ($query) {
                            $query->select('id', 'name', 'apellido');
                        },
                        'area'                     => function ($query) {
                            $query->select('id', 'descripcion');
                        },
                        'site'                     => function ($query) {
                            $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id', 'classification_type_id', 'attention_type_id', 'category_type_id', 'bafi', 'olt_3play');
                        },
                        'site.site_type'           => function ($query) {
                            $query->select('id', 'site_type');
                        },

                        'site.pop'                 => function ($query) {
                            $query->select('id', 'comuna_id');
                        },
                        'site.pop.comuna'          => function ($query) {
                            $query->select('id', 'zona_id');
                        },
                        'site.pop.comuna.zona'     => function ($query) {
                            $query->select('id', 'crm_id', 'cod_zona', 'nombre_zona');
                        },
                        'site.pop.comuna.zona.crm' => function ($query) {
                            $query->select('id', 'nombre_crm');
                        },
                        'crm'                      => function ($query) {
                            $query->select('id', 'nombre_crm');
                        },
                        'estado'                   => function ($query) {
                            $query->select('id', 'descripcion');
                        },
                        'tipo_motivo'              => function ($query) {
                            $query->select('id', 'descripcion');
                        },
                        'tecnica'                  => function ($query) {
                            $query->select('id', 'descripcion');
                        },
                        'equipo'                   => function ($query) {
                            $query->select('id', 'descripcion');
                        },
                        'solicitudesSgc'           => function ($query) {
                            $query->select('ticket_id', 'id');
                        },
                        'technologie'              => function ($query) {
                            $query->select('id', 'nem_tech');
                        },
                        'inputacion'               => function ($query) {
                            $query->select('id', 'descripcion');
                        },

                    ])->buscar()->orderBy('clasificacion_id', 'asc')->get(['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'user_id', 'equipo_id', 'tecnica_id', 'fecha_curso', 'fecha_validacion', 'fecha_finalizada', 'fecha_rechazada', 'mantencion_energia', 'mantencion_clima', 'mantencion_ge', 'technologie_id', 'inputacion_id', 'nro_imputacion']);

                    return $ticket;
                }
            }

        } else {
            if ($this->request->motivoSelectIng == 7) {
                $ticket = Ticket::buscar()->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->orderBy('clasificacion_id', 'asc')->get();

                return $ticket;
            } else {
                if ($this->request->motivoSelectIng == 8) {
                    $ticket = Ticket::buscar()->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->get();

                    return $ticket;
                } else {
                    $ticket = Ticket::buscar()->where('crm_id', $crm_id)->orderBy('clasificacion_id', 'asc')->get();

                    return $ticket;
                }
            }

        }

    }
    public function map($ticket): array
    {
        return [
            $ticket->id,
            $ticket->estado ? $ticket->estado->descripcion : '',
            $ticket->user ? $ticket->user->name . ' ' . $ticket->user->apellido : '',
            $ticket->site ? $ticket->site->nem_site : '',
            $ticket->technologie ? $ticket->technologie->nem_tech : '',
            $ticket->site ? $ticket->site->site_type->site_type : '',
            $ticket->site ? $ticket->site->nombre : '',
            $ticket->clasificacion_id == 1 ? 'A' : ($ticket->clasificacion_id == 2 ? 'B' : ($ticket->clasificacion_id == 3 ? 'C' : ($ticket->clasificacion_id == 4 ? 'D' : ($ticket->clasificacion_id == 5 ? 'E' : $ticket->clasificacion_id == 6 ? 'NN' : '')))),
            $ticket->site ? $ticket->site->pop->comuna->zona->nombre_zona : '',
            $ticket->site ? $ticket->site->pop->comuna->zona->cod_zona : '',
            $ticket->site ? $ticket->site->pop->comuna->zona->crm->nombre_crm : '',
            $ticket->area ? $ticket->area->descripcion : '',
            $ticket->tecnica ? $ticket->tecnica->descripcion : '',
            $ticket->equipo ? $ticket->equipo->descripcion : '',
            $ticket->created_at,
            $ticket->fecha_compromiso,
            $ticket->tipo_motivo ? $ticket->tipo_motivo->descripcion : '',
            $ticket->trimestre == 1 ? 'PRIMERA MANTENCIÓN' : ($ticket->trimestre == 2 ? ' SEGUNDA MANTENCIÓN' : ($ticket->trimestre == 3 ? 'TERCERA MANTENCÓN' : ($ticket->trimestre == 4 ? 'CUARTA MANTENCIÓN' : ($ticket->trimestre == 5 ? 'QUINTA MANTENCIÓN' : '')))),
            $ticket->descripcion,
            $ticket->fecha_curso,
            $ticket->fecha_validacion,
            $ticket->fecha_finalizada,

            $ticket->mantencion_energia,
            $ticket->mantencion_clima,
            $ticket->mantencion_ge,
            $ticket->solicitudesSgc->first() ? $ticket->solicitudesSgc->pluck('id') : '',
            $ticket->inputacion ? $ticket->inputacion->descripcion : '',
            $ticket->nro_imputacion,

        ];
    }

    public function headings(): array
    {
        return [

            'ID',

            'ESTADO',

            'CREADOR',

            'NEMONICO',

            'TECNOLOGIA',

            'TIPO SITIO',

            'NOMBRE',

            'CATEGORIA',

            'ZONA',

            'COD_ZONA',

            'CRM',

            'ÁREA',

            'TECNICA',

            'EQUIPO',

            'FECHA DE CREACION',

            'FECHA DE TERMINO',

            'MOTIVO',

            'NRO° MANTENCION',

            'DESCRIPCION',

            'CAMBIO A EN CURSO',

            'CAMBIO A VALIDACÍON',

            'CAMBIO A FINALIZADA',

            'MANTENCION ENERGIA',

            'MANTENCION CLIMA',

            'MANTENCION GG.EE',

            'NRO SGC',

            'TIPO IMPUTACIÓN',
            
            'NRO IMPUTACIÓN',

        ];
    }
}
