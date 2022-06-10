<?php

namespace App\Imports;

use App\Models\Sgc\Cumplimiento_global;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Proveedor;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CumplimientoGlobalImport implements ToModel,WithStartRow
{
    public function startRow(): int
    {
        return 6;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        
        $proveedor = Proveedor::where('RUT_PROVEEDOR', $row[2])->first();
        if($proveedor){
            $cumplimiento = new Cumplimiento_global;
            $cumplimiento->proveedor_id = $proveedor->id; 
            $cumplimiento->etapa = $row[8];
            $cumplimiento->mes = $row[6]; 
            $cumplimiento->annio = $row[7]; 
            $cumplimiento->cumplimiento_legal_anual = round($row[9],2);
            $cumplimiento->cumplimineto_entel_anual = round($row[10],2); 
            $cumplimiento->cumplimiento_legal_mensual = round($row[11],2); 
            $cumplimiento->control_operacional = round($row[12],2);
            $cumplimiento->gestion_personas = round($row[13],2); 
            $cumplimiento->control_documental = round($row[14],2); 
            $cumplimiento->matriz_riesgos = round($row[15],2); 
            $cumplimiento->cumplimiento_plazo_entrega = round($row[16],2); 
            $cumplimiento->cumplimiento_global_mes = round($row[17],2);
            $cumplimiento->cumplimiento_id = $row[18] == 'BUENO' ? 1:($row[18] == 'SUFICIENTE' ? 2 : ($row[18] == 'INSUFICIENTE' ? 3:'')); 
            $cumplimiento->save();
            return;
        }
        return;
      

        
    }
}
