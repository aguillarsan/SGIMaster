<?php

namespace App\Exports\RendicionExport;

use App\Models\Surrender\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Illuminate\Support\Facades\Auth;

class PaymentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle, WithEvents, WithColumnFormatting
{
    use Exportable, RegistersEventListeners;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (Auth::user()->rol == 1 || Auth::user()->rol == 14) {
            $payment = Payment::with('user', 'site', 'project_manager', 'state',  'payment_tp','work_area')->get();
        } else {
            $payment = Payment::where('user_id', Auth::user()->id)->with('user', 'site', 'project_manager', 'state',  'payment_tp','work_area')->get();
        }

        return  $payment;
    }
    public function title(): string
    {
        return 'Rendiciones';
    }
    public function map($payment): array
    {
        return [
            $payment->id,
            $payment->site ? $payment->site->nem_site : '',
            $payment->site ? $payment->site->nombre : '',
            $payment->user ? $payment->user->fullname : '',
            $payment->work_area ? $payment->work_area->name : '',
            $payment->responsable_entel,
            $payment->project_manager ? $payment->project_manager->name_manager : '',
            $payment->pep ? $payment->pep : '',
            $payment->oc,
            $payment->payment_tp ?  str_replace(array('\'', '"'), '', trim($payment->payment_tp->pluck("tp"), '[]')) : '',
            $payment->monto_total,
        ];
    }
    public function headings(): array
    {
        return [
            'ID#',
            'SITIO',
            'NOMBRE SITIO',
            'CREADOR',
            'ÁREA DE TRABAJO',
            'RESPONSABLE ENTEL',
            'JEFE DE PROYECTO',
            'PEP',
            'OC',
            'TPS',
            'MONTO TOTAL',
        ];
    }
    public function columnFormats(): array
    {
        return [
            'K'  => NumberFormat::FORMAT_CURRENCY_USD,
        ];
    }
    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->styleCells(
            'A1',
            [
                'font' => [
                    'size' => 13,
                    // 'name' => 'Arial',
                    'bold' => true,
                    'italic' => false,
                    // 'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE,
                    'strikethrough' => false,
                    'color' => ['rgb' => 'FFFFFF']
                ],

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],
                'fill' => [
                    'fillType'  => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => '6BB83C']
                ]
            ]
        );
        $event->sheet->styleCells(
            'D1:K1',
            [
                'font' => [
                    'size' => 13,
                    // 'name' => 'Arial',
                    'bold' => true,
                    'italic' => false,
                    // 'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE,
                    'strikethrough' => false,
                    'color' => ['rgb' => 'FFFFFF']
                ],

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],
                'fill' => [
                    'fillType'  => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => '009EF7']
                ]
            ]
        );
        $event->sheet->styleCells(
            'B1:C1',
            [
                'font' => [
                    'size' => 13,
                    // 'name' => 'Arial',
                    'bold' => true,
                    'italic' => false,
                    // 'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE,
                    'strikethrough' => false,
                    'color' => ['rgb' => 'FFFFFF']
                ],

                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],
                'fill' => [
                    'fillType'  => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['rgb' => 'FFC700']
                ]
            ]
        );
    }
}
