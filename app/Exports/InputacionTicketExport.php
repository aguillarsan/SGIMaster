<?php

namespace App\Exports;

use App\Inputacion_ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
 
class InputacionTicketExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {
        $inputacion = Inputacion_ticket::get();
         return view('export.inputacionTicket', compact('inputacion'));
    }
}
