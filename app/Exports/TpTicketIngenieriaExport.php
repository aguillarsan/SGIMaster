<?php

namespace App\Exports;

use App\Ticket_ingenieria_tp;
use App\Ticket_ingenieria;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TpTicketIngenieriaExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Ticket_ingenieria::with('ticket_ingenieria_tp.actividad', 'ticket_ingenieria_tp.supervisor', 'proveedor','ticket_ingenieria_tp.tipo_supervision','site','tipo_ticket')
            ->get();

        return $data;
    }

    public function map($data): array
    {
        return [
            $data->id,
            $data->site ? $data->site->nem_site:'',
            $data->site ? $data->site->nombre:'',
            $data->nombre_proyecto,
            $data->tipo_ticket ? $data->tipo_ticket->tipo:'',
            $data->ticket_ingenieria_tp ? str_replace(array('\'', '"'), '', trim($data->ticket_ingenieria_tp->pluck('tp'), '[]'))  : '',
            $data->ticket_ingenieria_tp ? str_replace(array('\'', '"'), '', trim($data->ticket_ingenieria_tp->pluck('fecha_ejecucion_tp'), '[]')) : '',
            $data->ticket_ingenieria_tp ? str_replace(array('\'', '"'), '', trim($data->ticket_ingenieria_tp->map(function ($tp) {
                return $tp->actividad->descripcion;
            }),'[]'))  : '',
            $data->ticket_ingenieria_tp ? str_replace(array('\'', '"'), '', trim($data->ticket_ingenieria_tp->map(function ($tp) {
                return $tp->tipo_supervision->tipo_supervision;
            }),'[]'))  : '',
            $data->ticket_ingenieria_tp ? str_replace(array('\'', '"'), '', trim($data->ticket_ingenieria_tp->map(function ($tp) {
                return $tp->supervisor->descripcion;
            }),'[]'))  : '',
            $data->user ? $data->user->fullname : '',
            $data->monto_lpu != null && strpos($data->monto_lpu, ".") !== false ? number_format($data->monto_lpu, 2, ',', '.') : ($data->monto_lpu != null ? number_format($data->monto_lpu, 0, ',', '.') : ''),
            $data->tipo_moneda ? $data->ticket_ingenieria->tipo_moneda->moneda : '',
            $data->proveedor ? $data->proveedor->PROVEEDOR : '',
            $data->cesta,
            $data->ework,
            $data->oc,
            $data->das,
            date("d/m/Y", strtotime($data->created_at)),
            $data->estado
        ];
    }

    public function headings(): array
    {
        return [
            'ID TICKET',
            'NEMONICO',
            'NOMBRE SITIO',
            'NOMBRE PROYECTO',
            'TIPO DE TICKET',
            'TP',
            'FECHA DE EJECUCIÓN',
            'ACTIVIDAD',
            'TIPO DE SUPERVISIÓN',
            'SUPERVISOR',
            'SOLICITANTE',
            'MONTO LPU',
            'TIPO DE MONEDA',
            'PROVEEDOR',
            'CESTA',
            'EWORK',
            'OC',
            'DAS',
            'FECHA DE CREACIÓN',
            'ESTADO',

        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,

        ];
    }
}
