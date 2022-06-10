<?php

namespace App\Exports\RendicionExport;

use App\Models\Surrender\Payment_detail;
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
use App\Models\Surrender\Payment;

class PaymentDetailExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle, WithEvents, WithColumnFormatting
{
    use Exportable, RegistersEventListeners;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if (Auth::user()->rol == 1 || Auth::user()->rol == 14) {
            $payment_detail = Payment_detail::with('expense_type')->get();
        } else {
            $payment_detail = Payment_detail::whereIn('payment_id', Payment::where('user_id',Auth::user()->id)->pluck('id'))->with('expense_type')->get();
        }

        return $payment_detail;
    }
    public function title(): string
    {
        return 'Montos Declarados';
    }
    public function map($payment_detail): array
    {
        return [
            $payment_detail->payment_id,
            $payment_detail->expense_type ? $payment_detail->expense_type->expense_type : '',
            $payment_detail->amount
        ];
    }
    public function headings(): array
    {
        return [
            'ID RENDICIÓN',
            'TIPO DE GASTO',
            'MONTO',
        ];
    }
    public function columnFormats(): array
    {
        return [
            'C'  => NumberFormat::FORMAT_CURRENCY_USD,
        ];
    }
    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->styleCells(
            'A1:C1',
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
    }
}
