<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PsaImportMultipleSheet implements WithMultipleSheets
{
    public function sheets(): array
    {

        try {
            return [
                'formato_import_solicitudes' => new PsaSolicitudImport(),

            ];
        } catch (Exception $e) {
            return $e;
        }
 
    } 
}
