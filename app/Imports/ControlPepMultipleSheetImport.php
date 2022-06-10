<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ControlPepMultipleSheetImport implements WithMultipleSheets
{
    public function sheets(): array
    {

        try {
            return [
                'Resumen' => new PepImport(),

            ];
        } catch (Exception $e) {
            return $e;
        }

    }
}
