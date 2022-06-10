<?php

namespace App\Http\Controllers;

use App\Cargo_user;
use App\Permiso_rol;
use App\role_user;
use App\SolicitudSgc;
use App\Tipo_moneda;
use App\Tp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SgcShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rol = role_user::where('user_id', Auth::user()->id)->first(['role_id']);

        $cargos = Cargo_user::where('id_user', Auth::user()->id)->first();

        if ($cargos) {
            $cargo_id = $cargos->id_cargo;
        } else {
            $cargo_id = 0;
        }

        $this->calcularMonto($id);

        $solicitud = SolicitudSgc::where('id', $id)->with([
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
            'motivo_trabajo'  => function ($query) {
                $query->select('id', 'motivo');
            },

        ])
            ->get(['proceso_id', 'user_id', 'site_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'contingencia_id', 'subestado_id', 'area_id', 'descripcion', 'created_at', 'fecha_ejecucion', 'cod_sap', 'responsable_pago_id', 'solicitante_id', 'temp_sgc_pop_id', 'pm_proyecto_id', 'pm_interno_id', 'proyecto_gpon', 'boleta', 'cesta', 'oc', 'DAS', 'cotizacion', 'ework', 'cuenta_id', 'id', 'tipo_moneda_id', 'tipo_boleta_id', 'activo_servicio', 'gestionador_id', 'area_creadora_id', 'motivo_trabajo_id', 'nombre_proyecto_ing', 'trabajo_ejecutado_ing', 'tipo_pago_id', 'tipo_trabajo_id', 'tipo_trabajo_ingenieria_id', 'ticket_id', 'flujo_trabajo_id', 'solicitud_duplicada_id', 'informefinal', 'fecha_facturacion', 'guiadespacho', 'tipo_gasto_id', 'limite_monto']);

        $permisos = Permiso_rol::where('role_id', $rol->role_id)->get(['permission_id']);

        return view('sgc.show', compact('permisos', 'cargo_id', 'solicitud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetTp($id)
    {
        $tp = Tp::where('solicitud_sgc_id', $id)->get(['nro_tp']);
        return $tp;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calcularMonto($id)
    {
        $valor_uf = Tipo_moneda::where('id', 2)->first();
        $slc      = SolicitudSgc::find($id);

        if ($slc->limite_monto == null) {

            if ($slc->costos_servicios != 0) {
                if ($slc->tipo_moneda->id == 2) {
                    $valor_limite = $slc->costos_servicios;
                } else {
                    if ($slc->tipo_moneda->id == 1) {
                        $valor_limite = $slc->costos_servicios / $valor_uf->valor;
                    } else {
                        if ($slc->tipo_moneda->id == 3 || $slc->tipo_moneda->id == 4) {
                            $valor_limite = ($slc->costos_servicios * $slc->tipo_moneda->valor) / $valor_uf->valor;
                        }
                    }

                }
            } else {
                if ($slc->costos_activos != 0) {

                    if ($slc->tipo_moneda->id == 2) {
                        $valor_limite = $slc->costos_activos;
                    } else {
                        if ($slc->tipo_moneda->id == 1) {
                            $valor_limite = $slc->costos_activos / $valor_uf->valor;
                        } else {
                            if ($slc->tipo_moneda->id == 3 || $slc->tipo_moneda->id == 4) {
                                $valor_limite = ($slc->costos_activos * $slc->tipo_moneda->valor) / $valor_uf->valor;
                            }
                        }
                    }
                } else {
                    if ($slc->activo_servicio != 0) {

                        if ($slc->tipo_moneda->id == 2) {
                            $valor_limite = $slc->activo_servicio;
                        } else {
                            if ($slc->tipo_moneda->id == 1) {
                                $valor_limite = $slc->activo_servicio / $valor_uf->valor;
                            } else {
                                if ($slc->tipo_moneda->id == 3 || $slc->tipo_moneda->id == 4) {

                                    $valor_limite = ($slc->activo_servicio * $slc->tipo_moneda->valor) / $valor_uf->valor;
                                }
                            }
                        }

                    }
                }
            }
            if ($valor_limite > 50) {
                $slc->limite_monto = 1;
                $slc->save();
            } else {
                $slc->limite_monto = 2;
                $slc->save();
            }

        }
        return;
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
