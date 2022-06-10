<?php

namespace App\Imports;

use App\Flujos;
use App\Peps;
use App\Site;
use App\Tipo_Pep;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PepImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {

        try {

            if ($row['fecha_de_termino_sap']) {
                $UNIX_DATE = ($row['fecha_de_termino_sap'] - 25569) * 86400;
                //$timestamp = PHPExcel_Shared_Date::ExcelToPHP($row['fecha_de_termino_sap']);
                $timestamp     = strtotime("+1 day", $UNIX_DATE);
                $fecha_termino = date("Y-m-d", $timestamp);

            } else {
                $fecha_termino = null;
            }

            if ($row['fecha_de_inicio']) {
                $UNIX_DATE = ($row['fecha_de_inicio'] - 25569) * 86400;
                //$timestamp = PHPExcel_Shared_Date::ExcelToPHP($row['fecha_de_termino_sap']);
                $timestamp    = strtotime("+1 day", $UNIX_DATE);
                $fecha_inicio = date("Y-m-d", $timestamp);
            } else {
                $fecha_inicio = null;
            }

            $sites    = Site::where('nem_site', '=', $row['nemonico'])->first();
            $tipo_pep = Tipo_Pep::where('descripcion', '=', $row['tipo_de_pep'])->first();
            $pep      = Peps::where('pep', $row['pep'])->first();
            $flujo    = Flujos::where('descripcion', $row['flujo'])->first();
            if ($pep) {
                $pep->pep     = $row['pep'];
                $pep->site_id = $sites ? $sites->id : null;

                $pep->ework                = $row['ework'];
                $pep->tipo_pep_id          = $tipo_pep ? $tipo_pep->id : null;
                $pep->flujo_id             = $flujo ? $flujo->id : null;
                $pep->ppto_sap             = $row['ppto_sap'];
                $pep->real_sap             = $row['real'];
                $pep->comprometido_clp     = $row['comprometido_clp'];
                $pep->activacion_pendiente = $row['activacion_pendiente'];
                $pep->disponible_real      = $row['disponible_real'];
                $pep->fecha_termino_sap    = $fecha_termino;
                $pep->fecha_inicio_sap     = $fecha_inicio;
                $pep->save();

            } else {

                $pep                       = new Peps;
                $pep->pep                  = $row['pep'];
                $pep->site_id              = $sites ? $sites->id : null;
                $pep->estado_id            = 1;
                $pep->ework                = $row['ework'];
                $pep->flujo_id             = $flujo ? $flujo->id : null;
                $pep->tipo_pep_id          = $tipo_pep ? $tipo_pep->id : null;
                $pep->ppto_sap             = $row['ppto_sap'];
                $pep->real_sap             = $row['real'];
                $pep->comprometido_clp     = $row['comprometido_clp'];
                $pep->activacion_pendiente = $row['activacion_pendiente'];
                $pep->disponible_real      = $row['disponible_real'];

                $pep->fecha_termino_sap = $fecha_termino;
                $pep->fecha_inicio_sap  = $fecha_inicio;
                $pep->save();

            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
