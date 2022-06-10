<?php

namespace App\Imports;

use App\Models\ReportePep\Sap_opening_reports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SapOpeningReportsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $sap_opening_update = Sap_opening_reports::where('pep', $row['etiquetas_de_fila'])->first();
        if ($sap_opening_update) {
            $sap_opening_update->store = floatval($row['bodega']);
            $sap_opening_update->services = floatval($row['servicios']);
            $sap_opening_update->activation = floatval($row['activacion']);
            $sap_opening_update->total_general = floatval($row['total_general']);
            $sap_opening_update->q_batery = floatval($row['q_baterias']);
            $sap_opening_update->save();
            return;
        } else {
            $sap_opening = new Sap_opening_reports();
            $sap_opening->pep = $row['etiquetas_de_fila'];
            $sap_opening->store = floatval($row['bodega']);
            $sap_opening->services = floatval($row['servicios']);
            $sap_opening->activation = floatval($row['activacion']);
            $sap_opening->total_general = floatval($row['total_general']);
            $sap_opening->q_batery = floatval($row['q_baterias']);
            $sap_opening->save();
            return;
        }
    }
}
