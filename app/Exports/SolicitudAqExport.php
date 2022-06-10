<?php

namespace App\Exports;

use App\SolicitudSgc;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SolicitudAqExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $solicitud = SolicitudSgc::buscar()->with([
            'user'      => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'      => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },

            'subestado' => function ($query) {
                $query->select('id', 'subestado');
            },
            'proveedor' => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },

        ])
            ->orderBy('id', 'DESC')
            ->get(['id', 'user_id', 'site_id', 'subestado_id', 'proveedor_id', 'oc', 'informefinal', 'guiadespacho', 'boleta']);

        return $solicitud;
    }

    public function map($solicitud): array
    {
        return [
            $solicitud->oc,
            $solicitud->id,
            $solicitud->informefinal == 1 ? 'SI' : '',
            $solicitud->guiadespacho == 1 ? 'SI' : '',
            $solicitud->subestado ? $solicitud->subestado->subestado : '',
            $solicitud->site ? $solicitud->site->nem_site : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->nem_movil : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->nombre_sitio : '')),
            $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',

            $solicitud->user ? $solicitud->user->name . ' ' . $solicitud->user->apellido : '',

            $solicitud->boleta,

        ];
    }

       public function headings(): array
    {
        return [
        	'OC',
            'COD SOLICITUD',
            'INFORME FINAL',
            'GUIA DESPACHO',
            'SUB-ESTADO',
            'NEMONICO',
            'PROVEEDOR',
            'USUARIO',
            'BOLETA'
            
        ];
    }
}
