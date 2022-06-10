<?php

namespace App\Exports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ResagoExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
        $ticket = Ticket::with('user', 'site.pop.comuna.zona.crm', 'estado', 'tipo_motivo')->select('site_id', 'activo_id', 'descripcion_activo', 'cod_sap', 'cantidad_activo', 'fecha_puesta_marcha', 'valor_estimado', 'pep_resago', 'ework', 'tipo_motivo_id')->where('tipo_motivo_id', 8)->get();

        return $ticket;
    }

    public function map($ticket): array
    {
        return
            [
            $ticket->site ? $ticket->site->nem_site : '',
            $ticket->site ? $ticket->site->nombre : '',
            $ticket->site ? $ticket->site->pop->comuna->nombre_comuna : '',
            $ticket->site ? $ticket->site->pop->comuna->region->nombre_region : '',
            $ticket->activo_id == 1 ? 'Equipo' : ($ticket->activo_id == 2 ? 'Material' : ''),
            $ticket->descripcion_activo,
            $ticket->cod_sap,
            $ticket->cantidad_activo,
            $ticket->fecha_puesta_marcha ,
            
            $ticket->valor_estimado,
            $ticket->pep_resago,
            $ticket->ework,

        ];
    }

    public function headings(): array
    {
        return
            [
            'Nemonico',
            'Nombre del sitio',
            'Comuna',
            'Región',
            'Equipo / Material',
            'Descripción equipo/material',
            'Código SAP del equipo',
            'Cantidad',
            'Fecha puesta en marcha',
            'valor estimado de compra',
            'PEP de puesta en marcha/origen',
            'Numero de ework al pep asociado',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,

        ];
    }
}
