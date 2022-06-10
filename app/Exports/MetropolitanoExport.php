<?php

namespace App\Exports;

use App\Ticket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 
use App\Helpers\Helper;
class MetropolitanoExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {


        $ticket = Ticket::where('estado_id','!=',5)->where('estado_id','!=',6)->where('estado_id','!=',7)->where('crm_id',3)

        ->orderBy('id', 'desc')

        ->get();

     

        
        return view('export.crm',compact('ticket'));

    }
}
