<?php

namespace App\Exports;

use App\Solicitud_monto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
class SolicitudesMontosExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $monto = Solicitud_monto::get();
        return $monto;
    }

    public function map($monto): array
    {

        return [
            $monto->nuevassolicitud_id,
            $monto->monto_solicitado_porcentaje,
            $monto->monto_solicitado,
            $monto->monto_restante,
            $monto->created_at,
            $monto->estado == 2 ? 'APROBADO':($monto->estado == 1 ? 'PENDIENTE':'')
        ];

    }

    public function title(): string
    {
        return 'Liberaciones de pago';
    }

    public function headings(): array
    {

        return [
        'COD SOLICITUD',
        'PORCETAJE SOLICITADO',
        'MONTO EN CLP SOLICITADOS',
        'MONTO RESTANTE',
        'FECHA DE SOLICITUD',
        'ESTADO'
        ];
    }

    public function columnFormats(): array
    {
        return [
        	'C'  => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'D'  => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            
        ];
    }

}
