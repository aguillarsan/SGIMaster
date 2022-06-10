<?php

namespace App\Exports;

use App\SolicitudSgc;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat; 

class SgcAllExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
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

        $solicitud = SolicitudSgc::buscar()->with([
            'user'               => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'               => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'            => function ($query) {
                $query->select('id', 'descripcion');
            },
            'subestado'          => function ($query) {
                $query->select('id', 'subestado');
            },
            'proveedor'          => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'       => function ($query) {
                $query->select('id', 'nombre_trabajo');
            },
            'area'               => function ($query) {
                $query->select('id', 'area');
            },
            'tipo_moneda'        => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },
            'cuenta'             => function ($query) {
                $query->select('id', 'negocio', 'cuenta', 'descripcion');
            },
            'tipo_gasto'         => function ($query) {
                $query->select('id', 'nombre_gasto');
            },
            'contingencia'       => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'        => function ($query) {
                $query->select('id', 'descripcion');
            },
            'temp_sgc_pop'       => function ($query) {
                $query->select('id', 'nem_movil', 'nombre', 'direccion');
            },
            'responsable_pago'   => function ($query) {
                $query->select('id', 'nombre');
            },
            'ticket'             => function ($query) {
                $query->select('id', 'tipo_motivo_id');
            },
            'ticket.tipo_motivo' => function ($query) {
                $query->select('id', 'descripcion');
            },

        ])
            ->orderBy('id', 'DESC')
            ->get(['id', 'proceso_id', 'user_id', 'tipo_moneda_id', 'site_id', 'subestado_id', 'gestionador_id', 'fecha_creacion', 'fecha_ejecucion', 'proveedor_id', 'costos_activos', 'costos_servicios', 'activo_servicio', 'oc', 'ework', 'DAS', 'descripcion', 'cuenta_id', 'cod_sap', 'informefinal', 'guiadespacho', 'cotizacion', 'tipo_gasto_id', 'contingencia_id', 'tipo_boleta_id', 'boleta', 'proyecto_gpon', 'tipo_trabajo_id', 'ticket_id', 'fecha_cesta', 'area_id', 'created_at', 'temp_sgc_pop_id', 'nombre_sitio', 'direccion_sitio', 'gestionador_id', 'responsable_pago_id', 'cesta', 'fecha_facturacion', 'fecha_ingreso_cesta', 'fecha_ingreso_oc', 'fecha_ingreso_das']);

        return $solicitud;
    }

    public function map($solicitud): array
    {
        return [
            $solicitud->id,
            $solicitud->site ? $solicitud->site->nem_site : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->nem_movil : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->nombre_sitio : '')),

            $solicitud->site ? $solicitud->site->site_type->site_type : '',

            $solicitud->site ? $solicitud->site->nombre : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->direccion : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->direccion_sitio : '')),

            $solicitud->proceso ? $solicitud->proceso->descripcion :'',
            $solicitud->subestado ? $solicitud->subestado->subestado : '',
            $solicitud->subestado_id == 14 ? $solicitud->gestionador_id : '',
            $solicitud->created_at,
            $solicitud->fecha_ejecucion ? date("d/m/Y", strtotime($solicitud->fecha_ejecucion)) : '',
            $solicitud->user ? $solicitud->user->name . ' ' . $solicitud->user->apellido : '',
            $solicitud->tipo_trabajo ? $solicitud->tipo_trabajo->nombre_trabajo : '',
            $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',
            $solicitud->proveedor ? $solicitud->proveedor->RUT_PROVEEDOR : '',

            $solicitud->area ? $solicitud->area->area : '',
            $solicitud->cesta,
            $solicitud->costos_activos,

            $solicitud->costos_servicios,

            $solicitud->activo_servicio,

            $solicitud->tipo_moneda ? $solicitud->tipo_moneda->moneda:'',
            $solicitud->oc,
            $solicitud->ework,
            $solicitud->DAS,

            $solicitud->descripcion,
            $solicitud->cuenta ? $solicitud->cuenta->negocio : '',
            $solicitud->cuenta ? $solicitud->cuenta->descripcion : '',
            $solicitud->cod_sap,
            $solicitud->informefinal,
            $solicitud->guiadespacho,
            $solicitud->cotizacion,
            $solicitud->cuenta ? $solicitud->cuenta->cuenta : '',
            $solicitud->tipo_gasto ? $solicitud->tipo_gasto->nombre_gasto : '',
            $solicitud->contingencia ? $solicitud->contingencia->nombre_contingencia : '',
            $solicitud->tipo_boleta ? $solicitud->tipo_boleta->descripcion : '',
            $solicitud->boleta,
            $solicitud->informefinal == 1 ? 'SI' : '',
            $solicitud->guiadespacho == 1 ? 'SI' : '',
            $solicitud->responsable_pago ? $solicitud->responsable_pago->nombre : '',

            $solicitud->costos_activos != 0 ? $solicitud->costos_activos * $solicitud->tipo_moneda->valor : ($solicitud->costos_servicios != 0 ? $solicitud->costos_servicios * $solicitud->tipo_moneda->valor : ($solicitud->activo_servicio != 0 ? $solicitud->activo_servicio * $solicitud->tipo_moneda->valor : '')),
            $solicitud->proyecto_gpon == 1 ? 'SI' : '',

            $solicitud->ticket_id != null ? $solicitud->ticket_id : '',
            $solicitud->fecha_ingreso_cesta ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_cesta)) : '',
            $solicitud->fecha_ingreso_oc ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_oc)) : '',
            $solicitud->fecha_ingreso_das ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_das)) : '',
            $solicitud->ticket ? $solicitud->ticket->tipo_motivo->descripcion : '',
            $solicitud->fecha_facturacion,

        ];
    }
    public function headings(): array
    {
        return [
            'COD SOLICITUD',
            'NEMMONICO',

            'TECNOLOGIA',
            'NOMBRE_SITIO',
            'ESTADO',
            'SUB-ESTADO',
            'GESTIONADOR',
            'FECHA_INGRESO',
            'FECHA_EJECUCION',
            'USUARIO',
            'TIPO DE TRABAJO',
            'PROVEEDOR',
            'RUT PROVEEDOR',

            'AREA_TRABAJO',
            'CESTA',

            'COSTOS_ACTIVOS',
            'COSTOS_SERVICIOS',
            'COSTOS_TOTALES',
            'TIPO_MONEDA',
            'OC',
            'EWORK',
            'DAS',

            'DESCRIPCION',
            'SOCIEDAD',
            'NOMBRE',
            'COD_SAP',
            'ARCHIVO_FINAL',
            'GUIA_DESPACHO',
            'COTIZACION',
            'NUMERO CUENTA ASOCIADA',
            'FORMATO PAGO',
            'NOMBRE CONTINGENCIA',
            'TIPO BOLETA',
            'NRO BOLETA',
            'INFORME FINAL',
            'GUIA DESPACHO',
            'RESPONSABLE PAGO',
            'COSTOS TOTALES EN CLP',
            'PROYECTO GPON',
            'TICKET ID',
            'FECHA INGRESO CESTA',
            'FECHA INGRESO OC',
            'FECHA INGRESO DAS',
            'MOTIVO',
            'FECHA FACTURACION',

        ];
    }

    public function columnFormats(): array
    {
        return [
            'P'  => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'Q'  => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,
            'R'  => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,

            'AL' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE,

        ];
    }

}
