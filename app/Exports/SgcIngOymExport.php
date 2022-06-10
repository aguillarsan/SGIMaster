<?php

namespace App\Exports;

use App\SolicitudSgc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SgcIngOymExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;

    }

    public function collection()
    {

        $solicitud = SolicitudSgc::with([
            'user'                   => function ($query) {
                $query->select('id', 'apellido', 'name');
            },

            'site'                   => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'site.pop'               => function ($query) {
                $query->select('id', 'comuna_id');
            },
            'site.pop.comuna'        => function ($query) {
                $query->select('id', 'region_id');
            },
            'site.pop.comuna.region' => function ($query) {
                $query->select('id', 'sigla_region');
            },
            'proceso'                => function ($query) {
                $query->select('id', 'descripcion');
            },
            'subestado'              => function ($query) {
                $query->select('id', 'subestado');
            },
            'proveedor'              => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'           => function ($query) {
                $query->select('id', 'nombre_trabajo');
            },
            'area'                   => function ($query) {
                $query->select('id', 'area');
            },
            'tipo_moneda'            => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },

            'tipo_gasto'             => function ($query) {
                $query->select('id', 'nombre_gasto');
            },
            'contingencia'           => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'            => function ($query) {
                $query->select('id', 'descripcion');
            },
            'temp_sgc_pop'           => function ($query) {
                $query->select('id', 'nem_movil', 'nombre', 'direccion');
            },

        ])->buscar()->where('user_id', Auth::user()->id)
           
            ->orderBy('id', 'DESC')->get(['id', 'proceso_id', 'tipo_moneda_id', 'site_id', 'subestado_id', 'gestionador_id', 'fecha_creacion', 'fecha_ejecucion', 'proveedor_id', 'costos_activos', 'costos_servicios', 'activo_servicio', 'oc', 'ework', 'DAS', 'descripcion', 'cuenta_id', 'cod_sap', 'informefinal', 'guiadespacho', 'cotizacion', 'tipo_gasto_id', 'contingencia_id', 'tipo_boleta_id', 'boleta', 'proyecto_gpon', 'tipo_trabajo_id', 'ticket_id', 'fecha_cesta', 'area_id', 'created_at', 'temp_sgc_pop_id', 'nombre_sitio', 'direccion_sitio', 'cesta', 'user_id']);

        return $solicitud;
    }
    public function map($solicitud): array
    {
        return [
            $solicitud->id,
            $solicitud->site ? $solicitud->site->nem_site : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->nem_movil : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->nombre_sitio : '')),
            $solicitud->site ? $solicitud->site->nombre : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->direccion : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->direccion_sitio : '')),
            $solicitud->site ? $solicitud->site->pop->comuna->region->sigla_region : '',
            $solicitud->site ? $solicitud->site->site_type->site_type : '',
            $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',
            $solicitud->tipo_boleta ? $solicitud->tipo_boleta->descripcion : '',
            $solicitud->boleta,
            $solicitud->cesta,
            $solicitud->oc,
            $solicitud->DAS,
            $solicitud->ework,
            $solicitud->tipo_moneda->moneda,
            $solicitud->costos_activos != null && strpos($solicitud->costos_activos, ".") !== false ? number_format($solicitud->costos_activos, 2, ',', '.') : ($solicitud->costos_activos != null ? number_format($solicitud->costos_activos, 0, ',', '.') : ''),

            $solicitud->costos_servicios != null && strpos($solicitud->costos_servicios, ".") !== false ? number_format($solicitud->costos_servicios, 2, ',', '.') : ($solicitud->costos_servicios != null ? number_format($solicitud->costos_servicios, 0, ',', '.') : ''),
            $solicitud->user_id != null ? $solicitud->user->name : '' . ' ' . $solicitud->user_id != null ? $solicitud->user->apellido : '',
            $solicitud->created_at,
            $solicitud->descripcion,
            $solicitud->proceso->descripcion,
            $solicitud->subestado ? $solicitud->subestado->subestado : '',

        ];
    }
    public function headings(): array
    {
        return [
            'ID SOLICITUD',
            'SITIO',
            'DIRECCION',
            'REGION',
            'TECNOLOGIA',
            'PROVEEDOR',
            'TIPO BOLETA',
            'NRO BOLETA',
            'NRO CESTA',
            'OC',
            'NRO DAS',
            'NRO EWORK',
            'TIPO MONEDA',
            'COSTOS ACTIVOS',
            'COSTOS SERVICIOS',
            'SOLICITANTE',
            'FECHA_CREACION',
            'DESCRIPCION',
            'ESTADO',
            'SUBESTADO',

        ];
    }

}
