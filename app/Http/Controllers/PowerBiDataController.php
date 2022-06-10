<?php

namespace App\Http\Controllers;

use App\SolicitudSgc;
use Illuminate\Http\Request;

class PowerBiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = SolicitudSgc::filtroEstado()->where('proceso_id', 2)->with([
            'user'                     => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'                     => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id', 'classification_type_id', 'attention_type_id', 'category_type_id', 'bafi', 'olt_3play');
            },
            'site.pop'                 => function ($query) {
                $query->select('id', 'comuna_id');
            },
            'site.pop.comuna'          => function ($query) {
                $query->select('id', 'zona_id');
            },
            'site.pop.comuna.zona'     => function ($query) {
                $query->select('id', 'crm_id');
            },
            'site.pop.comuna.zona.crm' => function ($query) {
                $query->select('id', 'nombre_crm');
            },
            'proceso'                  => function ($query) {
                $query->select('id', 'descripcion', 'color');
            },
            'subestado'                => function ($query) {
                $query->select('id', 'subestado', 'color');
            },
            'proveedor'                => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'             => function ($query) {
                $query->select('id', 'nombre_trabajo');
            },
            'area'                     => function ($query) {
                $query->select('id', 'area');
            },
            'tipo_moneda'              => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },
            'cuenta'                   => function ($query) {
                $query->select('id', 'negocio', 'cuenta', 'descripcion');
            },
            'tipo_gasto'               => function ($query) {
                $query->select('id', 'nombre_gasto');
            },
            'contingencia'             => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'              => function ($query) {
                $query->select('id', 'descripcion');
            },
            'ticket'                   => function ($query) {
                $query->select('id', 'tipo_motivo_id');
            },
            'ticket.tipo_motivo'       => function ($query) {
                $query->select('id', 'descripcion');
            },
            'temp_sgc_pop'             => function ($query) {
                $query->select('id', 'nem_movil', 'nombre', 'direccion');
            },
            'job_ingenieria'           => function ($query) {
                $query->select('id', 'nombre_trabajo_ingenieria');
            },
            'flujo_trabajo'            => function ($query) {
                $query->select('id', 'nombre_flujo');
            },
            'responsable_pago'         => function ($query) {
                $query->select('id', 'nombre');
            },
            'pm_proyecto'              => function ($query) {
                $query->select('id', 'nombre_completo');
            },
            'pm_interno'               => function ($query) {
                $query->select('id', 'nombre_completo');
            },
            'solicitante'              => function ($query) {
                $query->select('id', 'nombre_completo');
            },
            'tipo_pago'                => function ($query) {
                $query->select('id', 'descripcion');
            },
            'motivo_trabajo'           => function ($query) {
                $query->select('id', 'motivo');
            },

        ])->orderby('id', 'desc')->get(['proceso_id', 'user_id', 'site_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'contingencia_id', 'subestado_id', 'area_id', 'descripcion', 'created_at', 'fecha_ejecucion', 'cod_sap', 'responsable_pago_id', 'solicitante_id', 'temp_sgc_pop_id', 'pm_proyecto_id', 'pm_interno_id', 'proyecto_gpon', 'boleta', 'cesta', 'oc', 'DAS', 'cotizacion', 'ework', 'cuenta_id', 'id', 'tipo_moneda_id', 'tipo_boleta_id', 'activo_servicio', 'gestionador_id', 'area_creadora_id', 'motivo_trabajo_id', 'nombre_proyecto_ing', 'trabajo_ejecutado_ing', 'tipo_pago_id', 'tipo_trabajo_id', 'tipo_trabajo_ingenieria_id', 'ticket_id', 'flujo_trabajo_id', 'solicitud_duplicada_id', 'informefinal', 'fecha_facturacion', 'guiadespacho', 'tipo_gasto_id', 'limite_monto']);

        foreach ($solicitudes as $solicitud) {

            $data[] = [
                'COD SOLICITUD'           => $solicitud->id,
                'NEMONICO'                => $solicitud->site ? $solicitud->site->nem_site : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->nem_movil : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->nombre_sitio : '')),
                'TECNOLOGIA'              => $solicitud->site ? $solicitud->site->site_type->site_type : '',
                'NOMBRE_SITIO'            => $solicitud->site ? $solicitud->site->nombre : ($solicitud->temp_sgc_pop ? $solicitud->temp_sgc_pop->direccion : ($solicitud->site_id == null && $solicitud->temp_sgc_pop_id == null ? $solicitud->direccion_sitio : '')),
                'ESTADO'                  => $solicitud->proceso ? $solicitud->proceso->descripcion : '',
                'SUB-ESTADO'              => $solicitud->subestado ? $solicitud->subestado->subestado : '',
                'GESTIONADOR'             => $solicitud->subestado_id == 14 ? $solicitud->gestionador_id : '',
                'FECHA_INGRESO'           => $solicitud->created_at,
                'ANIO INGRESO'            => $solicitud->created_at ? date("Y", strtotime($solicitud->created_at)) : '',
                'FECHA_EJECUCION'         => $solicitud->fecha_ejecucion ? date("d/m/Y", strtotime($solicitud->fecha_ejecucion)) : '',
                'ANIO EJECUCION'          => $solicitud->fecha_ejecucion ? date("Y", strtotime($solicitud->fecha_ejecucion)) : '',
                'USUARIO'                 => $solicitud->user ? $solicitud->user->name . ' ' . $solicitud->user->apellido : '',
                'TIPO DE TRABAJO'         => $solicitud->tipo_trabajo ? $solicitud->tipo_trabajo->nombre_trabajo : '',
                'PROVEEDOR'               => $solicitud->proveedor ? $solicitud->proveedor->PROVEEDOR : '',
                'RUT PROVEEDOR'           => $solicitud->proveedor ? $solicitud->proveedor->RUT_PROVEEDOR : '',

                'AREA_TRABAJO'            => $solicitud->area ? $solicitud->area->area : '',
                'CESTA'                   => $solicitud->cesta,
                'POSEE CESTA?'            => $solicitud->cesta ? 'SI' : 'NO',
                'COSTOS_ACTIVOS'          => $solicitud->costos_activos,
                'COSTOS_SERVICIOS'        => $solicitud->costos_servicios,
                'COSTOS_TOTALES'          => $solicitud->activo_servicio,
                'TIPO_MONEDA'             => $solicitud->tipo_moneda->moneda,
                'OC'                      => $solicitud->oc,
                'POSEE OC?'               => $solicitud->oc ? 'SI' : 'NO',
                'EWORK'                   => $solicitud->ework,
                'POSEE EWORK?'            => $solicitud->ework ? 'SI' : 'NO',
                'DAS'                     => $solicitud->DAS,
                'POSEE DAS?'              => $solicitud->DAS ? 'SI' : 'NO',

                'DESCRIPCION'             => $solicitud->descripcion,
                'SOCIEDAD'                => $solicitud->cuenta ? $solicitud->cuenta->negocio : '',
                'NOMBRE'                  => $solicitud->cuenta ? $solicitud->cuenta->descripcion : '',
                'COD_SAP'                 => $solicitud->cod_sap,
                'ARCHIVO_FINAL'           => $solicitud->informefinal,
                'GUIA_DESPACHO'           => $solicitud->guiadespacho,
                'POSEE GUIA DE DESPACHO?' => $solicitud->guiadespacho ? 'SI' : 'NO',
                'COTIZACION'              => $solicitud->cotizacion,
                'NUMERO CUENTA ASOCIADA'  => $solicitud->cuenta ? $solicitud->cuenta->cuenta : '',
                'FORMATO PAGO'            => $solicitud->tipo_gasto ? $solicitud->tipo_gasto->nombre_gasto : '',
                'NOMBRE CONTINGENCIA'     => $solicitud->contingencia ? $solicitud->contingencia->nombre_contingencia : '',
                'TIPO BOLETA'             => $solicitud->tipo_boleta ? $solicitud->tipo_boleta->descripcion : '',
                'NRO BOLETA'              => $solicitud->boleta,
                'POSEE PEP?'              => $solicitud->tipo_boleta_id == 3 && $solicitud->boleta != null ? 'SI' : 'NO',
                'INFORME FINAL'           => $solicitud->informefinal == 1 ? 'SI' : '',
                'POSEE INFORME FINAL?'    => $solicitud->informefinal == 1 ? 'SI' : 'NO',
                'GUIA DESPACHO'           => $solicitud->guiadespacho == 1 ? 'SI' : '',
                'RESPONSABLE PAGO'        => $solicitud->responsable_pago ? $solicitud->responsable_pago->nombre : '',
                'COSTOS TOTALES EN CLP'   => $solicitud->costos_activos != 0 ? $solicitud->costos_activos * $solicitud->tipo_moneda->valor : ($solicitud->costos_servicios != 0 ? $solicitud->costos_servicios * $solicitud->tipo_moneda->valor : ($solicitud->activo_servicio != 0 ? $solicitud->activo_servicio * $solicitud->tipo_moneda->valor : '')),
                'PROYECTO GPON'           => $solicitud->proyecto_gpon == 1 ? 'SI' : '',
                'TICKET ID'               => $solicitud->ticket_id != null ? $solicitud->ticket_id : '',
                'POSEE TICKET?'           => $solicitud->ticket_id ? 'SI' : 'NO',
                'FECHA INGRESO CESTA'     => $solicitud->fecha_ingreso_cesta ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_cesta)) : '',
                'FECHA INGRESO OC'        => $solicitud->fecha_ingreso_oc ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_oc)) : '',
                'FECHA INGRESO DAS'       => $solicitud->fecha_ingreso_das ? date("d/m/Y", strtotime($solicitud->fecha_ingreso_das)) : '',
                'MOTIVO'                  => $solicitud->ticket ? $solicitud->ticket->tipo_motivo->descripcion : '',
                'FECHA FACTURACION'       => $solicitud->fecha_facturacion,
            ];
        }

        return ($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
