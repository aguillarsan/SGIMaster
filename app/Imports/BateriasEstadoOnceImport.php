<?php

namespace App\Imports;

use App\Models\ReportePep\Baterias_estado_once;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class BateriasEstadoOnceImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {

        if ($row['objeto']) {
            $batery_state_o_update = Baterias_estado_once::where('pep', $row['objeto'])->first();
            if ($batery_state_o_update) {
                $batery_state_o_update->material = floatval($row['material']);
                $batery_state_o_update->descripcion_material = $row['texto_breve_de_material'];
                $batery_state_o_update->valor_mon_so_co = floatval($row['suma_val_mon']);
                $batery_state_o_update->sum_total_red = (int)$row['suma_de_cantidad_total_reg'];

                $batery_state_o_update->save();
                return;
            } else {
                $batery_state_o_ = new Baterias_estado_once();
                $batery_state_o_->pep = $row['objeto'];
                $batery_state_o_->material = floatval($row['material']);
                $batery_state_o_->descripcion_material = $row['texto_breve_de_material'];
                $batery_state_o_->valor_mon_so_co = floatval($row['suma_val_mon']);
                $batery_state_o_->sum_total_red = (int)$row['suma_de_cantidad_total_reg'];


                $batery_state_o_->save();
                return;
            }
        }
    }
}
