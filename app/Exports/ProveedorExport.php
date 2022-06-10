<?php

namespace App\Exports;

use App\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProveedorExport implements FromCollection,ShouldAutoSize, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $proveedor = Proveedor::get();
        return $proveedor;
    }
    public function map($proveedor): array
    {
        return [
            $proveedor->id,
            $proveedor->PROVEEDOR,
            $proveedor->RUT_PROVEEDOR,
            $proveedor->contacto,
            $proveedor->ACTIVO == 0 ? 'Inactivo' : 'Activo',
        ];
    }

    public function headings(): array
    {
        return [

            'ID',
            'NOMBRE PROVEEDOR',
            'RUT PROVEEDOR',
            'CONTACTO',
            'ESTADO',
        ];
    }
}
