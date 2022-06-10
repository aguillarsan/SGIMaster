<?php

namespace App\Exports;

use App\Solicitud_monto;
use Maatwebsite\Excel\Concerns\FromCollection;

class SolicitudMontoSgc implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Solicitud_monto::all();
    }
}
