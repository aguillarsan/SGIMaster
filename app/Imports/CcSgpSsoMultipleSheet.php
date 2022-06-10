<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class CcSgpSsoMultipleSheet implements WithMultipleSheets
{
  
    public function sheets(): array
    {

        try {
            return [
                'CUMPLIMIENTO GLOBAL' => new CumplimientoGlobalImport(),

            ];
        } catch (\Exception $e) {
            return $e;
        }
 
    } 
}
