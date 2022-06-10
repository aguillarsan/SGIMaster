<?php

namespace App\Imports;

use App\Models\ReportePep\Sap;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SapImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row['objeto']) {
            $sap_update = Sap::where('pep', $row['objeto'])->first();
            if ($sap_update) {
                $sap_update->pop = $row['pop'];
                $sap_update->estimate = $row['presupuesto'];
                $sap_update->real = floatval($row['real']);
                $sap_update->committed = floatval($row['comprometido']);
                $sap_update->plan_res_ord = floatval($row['planesresord']);
                $sap_update->disposed = floatval($row['dispuesto']);
                $sap_update->available = floatval($row['disponible']);
                $sap_update->save();
                return;
            } else {
                $sap = new Sap();
                $sap->pep = $row['objeto'];
                $sap->pop = $row['pop'];
                $sap->estimate = floatval($row['presupuesto']);
                $sap->real = floatval($row['real']);
                $sap->committed = floatval($row['comprometido']);
                $sap->plan_res_ord = floatval($row['planesresord']);
                $sap->disposed = floatval($row['dispuesto']);
                $sap->available = floatval($row['disponible']);
                $sap->save();
                return;
            }
        }
    }
}
