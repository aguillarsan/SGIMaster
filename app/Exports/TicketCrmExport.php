<?php

namespace App\Exports;

use App\role_user;
use App\Ticket;
use App\crm_user;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class TicketCrmExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->select('role_id')->get();

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        $crm = crm_user::where('user_id', Auth::user()->id)->first();

                $crm_id = $crm->crm_id;

        if ($RoleId == 1 || $RoleId == 8 ||   $crm_id == 7)  {
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
                    $query->select('id', 'crm_id', 'cod_zona');
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
                'technologie'              => function ($query) {
                    $query->select('id', 'nem_tech');
                },
                'inputacion'               => function ($query) {
                    $query->select('id', 'descripcion');
                },
            ])->orderBy('id', 'desc')

                ->get(['site_id', 'estado_id', 'area_id', 'tecnica_id', 'equipo_id', 'created_at', 'fecha_compromiso', 'tipo_motivo_id', 'fecha_curso', 'fecha_validacion', 'fecha_finalizada', 'mantencion_energia', 'mantencion_clima', 'mantencion_ge', 'cotizacion', 'informe_final', 'pxq', 'checklist', 'fotos_informe_fotografico', 'otros', 'id', 'documento_denuncia', 'ework', 'user_id', 'trimestre', 'descripcion', 'technologie_id', 'inputacion_id', 'nro_imputacion','nro_tarea_office']);
            return $ticket;
        } else {
            if (Auth::user()->id == 217) {

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
                        $query->select('id', 'crm_id', 'cod_zona');
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
                    'technologie'              => function ($query) {
                        $query->select('id', 'nem_tech');
                    },
                    'inputacion'               => function ($query) {
                        $query->select('id', 'descripcion');
                    },
                ])->orderBy('id', 'desc')

                    ->get(['site_id', 'estado_id', 'area_id', 'tecnica_id', 'equipo_id', 'created_at', 'fecha_compromiso', 'tipo_motivo_id', 'fecha_curso', 'fecha_validacion', 'fecha_finalizada', 'mantencion_energia', 'mantencion_clima', 'mantencion_ge', 'cotizacion', 'informe_final', 'id', 'pxq', 'checklist', 'fotos_informe_fotografico', 'otros', 'documento_denuncia', 'ework', 'user_id', 'trimestre', 'descripcion', 'technologie_id', 'inputacion_id', 'nro_imputacion','nro_tarea_office']);
                return $ticket;
            } else {

                $crm = crm_user::where('user_id', Auth::user()->id)->first();

                $crm_id = $crm->crm_id;
 
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
                        $query->select('id', 'crm_id', 'cod_zona');
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
                    'technologie'              => function ($query) {
                        $query->select('id', 'nem_tech');
                    },
                    'inputacion'               => function ($query) {
                        $query->select('id', 'descripcion');
                    },
                ])->where('estado_id', '!=', 5)->where('estado_id', '!=', 6)->where('estado_id', '!=', 7)->where('crm_id', $crm_id)

                    ->orderBy('id', 'desc')

                    ->get(['site_id', 'estado_id', 'area_id', 'tecnica_id', 'equipo_id', 'created_at', 'fecha_compromiso', 'tipo_motivo_id', 'fecha_curso', 'fecha_validacion', 'fecha_finalizada', 'mantencion_energia', 'mantencion_clima', 'mantencion_ge', 'cotizacion', 'informe_final', 'pxq', 'checklist', 'fotos_informe_fotografico', 'otros', 'id', 'documento_denuncia', 'ework', 'user_id', 'trimestre', 'descripcion', 'technologie_id', 'inputacion_id', 'nro_imputacion','nro_tarea_office']);
                return $ticket;
            }
        }
    }

    public function map($ticket): array
    {
        return
            [
            $ticket->id,
            $ticket->estado ? $ticket->estado->descripcion : '',
            $ticket->user ? $ticket->user->name.' '.$ticket->user->apellido  : '' ,
            $ticket->site ? $ticket->site->nem_site : '',
            $ticket->technologie ? $ticket->technologie->nem_tech : '',
            $ticket->site ? $ticket->site->site_type->site_type : '',
            $ticket->site ? $ticket->site->nombre : '',
            $ticket->site ? $ticket->site->classification_type->classification_type : '',
            $ticket->site ? $ticket->site->pop->comuna->zona->cod_zona : '',
            $ticket->site ? $ticket->site->pop->comuna->zona->crm->nombre_crm : '',
            $ticket->area ? $ticket->area->descripcion : '',
            $ticket->tecnica ? $ticket->tecnica->descripcion : '',
            $ticket->equipo ? $ticket->equipo->descripcion : '',

            $ticket->created_at ? $ticket->created_at->format('d-m-Y') : '',
            $ticket->fecha_compromiso ? $ticket->fecha_compromiso->format('d-m-Y') : '',
            $ticket->tipo_motivo ? $ticket->tipo_motivo->descripcion : '',
            $ticket->trimestre == 1 ? 'PRIMERA MANTENCIÓN' : ($ticket->trimestre == 2 ? ' SEGUNDA MANTENCIÓN' : ($ticket->trimestre == 3 ? 'TERCERA MANTENCÓN' : ($ticket->trimestre == 4 ? 'CUARTA MANTENCIÓN' : ($ticket->trimestre == 5 ? 'QUINTA MANTENCIÓN' : '')))),
            $ticket->descripcion,
            $ticket->fecha_curso,
            $ticket->fecha_validacion,
            $ticket->fecha_finalizada,
            $ticket->mantencion_energia,
            $ticket->mantencion_clima,
            $ticket->mantencion_ge,
            $ticket->cotizacion == 1 ? 'SI' : '',
            $ticket->pxq == 1 ? 'SI' : '',
            $ticket->informe_final == 1 ? 'SI' : '',
            $ticket->checklist == 1 ? 'SI' : '',
            $ticket->fotos_informe_fotografico == 1 ? 'SI' : '',
            $ticket->documento_denuncia == 1 ? 'SI' : '',
            $ticket->otros == 1 ? 'SI' : '',
            $ticket->ework,
            $ticket->inputacion ? $ticket->inputacion->descripcion :'',
            $ticket->nro_imputacion,
            $ticket->nro_tarea_office,

        ];
    }
    public function title(): string
    {
        return 'Detalle tickets';
    }

    public function headings(): array
    {
        return
            [
            'ID',
            'ESTADO',
            'CREADOR',
            'NEMONICO',
            'TECNOLOGIA',
            'TIPO SITIO',
            'NOMBRE',
            'CATEGORIA',
            'ZONA',
            'CRM',
            'ÁREA',
            'TÉCNICA',
            'EQUIPO',
            'FECHA CREACIÓN',
            'FECHA DE TERMINO',
            'MOTIVO',
            'NRO° MANTENCION',
            'DESCRIPCIÓN',
            'CAMBIO A EN CURSO',
            'CAMBIO A VALIDACÍON',
            'CAMBIO A FINALIZADA',
            'MANTENCION ENERGIA',
            'MANTENCION CLIMA',
            'MANTENCION GG.EE',
            'COTIZACIONES',
            'PXQ',
            'INFORME FINAL',
            'CHECKLIS',
            'FOTOS INFORME FOTOGRAFICO',
            'DOCUMENTOS DENUNCIA',
            'OTROS',
            'EWORK',
            'TIPO IMPUTACIÓN',
            'NRO IMPUTACIÓN',
            'TOT',

        ];
    }

}
