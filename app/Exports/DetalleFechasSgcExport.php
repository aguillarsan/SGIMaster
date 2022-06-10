<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class DetalleFechasSgcExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = \DB::connection('sgc')->select('CALL proc_users_detalle_data_cesta_oc_das');
     
        return collect($data);
    }

    public function map($data): array
    {

        return [
            $data->solicitud_id,
            $data->usuario_cesta ? $data->usuario_cesta:'',
            $data->fecha_ingreso_cesta ? date("d/m/Y", strtotime($data->fecha_ingreso_cesta)) : '',
            $data->Total_dias_ingreso_cesta,
            $data->usuario_OC ? $data->usuario_OC :'',
            $data->fecha_ingreso_oc ? date("d/m/Y", strtotime($data->fecha_ingreso_oc)) : '',
            $data->Total_dias_ingreso_oc,
            $data->usuario_DAS ? $data->usuario_DAS:'',
            $data->fecha_ingreso_das ? date("d/m/Y", strtotime($data->fecha_ingreso_das)) : '',
            $data->Total_dias_ingreso_das,
            $data->fecha_creacion_sgc

        ];
    }

    public function headings(): array
    {
        return [
        	'COD SOLICITUD',
        	'NOMBRE USUARIO INGRESO CESTA',
        	'FECHA INGRESO CESTA',
        	'TOTAL DÍAS INGRESO CESTA',
        	'NOMBRE USUARIO INGRESO OC',
        	'FECHA INGRESO OC',
        	'TOTAL DÍAS INGRESO OC',
        	'NOMBRE USUARIO INGRESO DAS',
        	'FECHA INGRESO DAS',
        	'TOTAL DÍAS INGRESO DAS',
        	'FECHA CREACIÓN DE SGC'

        ];
    }
}
