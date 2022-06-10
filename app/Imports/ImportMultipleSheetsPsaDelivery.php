<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ImportMultipleSheetsPsaDelivery implements WithMultipleSheets
{
    /**
     * @param Collection $collection
     */


    
    public function sheets(): array 
    {
    
        try {
            return [
                'datos_despacho' => new SolicitudPsaDataDeliveryImport(),

            ];
        } catch (Exception $e) {
           return $e;
        }

    }
}
