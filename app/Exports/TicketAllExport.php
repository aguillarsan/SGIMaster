<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TicketAllExport implements WithMultipleSheets, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable, RegistersEventListeners;

    public function sheets(): array
    {
        $sheets = [];
        // $sheets[] = new ResumeExport($this->request);

        
        $sheets[] = new TicketCrmExport();
        
        $sheets[] = new SgcTicketExport();
        return $sheets;
    }
}
