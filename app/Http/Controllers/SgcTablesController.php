<?php

namespace App\Http\Controllers;

use App\Acces_user_module;
use App\Cargo_user;
use App\crm_user;
use App\InteresadoSolicitud;
use App\Permiso_rol;
use App\role_user;
use App\SgcProceso;
use App\SgcSubproceso;
use App\SolicitudSgc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SgcTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function index()
    {
        $rolUser = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        $rol = $rolUser[0]['role_id'];

        if (Cargo_user::where('id_user', Auth::user()->id)->count() != 0) {
            $cargos   = Cargo_user::where('id_user', Auth::user()->id)->get(['id_cargo']);
            $cargo_id = $cargos[0]['id_cargo'];

        } else {
            if (Cargo_user::where('id_user', Auth::user()->id)->count() == 0) {
                $cargo_id = 0;
            }
        }

        if ($permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 144)->count(['id']) != 0) {
            Acces_user_module::create([
                'user_id'   => Auth::user()->id,
                'modulo_id' => 2,

            ]);
            return view('sgc.index', compact('rol', 'cargo_id'));
        } else {
            return view('errores.403');
        }

    }
    public function GetProcesos()
    {

        return SgcProceso::get();
    }

    public function GetSubProcesos()
    {

        return SgcSubproceso::get();
    }


  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataSolicitud($id)
    {
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
            ->get(['proceso_id', 'user_id', 'site_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'contingencia_id', 'subestado_id', 'area_id', 'descripcion', 'created_at', 'fecha_ejecucion', 'cod_sap', 'responsable_pago_id', 'solicitante_id', 'temp_sgc_pop_id', 'pm_proyecto_id', 'pm_interno_id', 'proyecto_gpon', 'boleta', 'cesta', 'oc', 'DAS', 'cotizacion', 'ework', 'cuenta_id', 'id', 'tipo_moneda_id', 'tipo_boleta_id', 'activo_servicio', 'gestionador_id', 'area_creadora_id', 'motivo_trabajo_id', 'nombre_proyecto_ing', 'trabajo_ejecutado_ing', 'tipo_pago_id','tipo_trabajo_id','tipo_trabajo_ingenieria_id','ticket_id','flujo_trabajo_id','solicitud_duplicada_id','informefinal','fecha_facturacion','guiadespacho','tipo_gasto_id','limite_monto']);

        return $solicitud;
    }
    public function GetSolicitudesSgc(Request $request)
    {

        if ($request->modulo == 1) {
            return $this->UserRequestCreated($request);
        } else {
            if ($request->modulo == 2) {
                return $this->UserRequestValidation($request);
            } else {
                if ($request->modulo == 3) {
                    return $this->UserRequestRejected($request);
                } else {
                    if ($request->modulo == 4) {
                        return $this->UserRequestPendingFinalReport($request);
                    } else {
                        if ($request->modulo == 5) {
                            return $this->RequestsInControl($request);
                        } else {
                            if ($request->modulo == 6) {
                                return $this->RequestsForControlApproval($request);
                            } else {
                                if ($request->modulo == 7) {
                                    return $this->ControlRejectedRequests($request);
                                } else {
                                    if ($request->modulo == 8) {
                                        return $this->ActiveRequestsOymControl($request);

                                    } else {
                                        if ($request->modulo == 9) {
                                            return $this->EngineerCreatedRequests($request);

                                        } else {
                                            if ($request->modulo == 10) {
                                                return $this->RejectedEngineerRequests($request);

                                            } else {
                                                if ($request->modulo == 12) {
                                                    return $this->LinkedProjects();
                                                } else {
                                                    if ($request->modulo == 13) {
                                                        return $this->EngineeringActiveRequest($request);

                                                    } else {
                                                        if ($request->modulo == 15) {
                                                            return $this->EngineeringInactiveRequest($request);

                                                        } else {
                                                            if ($request->modulo == 16) {
                                                                return $this->RequestToApprovePmo($request);

                                                            } else {
                                                                if ($request->modulo == 18) {
                                                                    return $this->RequestActivePmo($request);

                                                                } else {
                                                                    if ($request->modulo == 19) {
                                                                        return $this->RequestToApproveValidator($request);

                                                                    } else {
                                                                        if ($request->modulo == 20) {
                                                                            return $this->RejectedRequestValidator($request);

                                                                        } else {
                                                                            if ($request->modulo == 21) {
                                                                                return $this->RequestsApprovedAreaChief($request);

                                                                            } else {
                                                                                if ($request->modulo == 22) {
                                                                                    return $this->RequestsRejectedAreaChief($request);

                                                                                } else {
                                                                                    if ($request->modulo == 23 || $request->modulo == 50) {

                                                                                        return $this->OymRequestHistory($request);

                                                                                    } else {
                                                                                        if ($request->modulo == 24) {
                                                                                            return $this->InactiveRequestOym($request);

                                                                                        } else {
                                                                                            if ($request->modulo == 25) {
                                                                                                return $this->OymRequestHistory($request);
                                                                                            } else {
                                                                                                if ($request->modulo == 26) {

                                                                                                    return $this->EngineeringRequestHistory($request);

                                                                                                } else {
                                                                                                    if ($request->modulo == 36) {
                                                                                                        return $this->RequestsCreatedElectric($request);

                                                                                                    } else {
                                                                                                        if ($request->modulo == 37) {
                                                                                                            return $this->RejectedElectricalRequests($request);

                                                                                                        } else {
                                                                                                            if ($request->modulo == 38) {
                                                                                                                return $this->RequestApprovedElectrical($request);
                                                                                                            } else {
                                                                                                                if ($request->modulo == 17) {
                                                                                                                    return $this->RequestRejectedPmo($request);
                                                                                                                } else {
                                                                                                                    if ($request->modulo == 39) {
                                                                                                                        return $this->ZonalCreatedRequests($request);
                                                                                                                    } else {
                                                                                                                        if ($request->modulo == 40) {
                                                                                                                            return $this->ZonalRejectedRequests($request);

                                                                                                                        } else {
                                                                                                                            if ($request->modulo == 41) {
                                                                                                                                return $this->UserRequestsCreatedEngineering($request);

                                                                                                                            } else {
                                                                                                                                if ($request->modulo == 42) {
                                                                                                                                    return $this->RequestCrm($request);

                                                                                                                                } else {
                                                                                                                                    if ($request->modulo == 43) {
                                                                                                                                        return $this->RequestsControlCesta($request);

                                                                                                                                    }else{
                                                                                                                                        if($request->modulo == 44){
                                                                                                                                             return $this->RequestValidatePmoOld($request);

                                                                                                                                        }else{
                                                                                                                                            if($request->modulo == 60){
                                                                                                                                                return $this->RequestOOCC($request);
                                                                                                                                            }else{
                                                                                                                                                if($request->modulo == 61){
                                                                                                                                                    return $this->requestReclasificaction($request);
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

    }

    public function UserRequestCreated($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with([
            'user'                            => function ($query) {
                $query->select('id', 'name', 'apellido');
            },
            'site'                            => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'                         => function ($query) {
                $query->select('id', 'descripcion', 'color');
            },
            'subestado'                       => function ($query) {
                $query->select('id', 'subestado', 'color');
            },
            'proveedor'                       => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'                    => function ($query) {
                $query->select('id', 'nombre_trabajo', 'color');
            },

            'tipo_moneda'                     => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },

            'contingencia'                    => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },

            'solicitud_duplicada'             => function ($query) {
                $query->select('id', 'tipo_moneda_id', 'cesta', 'oc', 'costos_servicios', 'costos_activos', 'proceso_id', 'subestado_id');
            },
            'solicitud_duplicada.tipo_moneda' => function ($query) {
                $query->select('id', 'moneda');
            },
            'solicitud_duplicada.proceso'     => function ($query) {
                $query->select('id', 'color', 'descripcion');
            },
            'solicitud_duplicada.subestado'   => function ($query) {
                $query->select('id', 'color', 'subestado');
            },

        ])->where('user_id', Auth::user()->id)->where('first_request', 1)->orderby('id', 'desc')->paginate(20, ['id', 'site_id', 'created_at', 'proveedor_id', 'costos_activos', 'costos_servicios', 'cesta', 'oc', 'DAS', 'ework', 'cotizacion', 'proceso_id', 'subestado_id', 'tipo_trabajo_id', 'contingencia_id', 'proyecto_gpon', 'tipo_moneda_id', 'temp_sgc_pop_id', 'area_creadora_id', 'first_request', 'solicitud_duplicada_id', 'user_id', 'gestionador_id','activo_servicio','tipo_trabajo_ingenieria_id']);
        return $solicitudes;
    }

    public function UserRequestValidation($request)
    {
        if (Auth::user()->id == 11) {
            $solicitudes = SolicitudSgc::buscar()->with([
                'user'                            => function ($query) {
                    $query->select('id', 'name', 'apellido');
                },
                'site'                            => function ($query) {
                    $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
                },
                'proceso'                         => function ($query) {
                    $query->select('id', 'descripcion', 'color');
                },
                'subestado'                       => function ($query) {
                    $query->select('id', 'subestado', 'color');
                },
                'proveedor'                       => function ($query) {
                    $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
                },
                'tipo_trabajo'                    => function ($query) {
                    $query->select('id', 'nombre_trabajo', 'color');
                },

                'tipo_moneda'                     => function ($query) {
                    $query->select('id', 'moneda', 'valor');
                },

                'contingencia'                    => function ($query) {
                    $query->select('id', 'nombre_contingencia');
                },

                'solicitud_duplicada'             => function ($query) {
                    $query->select('id', 'tipo_moneda_id', 'cesta', 'oc', 'costos_servicios', 'costos_activos', 'proceso_id', 'subestado_id');
                },
                'solicitud_duplicada.tipo_moneda' => function ($query) {
                    $query->select('id', 'moneda');
                },
                'solicitud_duplicada.proceso'     => function ($query) {
                    $query->select('id', 'color', 'descripcion');
                },
                'solicitud_duplicada.subestado'   => function ($query) {
                    $query->select('id', 'color', 'subestado');
                },

            ])->where('id_crm', '!=', 1)->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->where('proceso_id', 6)->where('subestado_id', 7)->where('first_request', 1)->orderby('id', 'desc')->paginate(20, ['id', 'site_id', 'created_at', 'proveedor_id', 'costos_activos', 'costos_servicios', 'cesta', 'oc', 'DAS', 'ework', 'cotizacion', 'proceso_id', 'subestado_id', 'tipo_trabajo_id', 'contingencia_id', 'proyecto_gpon', 'tipo_moneda_id', 'temp_sgc_pop_id', 'area_creadora_id', 'first_request', 'solicitud_duplicada_id', 'user_id', 'gestionador_id']);
            return $solicitudes;
        } else {
            $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
            return $solicitudes;
        }
    }

    public function UserRequestRejected($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 6)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function UserRequestPendingFinalReport($request)
    {
        $solicitudes = SolicitudSgc::buscar()->filtroInfGuia()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 6)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestsInControl($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 2)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestsForControlApproval($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 2)->where('subestado_id', 7)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function ControlRejectedRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 2)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function ActiveRequestsOymControl($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 13)->where('first_request', 1)->where('proceso_id', '!=', 14)->where('area_creadora_id', null)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function EngineerCreatedRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('subestado_id', '!=', 8)->where('first_request', 1)->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RejectedEngineerRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 12)->where('subestado_id', 8)->where('first_request', 1)->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function LinkedProjects()
    {
        $solicitudes = InteresadoSolicitud::where('user_id', Auth::user()->id)->with('soli.user')->get();

        return $solicitudes;
    }
    public function EngineeringActiveRequest($request)
    {
        $solicitudes = SolicitudSgc::with(['user' => function ($query) {
            $query->select('id', 'name', 'apellido');
        },
            'site'                                    => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'                                 => function ($query) {
                $query->select('id', 'descripcion', 'color');
            },
            'subestado'                               => function ($query) {
                $query->select('id', 'subestado', 'color');
            },
            'proveedor'                               => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'                            => function ($query) {
                $query->select('id', 'nombre_trabajo', 'color');
            },

            'tipo_moneda'                             => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },

            'tipo_boleta'                             => function ($query) {
                $query->select('id', 'descripcion');
            },

            'motivo_trabajo'                      => function ($query) {
                $query->select('id', 'motivo');
            },
        ])->buscar()->where('proceso_id', '!=', 13)->where('proceso_id', '!=', 14)->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20, ['id', 'site_id', 'created_at', 'user_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'activo_servicio', 'cesta', 'oc', 'DAS', 'ework', 'cotizacion', 'proceso_id', 'subestado_id', 'tipo_trabajo_id', 'tipo_trabajo_ingenieria_id', 'contingencia_id', 'proyecto_gpon', 'tipo_moneda_id', 'temp_sgc_pop_id', 'area_creadora_id', 'solicitud_duplicada_id', 'gestionador_id', 'tipo_boleta_id', 'boleta']);
        return $solicitudes;
    }
    public function EngineeringInactiveRequest($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 1)->where('proceso_id', '!=', 2)->where('proceso_id', '!=', 3)->where('proceso_id', '!=', 4)->where('proceso_id', '!=', 5)->where('proceso_id', '!=', 6)->where('proceso_id', '!=', 7)->where('proceso_id', '!=', 8)->where('proceso_id', '!=', 9)->where('proceso_id', '!=', 10)->where('proceso_id', '!=', 11)->where('proceso_id', '!=', 12)->where('proceso_id', '!=', 15)->where('proceso_id', '!=', 16)->where('proceso_id', '!=', 17)->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestToApprovePmo($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'contingencia', 'motivo_trabajo')->where('proceso_id', 11)->where('subestado_id', 7)->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestActivePmo($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 13)->where('proceso_id', '!=', 14)->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestToApproveValidator($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 15)->where('subestado_id', 7)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RejectedRequestValidator($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 15)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestsApprovedAreaChief($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 16)->where('subestado_id', 7)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestsRejectedAreaChief($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'motivo_trabajo', 'contingencia')->where('proceso_id', 16)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function OymRequestHistory($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with(['user' => function ($query) {
            $query->select('id', 'name', 'apellido');
        },
            'site'                                              => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'                                           => function ($query) {
                $query->select('id', 'descripcion', 'color');
            },
            'subestado'                                         => function ($query) {
                $query->select('id', 'subestado', 'color');
            },
            'proveedor'                                         => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'                                      => function ($query) {
                $query->select('id', 'nombre_trabajo', 'color');
            },

            'tipo_moneda'                                       => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },

            'contingencia'                                      => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'                                       => function ($query) {
                $query->select('id', 'descripcion');
            },
            'solicitud_duplicada'                               => function ($query) {
                $query->select('id', 'tipo_moneda_id', 'cesta', 'oc', 'costos_servicios', 'costos_activos', 'proceso_id', 'subestado_id');
            },
            'solicitud_duplicada.tipo_moneda'                   => function ($query) {
                $query->select('id', 'moneda');
            },
            'solicitud_duplicada.proceso'                       => function ($query) {
                $query->select('id', 'color', 'descripcion');
            },
            'solicitud_duplicada.subestado'                     => function ($query) {
                $query->select('id', 'color', 'subestado');
            },
            'motivo_trabajo'                                => function ($query) {
                $query->select('id', 'motivo');
            },
            'temp_sgc_pop'                                      => function ($query) {
                $query->select('id', 'nem_movil', 'nombre');
            },
        ])->where('first_request', 1)->orderby('id', 'desc')->paginate(20, ['id', 'site_id', 'created_at', 'user_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'activo_servicio', 'cesta', 'oc', 'DAS', 'ework', 'cotizacion', 'proceso_id', 'subestado_id', 'tipo_trabajo_id', 'tipo_trabajo_ingenieria_id', 'contingencia_id', 'proyecto_gpon', 'tipo_moneda_id', 'temp_sgc_pop_id', 'area_creadora_id', 'first_request', 'solicitud_duplicada_id', 'gestionador_id','activo_servicio','proyecto_gpon','tipo_trabajo_ingenieria_id']);

        return $solicitudes;

    }

    public function InactiveRequestOym($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('area_creadora_id', null)->where('proceso_id', '!=', 1)->where('proceso_id', '!=', 2)->where('proceso_id', '!=', 3)->where('proceso_id', '!=', 4)->where('proceso_id', '!=', 5)->where('proceso_id', '!=', 6)->where('proceso_id', '!=', 7)->where('proceso_id', '!=', 8)->where('proceso_id', '!=', 9)->where('proceso_id', '!=', 10)->where('proceso_id', '!=', 11)->where('proceso_id', '!=', 12)->where('proceso_id', '!=', 15)->where('proceso_id', '!=', 16)->where('proceso_id', '!=', 17)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function requestReclasificaction($request){
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 2)->where('subestado_id', 23)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function EngineeringRequestHistory($request)
    {

        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'contingencia', 'motivo_trabajo')->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;

    }

    public function RequestsCreatedElectric($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RejectedElectricalRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 7)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestApprovedElectrical($request)
    {
        $crm_user = crm_user::where('user_id', Auth::user()->id)->get(['crm_id']);
        foreach ($crm_user as $crm) {
            $crm_id = $crm->crm_id;
        }
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 7)->where('subestado_id', 7)->where('id_crm', $crm_id)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestRejectedPmo($request)
    {
        $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'contingencia', 'motivo_trabajo')->where('proceso_id', 11)->where('subestado_id', 8)->where('area_creadora_id', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function ZonalCreatedRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function ZonalRejectedRequests($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', 8)->where('subestado_id', 8)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function UserRequestsCreatedEngineering($request)
    {
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('area_creadora_id', 1)->where('user_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

    public function RequestCrm($request)
    {
        if (Auth::user()->id == 11) {
            $solicitudes = SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 2)->where('id_crm', '!=', 3)->where('id_crm', '!=', 4)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('first_request', 1)->where('area_creadora_id', null)->orderby('id', 'desc')->paginate(20);
            return $solicitudes;
        } else {
            if (Auth::user()->id == 9) {
                $solicitudes = SolicitudSgc::buscar()->where('id_crm', '!=', 1)->where('id_crm', '!=', 5)->where('id_crm', '!=', 3)->where('id_crm', '!=', 6)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('first_request', 1)->where('area_creadora_id', null)->orderby('id', 'desc')->paginate(20);
                return $solicitudes;
            } else {
                $crm = crm_user::where('user_id', Auth::user()->id)->get();

                foreach ($crm as $c) {
                    $crm_id = $c->crm_id;
                }
                $solicitudes = SolicitudSgc::buscar()->where('id_crm', $crm_id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('first_request', 1)->where('area_creadora_id', null)->orderby('id', 'desc')->paginate(20);
                return $solicitudes;
            }
        }
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function getCodigos(Request $request)
    {
        $codigos = SolicitudSgc::where('id', 'like', "%" . request()->id . "%")->select('id')->get();
        return $codigos;
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function GetProyectosVinculados()
    {
        $proyectos = \DB::table('sgc.interesado_solicitud as i')
            ->leftJoin('sgc.nuevassolicitudes as n', 'n.id', '=', 'i.nuevassolicitud_id')
            ->leftJoin('entel_pops.sites as s', 's.id', '=', 'n.site_id')
            ->leftJoin('entel_dev.users as u', 'u.id', '=', 'n.user_id')
            ->leftJoin('sgc.proveedores as p', 'p.id', '=', 'n.proveedor_id')
            ->leftJoin('sgc.tipo_monedas as m', 'm.id', '=', 'n.tipo_moneda_id')
            ->leftJoin('sgc.procesos as e', 'e.id', '=', 'n.proceso_id')
            ->leftJoin('sgc.subestados as sub', 'sub.id', '=', 'n.subestado_id')
            ->select('n.id', 's.nem_site', 's.nombre', 'u.name', 'u.apellido', 'p.PROVEEDOR', 'n.activo_servicio', 'm.moneda', 'n.cesta', 'n.oc', 'n.ework', 'e.descripcion', 'e.color', 'sub.subestado', 'sub.color', 'n.created_at', 'n.cotizacion')
            ->where('i.user_id', Auth::user()->id)->get();

        return $proyectos;
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function RequestsControlCesta($id)
    {
        $solicitudes = SolicitudSgc::buscar()->with(['user' => function ($query) {
            $query->select('id', 'name', 'apellido');
        },
            'site'                                              => function ($query) {
                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id');
            },
            'proceso'                                           => function ($query) {
                $query->select('id', 'descripcion', 'color');
            },
            'subestado'                                         => function ($query) {
                $query->select('id', 'subestado', 'color');
            },
            'proveedor'                                         => function ($query) {
                $query->select('id', 'PROVEEDOR', 'RUT_PROVEEDOR');
            },
            'tipo_trabajo'                                      => function ($query) {
                $query->select('id', 'nombre_trabajo', 'color');
            },

            'tipo_moneda'                                       => function ($query) {
                $query->select('id', 'moneda', 'valor');
            },

            'contingencia'                                      => function ($query) {
                $query->select('id', 'nombre_contingencia');
            },
            'tipo_boleta'                                       => function ($query) {
                $query->select('id', 'descripcion');
            },
            'solicitud_duplicada'                               => function ($query) {
                $query->select('id', 'tipo_moneda_id', 'cesta', 'oc', 'costos_servicios', 'costos_activos', 'proceso_id', 'subestado_id');
            },
            'solicitud_duplicada.tipo_moneda'                   => function ($query) {
                $query->select('id', 'moneda');
            },
            'solicitud_duplicada.proceso'                       => function ($query) {
                $query->select('id', 'color', 'descripcion');
            },
            'solicitud_duplicada.subestado'                     => function ($query) {
                $query->select('id', 'color', 'subestado');
            },
            'motivo_trabajo'                                => function ($query) {
                $query->select('id', 'motivo');
            },
            'temp_sgc_pop'                                      => function ($query) {
                $query->select('id', 'nem_movil', 'nombre');
            },
        ])->where('first_request', 1)->where('proceso_id',2)->where('subestado_id','!=',1)->where('subestado_id','!=',2)->where('subestado_id','!=',3)->where('subestado_id','!=',4)->where('subestado_id','!=',5)->where('subestado_id','!=',8)->where('subestado_id','!=',9)->where('subestado_id','!=',10)->where('subestado_id','!=',11)->where('subestado_id','!=',12)->where('subestado_id','!=',13)->where('subestado_id','!=',14)->where('subestado_id','!=',15)->where('subestado_id','!=',16)->where('subestado_id','!=',17)->where('subestado_id','!=',18)->orderby('id', 'desc')->paginate(20, ['id', 'site_id', 'created_at', 'user_id', 'proveedor_id', 'costos_activos', 'costos_servicios', 'activo_servicio', 'cesta', 'oc', 'DAS', 'ework', 'cotizacion', 'proceso_id', 'subestado_id', 'tipo_trabajo_id', 'tipo_trabajo_ingenieria_id', 'contingencia_id', 'proyecto_gpon', 'tipo_moneda_id', 'temp_sgc_pop_id', 'area_creadora_id', 'first_request', 'solicitud_duplicada_id', 'gestionador_id']);

        return $solicitudes;

    }


    public function RequestOOCC($modulo){
        $solicitudes = SolicitudSgc::buscar()->where('user_id', Auth::user()->id)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('first_request', 1)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function RequestValidatePmoOld(Request $request)
    {
         $solicitudes = SolicitudSgc::buscar()->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'contingencia', 'motivo_trabajo')->where('aprobador_pmo_id', Auth::user()->id)->orderby('id', 'desc')->paginate(20);
        return $solicitudes;
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
