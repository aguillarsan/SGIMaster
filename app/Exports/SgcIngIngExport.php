<?php

namespace App\Exports;

use App\SolicitudSgc;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SgcIngIngExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
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
            'user'              => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'              => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'           => function ($query) {
                $query->select('id', 'descripcion');
            },
            'subestado'         => function ($query) {
                $query->select('id', 'subestado');
            },
            'proveedor'         => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'      => function ($query) {
                $query->select('id', 'nombre_trabajo');
            },
            'area'              => function ($query) {
                $query->select('id', 'area');
            },
            'tipo_moneda'       => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },
            'cuenta'            => function ($query) {
                $query->select('id', 'negocio', 'cuenta', 'descripcion');
            },
            'tipo_gasto'        => function ($query) {
                $query->select('id', 'nombre_gasto');
            },
            'contingencia'      => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'       => function ($query) {
                $query->select('id', 'descripcion');
            },
            'temp_sgc_pop'      => function ($query) {
                $query->select('id', 'nem_movil', 'nombre', 'direccion');
            },
            'tps'               => function ($query) {
                $query->select('solicitud_sgc_id', 'nro_tp');
            },
            'solicitud_montos'  => function ($query) {
                $query->select('solicitud_sgc_id', 'monto_solicitado_porcentaje', 'monto_solicitado');
            },
            'tipo_pago'         => function ($query) {
                $query->select('id', 'descripcion');
            },
            'tipo_equipamiento' => function ($query) {
                $query->select('id', 'nombre_equipamiento');
            },
            'tipo_servicio'     => function ($query) {
                $query->select('id', 'nombre_servicio');
            },
            'flujo_trabajo'     => function ($query) {
                $query->select('id', 'nombre_flujo');
            },
            'responsable_pago'  => function ($query) {
                $query->select('id', 'nombre');
            },
            'solicitante'       => function ($query) {
                $query->select('id', 'nombre_completo');
            },
            'pm_interno'        => function ($query) {
                $query->select('id', 'nombre_completo');
            },
            'pm_proyecto'       => function ($query) {
                $query->select('id', 'nombre_completo');
            },

        ])->where('area_creadora_id', '!=', null)->where('user_id', Auth::user()->id)->buscar()->orderBy('id', 'DESC')->get(['id', 'user_id', 'proceso_id', 'subestado_id', 'flujo_trabajo_id', 'site_id', 'tipo_boleta_id', 'boleta', 'responsable_pago_id', 'pm_proyecto_id', 'pm_interno_id', 'solicitante_id', 'proveedor_id', 'tipo_trabajo_ingenieria_id', 'descripcion', 'cod_sap', 'ework', 'cesta', 'fecha_cesta', 'activo_servicio', 'tipo_moneda_id', 'oc', 'fecha_emision_oc', 'emisor_oc_id', 'DAS', 'fecha_creacion', 'area_id', 'modo_trabajo_id', 'tipo_equipamiento_id', 'tipo_servicio_id', 'informefinal', 'guiadespacho', 'tipo_pago_id', 'fecha_ejecucion', 'proyecto_gpon', 'nro_cuota', 'fecha_pago_1', 'fecha_pago_2', 'fecha_pago_3', 'fecha_pago_4', 'fecha_pago_5', 'fecha_pago_6']);

        return $solicitud;
    }
    public function map($solicitud): array
    {

        return [
            $solicitud->id,
            $solicitud->proceso->descripcion,
            $solicitud->subestado->subestado,
            $solicitud->flujo_trabajo ? $solicitud->flujo_trabajo->nombre_flujo : '',
            $solicitud->site_id ? $solicitud->site->nem_site : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->nem_movil : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->nombre_sitio : '')),

            $solicitud->site ? $solicitud->site->nombre : '',
            $solicitud->tipo_boleta_id == 3 ? $solicitud->boleta : '',

            $solicitud->responsable_pago ? $solicitud->responsable_pago->nombre : '',
            $solicitud->pm_proyecto ? $solicitud->pm_proyecto->nombre_completo :'',
            $solicitud->pm_Interno ? $solicitud->pm_Interno->nombre_completo :'',
            $solicitud->solicitante ? $solicitud->solicitante->nombre_completo :'',
            $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',
            $solicitud->proveedor ? $solicitud->proveedor->RUT_PROVEEDOR : '',
            $solicitud->tipo_trabajo_ingenieria_id == 1 ? 'Licitación' : ($solicitud->tipo_trabajo_ingenieria_id == 2 ? 'Cotización' : ($solicitud->tipo_trabajo_ingenieria_id == 3 ? 'LPU' : ($solicitud->tipo_trabajo_ingenieria_id == 4 ? 'CPU' : ($solicitud->tipo_trabajo_ingenieria_id == 6 ? 'Sin asignar' : '')))),
            $solicitud->descripcion,
            $solicitud->cod_sap,

            $solicitud->ework,
            $solicitud->cesta,
            $solicitud->fecha_cesta,
            $solicitud->activo_servicio != null && strpos($solicitud->activo_servicio, ".") !== false ? number_format($solicitud->activo_servicio, 2, ',', '.') : ($solicitud->activo_servicio != null ? number_format($solicitud->activo_servicio, 0, ',', '.') : ''),
            $solicitud->tipo_moneda->moneda,
            $solicitud->oc,
            $solicitud->fecha_emision_oc,
            $solicitud->emisor_oc ? $solicitud->emisor_oc->nombre : '',

            $solicitud->DAS,
            $solicitud->tps->first() ? $solicitud->tps->pluck('nro_tp') : '',
            $solicitud->solicitud_montos->first() ? $solicitud->solicitud_montos->pluck('monto_solicitado_porcentaje') : '',
            $solicitud->solicitud_montos->first() ? $solicitud->solicitud_montos->pluck('monto_solicitado') : '',

            $solicitud->activo_servicio * $solicitud->tipo_moneda->valor,
            $solicitud->fecha_creacion,
            $solicitud->area ? $solicitud->area->area : '',
            $solicitud->modo_trabajo_id == 1 ? 'EQUIPAMIENTOS' : ($solicitud->modo_trabajo_id == 2 ? 'SERVICIOS' : ''),
            $solicitud->tipo_equipamiento ? $solicitud->tipo_equipamiento->nombre_equipamiento : ($solicitud->tipo_servicio ? $solicitud->tipo_servicio->nombre_servicio : ''),
            $solicitud->tipo_boleta ? $solicitud->tipo_boleta->TIPO_BOLETA : '',

            $solicitud->boleta,
            $solicitud->informefinal == 1 ? 'SI' : '',
            $solicitud->guiadespacho == 1 ? 'SI' : '',
            $solicitud->tipo_pago ? $solicitud->tipo_pago->descripcion : '',
            $solicitud->fecha_ejecucion ,
            $solicitud->proyecto_gpon == 1 ? 'SI' : '',
            $solicitud->nro_cuota != null ? $solicitud->nro_cuota : '',
            $solicitud->fecha_pago_1 != null ? $solicitud->fecha_pago_1 : '',
            $solicitud->fecha_pago_2 != null ? $solicitud->fecha_pago_2 : '',
            $solicitud->fecha_pago_3 != null ? $solicitud->fecha_pago_3 : '',
            $solicitud->fecha_pago_4 != null ? $solicitud->fecha_pago_4 : '',
            $solicitud->fecha_pago_5 != null ? $solicitud->fecha_pago_5 : '',
            $solicitud->fecha_pago_6 != null ? $solicitud->fecha_pago_6 : '',

        ];
    }

    public function headings(): array
    {

        return [

            'COD SOLICITUD',
            'ESTADO',
            'SUB-ESTADO',
            'FLUJO TRABAJO',
            'SITIO',
            'NOMBRE SITIO',
            'PEP',

            'SUB-GERENCIA',
            'PM POYECTO',
            'PM INTERNO',
            'SOLICITANTE',
            'PROVEEDOR',
            'RUT PROVEEDOR',
            'TIPO TRABAJO',
            'DESCRIPCION',
            'COD SAP',

            'EWORK',
            'CESTA',
            'FECHA INGRESO CESTA',
            'COSTOS TOTALES',
            'TIPO MONEDA',
            'OC',
            'FECHA CREACION OC',
            'EMISOR OC',
            'DAS',
            'TP',
            'AVANCE',
            'MONTO',

            'COSTOS TOTALES CPL',
            'FECHA CREACION',
            'ÁREA TRABAJO',
            'IDENTIFICACION TRABAJO',
            'EQUIPAMIENTO O SERVICIO',
            'TIPO BOLETA',
            'NRO BOLETA',
            'INFORMEFINAL',
            'GUIA DESPACHO',
            'TIPO PAGO',
            'FECHA_EJECUCION',
            'PROYECTO GPON',
            'Nro° DE CUOTAS',
            'FECHA DE PAGO 1',
            'FECHA DE PAGO 2',
            'FECHA DE PAGO 3',
            'FECHA DE PAGO 4',
            'FECHA DE PAGO 5',
            'FECHA DE PAGO 6',

        ];
    }

    /**
     * @return array
     */

}
