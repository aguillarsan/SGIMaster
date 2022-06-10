<?php

namespace App\Exports;

use App\PsaSolicitud;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SolicitudExportPsa implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $solicitud = PsaSolicitud::where('estado_id', '!=', 7)->where('estado_id', '!=', 8)->with('site', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'activo', 'marca',
            'capacidad', 'almacen', 'user', 'negocio', 'codSap', 'prioridad','motivo')

            ->orderBy('id', 'desc')

            ->get(['id', 'oficina_id', 'site_id', 'activo_id', 'total_activo', 'banco', 'marca_id', 'capacidad_id', 'nro_pedido', 'pep_destino', 'pep_origen', 'lote', 'almacen_id', 'pedido_id', 'os', 'created_at', 'fecha_instalacion', 'fecha_estimada_instalacion', 'cantidad_recepcionada', 'user_id', 'negocio_id', 'cod_sap_id', 'prioridad_id', 'prioridad_solicitante', 'estado_id', 'subestado_id','ticket_id','ework','motivo_id','descripcion','flujo_simple']);

        return $solicitud;

    }

    public function map($solicitud): array
    {
        return [
            $solicitud->id,
            $solicitud->estado ? $solicitud->estado->descripcion : '',
            $solicitud->subestado ? $solicitud->subestado->descripcion : '',
            $solicitud->user ? $solicitud->user->name . ' ' . $solicitud->user->apellido : '',
            $solicitud->ticket_id,
            $solicitud->created_at != null ? $solicitud->created_at->format('d-m-Y') : 'SIN FECHA DE CREACIÓN',
            $solicitud->motivo ? $solicitud->motivo->descripcion : '',
            $solicitud->flujo_simple == 1 ? 'SI':(  $solicitud->flujo_simple == 2 ? 'NO':''),
            $solicitud->descripcion,
            $solicitud->prioridad_solicitante == 1 ? 'SI' : ($solicitud->prioridad_solicitante == 2 ? 'NO' : ''),
            $solicitud->prioridad ? $solicitud->prioridad->descripcion : '',
            $solicitud->site ? $solicitud->site->nem_site : '',
            $solicitud->site ? $solicitud->site->pop->comuna->region->nombre_region : '',
            $solicitud->site ? $solicitud->site->pop->comuna->nombre_comuna : '',
            $solicitud->site ? $solicitud->site->pop->comuna->zona->crm->nombre_crm : '',
            $solicitud->oficina ? $solicitud->oficina->nombre_predeterminado . ' ' . $solicitud->oficina->zona . ' ' . $solicitud->oficina->region : '',
            $solicitud->activo ? $solicitud->activo->descripcion : '',
            $solicitud->marca ? $solicitud->marca->descripcion : '',
            $solicitud->capacidad ? $solicitud->capacidad->descripcion : '',
            $solicitud->total_activo,
            $solicitud->banco,
            $solicitud->negocio ? $solicitud->negocio->descripcion : '',
            $solicitud->codSap ? $solicitud->codSap->descripcion : '',

            $solicitud->nro_pedido,
            $solicitud->pep_origen,
            $solicitud->pep_destino,
            $solicitud->lote,
            $solicitud->almacen ? $solicitud->almacen->descripcion : '',
            $solicitud->almacen ? $solicitud->almacen->cod_almacen : '',
            $solicitud->nro_pedido,
            $solicitud->pedido_id,
            $solicitud->os,
            $solicitud->ework,

            $solicitud->fecha_estimada_instalacion,
            $solicitud->cantidad_recepcionada,
            $solicitud->fecha_instalacion,

        ];

    }

    public function headings(): array
    {
        return [

            'ID',

            'PROCESO',

            'ESTADO',

            'SOLICITANTE',

            'NRO° TICKET',

            'FECHA DE CREACION',

            'MOTIVO',

            'FLUJO SIMPLE',

            'DESCRIPCION',

            'PRIORIDAD SOLICITANTE',

            'PRIORIDAD GESTIÓN',

            'NEMONICO',

            'REGION',

            'COMUNA',

            'CRM',

            'OFICINA ZONAL',

            'MATERIALES',

            'MARCA',

            'CAPACIDAD',

            'TOTAL UNIDAD',

            'CANTIDAD BANCOS',

            'NEGOCIO',

            'COD SAP',

            'SHAREPOINT',

            'PEP ORIGEN',

            'PEP DESTINO',

            'NRO LOTE',

            'ALMACEN',

            'CODIGO ALMACEN',

            'NRO DE RETIRO',

            'ID DEL RETIRO',

            'ORDEN DE SEVICIO',

            'EWORK',

            'FECHA ESTIMADA DE INSTALACION',

            'CANTIDAD DE MATERIAL RECIBIDO',

            'FECHA DE INSTALACION',

        ];
    }
}
