<?php

namespace App\Imports;

use App\Models\ReportePep\Oc_sin_facturar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class OcSinFacturarImport implements ToModel,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row['elemento_pep']) {
            $oc_sin_facturar_update = Oc_sin_facturar::where('pep', $row['elemento_pep'])->first();
            if ($oc_sin_facturar_update) {
                $oc_sin_facturar_update->total_oc_sin_facturar = floatval($row['suma_de_oc_sin_facturar']);
                $oc_sin_facturar_update->cuenta_doc_compras = floatval($row['cuenta_de_documento_compras']);

                $oc_sin_facturar_update->save();
                return;
            } else {
                $oc_sin_facturar = new Oc_sin_facturar();
                $oc_sin_facturar->pep = $row['elemento_pep'];
                $oc_sin_facturar->total_oc_sin_facturar = floatval($row['suma_de_oc_sin_facturar']);
                $oc_sin_facturar->cuenta_doc_compras = floatval($row['cuenta_de_documento_compras']);


                $oc_sin_facturar->save();
                return;
            }
        }
    }
}
