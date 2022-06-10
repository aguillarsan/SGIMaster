<?php

namespace App\Imports;

use App\Models\Sgc\Trabajadores_acreditado;
use App\Proveedor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class AcreditacionImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function startRow(): int
    {
        return 6;
    }

    // public function mapping(): array
    // {
    //     return [
    //         'division'  => 'B7'

    //     ];
    // }
    public function model(array $row)
    {
        $proveedor = Proveedor::where('RUT_PROVEEDOR', $row[4])->first();
     
        if ($proveedor) {
            $trabajador_exist = Trabajadores_acreditado::where('rut', $row[7])->first();
            if (!$trabajador_exist) {
                $full_name = explode( ',', $row[6] ) ;
                $trabajadores = new Trabajadores_acreditado;
                $trabajadores->proveedor_id =  $proveedor->id;
                $trabajadores->rut = $row[7];
                $trabajadores->activo = 1;
                $trabajadores->name = $full_name[1];
                $trabajadores->last_name = $full_name[0];
                $trabajadores->tipo_acreditacion_id = $row[15] == 'Acreditado' ? 1 : 2;
                $trabajadores->cargo = $row[8];
                $trabajadores->lugar_trabajo = $row[14];
                $trabajadores->restriccion = $row[21];
                $trabajadores->documentacion_pendiente_ac_provisoria = $row[18];
                $trabajadores->documentacion_pendiente_ac_indefinida = $row[19];
                $trabajadores->examenes_con_incumplimiento = $row[20];
                $trabajadores->fecha_vencimiento =   $row["16"] ? date("m-d-Y", $row[16]):null; 
                
                $trabajadores->save();
            } else {
                $full_name = explode( ',', $row[6] ) ;
                $trabajadores = $trabajador_exist;
                $trabajadores->proveedor_id =  $proveedor->id;
                $trabajadores->rut = $row[7];
                $trabajadores->name = $full_name[1];
                $trabajadores->last_name = $full_name[0];
                $trabajadores->tipo_acreditacion_id = $row[15] == 'Acreditado' ? 1 : 2;
                $trabajadores->cargo = $row[8];
                $trabajadores->lugar_trabajo = $row[14];
                $trabajadores->restriccion = $row[21];
                $trabajadores->documentacion_pendiente_ac_provisoria = $row[18];
                $trabajadores->documentacion_pendiente_ac_indefinida = $row[19];
                $trabajadores->examenes_con_incumplimiento = $row[20];
                $trabajadores->activo = 1;
                $trabajadores->fecha_vencimiento =  $row["16"] ?  date("m-d-Y", $row[16]):null;
                $trabajadores->save();
            }
        }
    }
}
