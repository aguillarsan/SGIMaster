<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BateriasEstadoOnceMultipleSheet implements WithMultipleSheets,WithStartRow
{
    public function startRow(): int
    {
        return 4;
    }
    public function sheets(): array
    {

        try {
            return [
                'Hoja1' => new BateriasEstadoOnceImport(),

            ];
        } catch (Exception $e) {
            return $e;
        }
 
    } 
}
