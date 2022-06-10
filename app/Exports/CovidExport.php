<?php

namespace App\Exports;

use App\Covid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView; 
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CovidExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        $covid = Covid::get();
        return view('export.covid',compact('covid'));
    }
}
