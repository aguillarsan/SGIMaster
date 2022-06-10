<?php

namespace App\Exports;

use App\Tp;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
class TpsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;

    }
    public function collection()
    {
        $tp = Tp::select('nuevassolicitud_id','nro_tp')->get();
        return $tp;
    }

     public function map($tp): array
    {

        return [
            $tp->nuevassolicitud_id,
            $tp->nro_tp
        ];
    }
    public function title(): string
    {
        return 'Tps';
    }

     public function headings(): array
    {

        return [
            'COD SOLICITUD',
            'NRO° TP',
        ];
    }
}
