<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SgcIngAllExportSheets implements WithMultipleSheets, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable, RegistersEventListeners;
    public $request;

    public function __construct($request)
    {
         
        $this->request = $request;

    }
    public function sheets(): array
    {
        $sheets = [];
        // $sheets[] = new ResumeExport($this->request);

        
        $sheets[] = new IngenieriaExport($this->request);
        
       
        return $sheets;
    }
}
