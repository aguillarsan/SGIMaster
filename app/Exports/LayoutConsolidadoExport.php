<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\ReportePep\Base_reporte;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class LayoutConsolidadoExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $select;
    protected $base;
    public function __construct($base,$select)
    {
        $this->select = $select;
        $this->base = $base;

    }
    public function collection()
    {
        
        $data = $this->base;
        
        return   $data;
    }

    public function headings(): array
    {
        return  $this->select;
    }
  
}
