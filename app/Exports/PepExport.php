<?php

namespace App\Exports;

use App\crm_user;
use App\Peps;
use App\role_user;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PepExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $rol = role_user::where('user_id', Auth::user()->id)->first();

        $crm = crm_user::where('user_id', Auth::user()->id)->first();

        if ($rol->role_id == 1 || $rol->role_id == 16 || $rol->role_id == 8) {
            $pep = Peps::with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo','subestado')->get();

        } else {
            if (Auth::user()->id == 11) {
                $pep = Peps::filtroCrmSurAustral()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo','subestado')->get();

            } else {
                if (Auth::user()->id == 12) {
                    $pep = Peps::FiltroCrmCentroSurSur()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo','subestado')->get();

                } else {
                    if ($rol->role_id == 12) {

                        $pep = Peps::filtroCrm($crm->crm_id)->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo','subestado')->get();

                    }
                }
            }
        }
        return $pep;
    }

    public function map($pep): array
    {
        return [
            $pep->id,
            $pep->site ? $pep->site->nem_site : '',
            $pep->site ? $pep->site->pop->comuna->zona->crm->nombre_crm : '',
            $pep->tipo_pep ? $pep->tipo_pep->descripcion : '',
            $pep->flujo ? $pep->flujo->descripcion : '',
            $pep->ework,
            $pep->pep,
            $pep->ppto_sap,
            $pep->real_sap,
            $pep->comprometido_clp,
            $pep->activacion_pendiente,
            
            $pep->disponible_real,
            $pep->total_sgc_sin_oc,
            $pep->estado_id == 1 ? 'Pep aperturado':($pep->estado_id == 2 ? 'Enviado a cerrar':($pep->estado_id == 2 ? 'Pep cerrado':'') ),
            $pep->subestado? $pep->subestado->descripcion:'',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NEMONICO',
            'CRM',
            'TIPO DE PEP',
            'FLUJO',
            'EWORK',
            'PEP',
            'PPTO SAP',
            'REAL',
            'COMPROMETIDO CLP',
            'ACTIVACIÓN PENDIENTE',
            'DISPONIBLE REAL',
            'TOTAL SGC SIN OC',
            'ESTADO',
            'SUB ESTADO'

        ];
    }

    public function columnFormats(): array
    {
        return [
            'h' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'I' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'J' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'K' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'L' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'M' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,

        ];
    }

}
