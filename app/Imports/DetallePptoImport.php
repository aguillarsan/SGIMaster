<?php

namespace App\Imports;

use App\Models\ReportePep\Detalle_ppto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DetallePptoImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['pep']) {
            $detalle_ppto_update = Detalle_ppto::where('pep', $row['pep'])->first();
            if ($detalle_ppto_update) {
                $detalle_ppto_update->bateria = floatval($row['bateria']);
                $detalle_ppto_update->q_baterias =$row['q_baterias'] ;
                $detalle_ppto_update->teams = floatval($row['teams']);
                $detalle_ppto_update->total_bodega = floatval($row['total_bodega']);
                $detalle_ppto_update->total_servicio = floatval($row['total_servicio']);
                $detalle_ppto_update->total_activacion = floatval($row['total_activacion']);
                $detalle_ppto_update->inversion_total_aperturada = floatval($row['inversion_total_aperturada']);
                $detalle_ppto_update->save();
                return;
            } else {
                $detalle_ppto = new Detalle_ppto();
                $detalle_ppto->pep = $row['pep'];
                $detalle_ppto->bateria = floatval($row['bateria']);
                $detalle_ppto->q_baterias =$row['q_baterias'] ;
                $detalle_ppto->teams = floatval($row['teams']);
                $detalle_ppto->total_bodega = floatval($row['total_bodega']);
                $detalle_ppto->total_servicio = floatval($row['total_servicio']);
                $detalle_ppto->total_activacion = floatval($row['total_activacion']);
                $detalle_ppto->inversion_total_aperturada = floatval($row['inversion_total_aperturada']);
                $detalle_ppto->save();
                return;
            }
        }
    }
}
