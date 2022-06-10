<?php

namespace App\Exports;

use App\Models\ReportePep\Base_reporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;

class BaseDataExport implements FromCollection, WithTitle,WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting, WithEvents
{
    use Exportable, RegistersEventListeners;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data  = Base_reporte::with('esfuerzo', 'rango','site.pop.comuna.zona.crm')->get();
        return $data;
    }

    public function title(): string
    {
        return 'Base reporte';
    }

    public function map($data): array
    {
        return [
            $data->pep,
            $data->inicio_extremo,
            $data->fin_extremo,
            $data->dias_vigencia,
            $data->annio,
            $data->mes,
            $data->mes_n,
            $data->ejecucion,
            $data->observacion,
            $data->estado_once,
            $data->cuenta_de_documento_compras,
            $data->ework_id ? 'data' : '',
            $data->ppto_sap == 0 ? 'X':'',
            $data->ework_id ? 'data' : '',
            $data->ework_id ? 'data' : '',
            $data->ework_id ? 'data' : '',
            $data->ework_id ? 'data' : '',
            $data->ework_id ? 'data' : '',
            $data->estado_dd_sap,
            $data->dif_ppto,
            $data->ppto_sap,
            '',
            '',
            '',
            $data->bateria,
            $data->q_bateria,
            $data->teams,
            $data->total_bodega,

            $data->total_servicio,
            $data->total_activacion,
            $data->inversion_total_aperturada,
            $data->esfuerzo ? $data->esfuerzo->esfuerzo : '',
            $data->activacion_pendiente,
            $data->rango ? $data->rango->rango : '',
            $data->servicios,
            $data->bodega,
            $data->real_sap,
            $data->comprometido,
            $data->activacion,
            $data->imp_mat ? $data->imp_mat .'%':'',
            $data->porcentaje_ao ?$data->porcentaje_ao.'%':'',
            $data->electrico_zona,
            $data->gestion_operacional,
            $data->team_energia,
            $data->gestion_legal,
            $data->team_occ,
            $data->baterias,
            $data->disponible,
            $data->total_validador,
            $data->total_validador_aprobar,
            $data->total_validador_rechazada,
            $data->total_control,
            $data->total_control_aprobar,
            $data->total_ingreso_oc,
            $data->total_ingreso_cesta,
            $data->total_autorizacion_oc,
            $data->total_jefe_area_aprobar,
            $data->total_ingeniero_oym,
            $data->total_informe_final_guia_despacho,
            $data->total_proveedor_por_facturar,
            $data->total_facturada,
            $data->site ? $data->site->nombre:'',
            $data->site ?  $data->site->pop->comuna->zona->crm->nombre_crm:''


        ];
    }

    public function headings(): array
    {
        return
            [
                'PEP',
                'INICIO EXTREMO',
                'FIN EXTREMO',
                'DÍAS DE VIGENCIA',
                'AÑO ',
                'MES TEXT',
                'MES ',
                'EJECUCIÓN',
                'OBSERVACIÓN DE CIERRE',
                'ESTADO 11',
                'OC SIN FACTURAR',
                'FLUJO',
                'DISMINUIDO',
                'NOMBRE EWORK',
                'NOMBRE ACTIVIDAD',
                'FECHA HABILITACION	',
                'UNIDAD EJECUTORA	',
                'USUARIO',
                'ESTATUS',
                'DIF PPTO',
                'PPTO EN SAP',
                'TIPO DE PEP',
                'J ALFARO',
                'EWORK',
                'BATERIA',
                'Q BATERIA',
                'TEAMS',
                'TOTAL BODEGA',
                'TOTAL SERVICIO	',
                'TOTAL ACTIVACION',
                'INVERSION TOTAL APERTURADA',
                'ESFUERZO',
                'ACTIVACIÓN PENDIENTE',
                'RANGO',
                'SERVICIOS',
                'BODEGA ',
                'REAL SAP',
                'COMPROMETIDO',
                'ACTIVACIÓN',
                '%IMPMAT',
                '%',
                'ELÉCTRICO ZONA',
                'GESTIÓN  OPERACIONAL',
                'TEAM ENERGÍA',
                'GESTIÓN LEGAL',
                'TEAM OCC',
                'BATERIAS ',
                'DISPONIBLE ',
                'TOTAL VALIDADOR',	
                'TOTAL VALIDADOR POR APROBAR',	
                'TOTAL VALIDADOR RECHAZADA',
                'TOTAL CONTROL',
                'TOTAL CONTROL APROBAR',
                'TOTAL INGRESO O/C',
                'TOTAL INGRESO CESTA',	
                'TOTAL AUTORIZACIÓN O/C',	
                'TOTAL JEFE ÁREA APROBAR',	
                'INGENIERO OYM',	
                'TOTAL INF.FINAL/GUIA DESPACHO',
                'TOTAL PROVEEDOR POR FACTURAR',
                'TOTAL FACTURADA',
                'SITIO',
                'CRM'				









            ];
    }
    public function columnFormats(): array
    {
        return [
            'T'  => NumberFormat::FORMAT_CURRENCY_USD,
            'U'  => NumberFormat::FORMAT_CURRENCY_USD,
            'Y'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AA'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AB'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AC'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AD'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AE'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AG'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AI'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AJ'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AK'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AL'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AM'  => NumberFormat::FORMAT_CURRENCY_USD,
            'AV'  => NumberFormat::FORMAT_CURRENCY_USD,

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
                    'color' => ['rgb' => 'BF8F00']
                ]
            ]
        );
        $event->sheet->styleCells(
            'S1',
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
                    'color' => ['rgb' => 'BF8F00']
                ]
            ]
        );
        $event->sheet->styleCells(
            'U1',
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
                    'color' => ['rgb' => 'BF8F00']
                ]
            ]
        );
        $event->sheet->styleCells(
            'AI1:AM1',
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
                    'color' => ['rgb' => 'BF8F00']
                ]
            ]
        );
        $event->sheet->styleCells(
            'D1:G1',
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
                    'color' => ['rgb' => '191919']
                ]
            ]
        );
        $event->sheet->styleCells( 
            'AN1:AV1',
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
                    'color' => ['rgb' => '191919']
                ]
            ]
        );
        $event->sheet->styleCells(
            'T1',
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
                    'color' => ['rgb' => '191919']
                ]
            ]
        );
        $event->sheet->styleCells(
            'AF1:AH1',
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
                    'color' => ['rgb' => '191919']
                ]
            ]
        );
        $event->sheet->styleCells(
            'H1:I1',
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
                    'color' => ['rgb' => '6c757d']
                ]
            ]
        );
        $event->sheet->styleCells(
            'V1:X1',
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
                    'color' => ['rgb' => '6c757d']
                ]
            ]
        );
        $event->sheet->styleCells(
            'J1:K1',
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
                    'color' => ['rgb' => 'C65911']
                ]
            ]
        );
        $event->sheet->styleCells(
            'Y1:AE1',
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
                    'color' => ['rgb' => 'C65911']
                ]
            ]
        );
        $event->sheet->styleCells(
            'L1:R1',
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
                    'color' => ['rgb' => '375623']
                ]
            ]
        );
        $event->sheet->styleCells(
            'AW1:BH1',
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
                    'color' => ['rgb' => 'FFD966']
                ]
            ]
        );
        $event->sheet->styleCells(
            'BI1:BJ1',
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
                    'color' => ['rgb' => 'BF8F00']
                ]
            ]
        );

        
    }
}
