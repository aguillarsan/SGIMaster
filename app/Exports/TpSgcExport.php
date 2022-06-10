<?php

namespace App\Exports;

use App\Tp;
use Maatwebsite\Excel\Concerns\FromCollection;

class TpSgcExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tp::all();
    }
}
