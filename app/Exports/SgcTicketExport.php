<?php

namespace App\Exports;

use App\SolicitudSgc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class SgcTicketExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $solicitud = SolicitudSgc::with('user','site','proceso','subestado','tipo_moneda','proveedor')->select('ticket_id', 'id', 'costos_activos', 'costos_servicios', 'proveedor_id', 'tipo_moneda_id', 'user_id', 'site_id', 'proceso_id', 'subestado_id')->where('ticket_id', '!=', null)->get();
        return $solicitud;
    }

    public function map($solicitud): array
    {
        return
            [
            $solicitud->ticket_id,
            $solicitud->id,
            $solicitud->costos_activos != 0 ? $solicitud->costos_activos * $solicitud->tipo_moneda->valor : ($solicitud->costos_servicios != 0 ? $solicitud->costos_servicios * $solicitud->tipo_moneda->valor : ($solicitud->activo_servicio != 0 ? $solicitud->activo_servicio * $solicitud->tipo_moneda->valor : '')),
            $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',
            $solicitud->user ? $solicitud->user->name . ' ' . $solicitud->user->apellido : '',
            $solicitud->site ? $solicitud->site->pop->comuna->zona->crm->nombre_crm : '',
            $solicitud->proceso ? $solicitud->proceso->descripcion : '',
            $solicitud->subestado ? $solicitud->subestado->subestado : '',
        ];
    }

    public function title(): string
    {
        return 'Tickets SGC';
    }

    public function headings(): array
    {
        return
            [
            'TICKET',
            'SGC',
            'COSTOS TOTALES',
            'PROVEEDOR',
            'CREADOR',
            'CRM',
            'ESTADO',
            'SUBESTADO'

        ];
    }

}
