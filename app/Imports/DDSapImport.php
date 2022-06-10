<?php

namespace App\Imports;

use App\Models\ReportePep\DD_SAP;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DDSapImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        /// TRANSFORMACIÓN DE FECHAS/// 

        if ($row['fin_extremo']) {
            $UNIX_DATE = ($row['fin_extremo'] - 25569) * 86400;

            $timestamp     = strtotime("+1 day", $UNIX_DATE);
            $fin_extremo = date("Y-m-d", $timestamp);
        } else {
            $fin_extremo = null;
        }
        if ($row['in_extremo']) {
            $UNIX_DATE = ($row['in_extremo'] - 25569) * 86400;

            $timestamp     = strtotime("+1 day", $UNIX_DATE);
            $inicio_extremo = date("Y-m-d", $timestamp);
        } else {
            $inicio_extremo = null;
        }

        ////////////////
        $dd_sap_update = DD_SAP::where('pep', $row['identificacion'])->first();
        if ($dd_sap_update) {
            $dd_sap_update->pop = $row['pop'];
            $dd_sap_update->date_extreme_start = $inicio_extremo;
            $dd_sap_update->date_extreme_finish = $fin_extremo;
            $dd_sap_update->estimate = floatval($row['presupuesto']);
            $dd_sap_update->responsible = $row['responsable'];
            $dd_sap_update->status = $row['status'];
            $dd_sap_update->save();
            return;
        } else {
            $dd_sap = new DD_SAP();
            $dd_sap->pep = $row['identificacion'];
            $dd_sap->pop = $row['pop'];
            $dd_sap->date_extreme_start = $inicio_extremo;
            $dd_sap->date_extreme_finish = $fin_extremo;
            $dd_sap->estimate = floatval($row['presupuesto']);
            $dd_sap->responsible = $row['responsable'];
            $dd_sap->status = $row['status'];
            $dd_sap->save();
            return;
        }
    }
}
