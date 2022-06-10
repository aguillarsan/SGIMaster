<?php

namespace App\Exports\RendicionExport;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\RendicionExport\PaymentExport;
use App\Exports\RendicionExport\PaymentDetailExport;

class Rendiciones implements WithMultipleSheets, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable, RegistersEventListeners;

    public function __construct()
    {
         
        

    }
    public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new PaymentExport();
        $sheets[] = new PaymentDetailExport();
       
        
       
        return $sheets;
    }
}