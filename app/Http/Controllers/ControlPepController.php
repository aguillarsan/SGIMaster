<?php

namespace App\Http\Controllers;

use App\Bitacora_Pep;
use App\crm_user;
use App\Peps;
use App\Pep_blocked;
use App\Permiso_rol;
use App\Ranking;
use App\role_user;
use App\SolicitudSgc;
use App\Ticket;
use App\Total_pep;
use App\Total_sgc;
use App\Total_sgc_c_oc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlPepController extends Controller
{
    public function __construct()
    {

        Carbon::setLocale('es');
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rol      = role_user::where('user_id', Auth::user()->id)->first();
        $permisos = Permiso_rol::where('role_id', $rol->role_id)->get();

        return view('controlPep.index', compact('permisos'));
    }

    public function dataPepAsociate($id)
    {
        $ticket_id = null;
        $boleta    = null;
        $pep       = Peps::find($id);
        $ticket    = Ticket::where('nro_imputacion', $pep->pep)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'estado')->get();

        $solicitudes        = SolicitudSgc::where('boleta', $pep->pep)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('oc', null)->where('first_request', 1)->orderby('id', 'desc')->get();
        $solicitudes_con_oc = SolicitudSgc::where('boleta', $pep->pep)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('oc', '!=', null)->where('first_request', 1)->orderby('id', 'desc')->get();

        if ($ticket) {

            $solicitudes_ticket = SolicitudSgc::where('boleta', $pep->pep)->with('site', 'user', 'proveedor', 'tipo_moneda', 'proceso', 'subestado', 'tipo_boleta', 'temp_sgc_pop', 'solicitud_duplicada.tipo_moneda', 'solicitud_duplicada.proceso', 'solicitud_duplicada.subestado', 'tipo_trabajo', 'contingencia', 'motivo_trabajo')->where('proceso_id', '!=', 14)->where('first_request', 1)->orderby('id', 'desc')->get();
            if ($solicitudes_ticket) {
                foreach ($solicitudes_ticket as $s) {
                    if ($s->ticket_id != null) {

                        $ticket_id = $s->ticket_id;
                        $boleta    = $s->boleta;

                    } else {
                        $ticket_id == null;
                        $boleta = null;
                    }
                }

                $ticket_update = Ticket::find($ticket_id);
                if ($ticket_update) {
                    $ticket_update->nro_imputacion = $boleta;
                    $ticket_update->inputacion_id  = 4;
                    $ticket_update->save();
                }

                $ticket = Ticket::where('nro_imputacion', $pep->pep)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'estado')->get();

            }
        }

        return view('controlPep.show', compact('ticket', 'pep', 'solicitudes', 'solicitudes_con_oc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $rol = role_user::where('user_id', Auth::user()->id)->first();

        $crm = crm_user::where('user_id', Auth::user()->id)->first();

        if ($rol->role_id == 1 || $rol->role_id == 16 || $rol->role_id == 8) {
            $pep                = Peps::buscar()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo', 'subestado')->paginate(20);
            $pep_aperturado     = Peps::where('estado_id', 1)->count();
            $pep_enviado_cerrar = Peps::where('estado_id', 2)->count();
            $pep_cerrado        = Peps::where('estado_id', 3)->count();
        } else {
            if (Auth::user()->id == 11) {
                $pep                = Peps::filtroCrmSurAustral()->buscar()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo', 'subestado')->paginate(20);
                $pep_aperturado     = Peps::filtroCrmSurAustral()->where('estado_id', 1)->count();
                $pep_enviado_cerrar = Peps::filtroCrmSurAustral()->where('estado_id', 2)->count();
                $pep_cerrado        = Peps::filtroCrmSurAustral()->where('estado_id', 3)->count();

            } else {
                if (Auth::user()->id == 12) {
                    $pep                = Peps::FiltroCrmCentroSurSur()->buscar()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo', 'subestado')->paginate(20);
                    $pep_aperturado     = Peps::FiltroCrmCentroSurSur()->where('estado_id', 1)->count();
                    $pep_enviado_cerrar = Peps::FiltroCrmCentroSurSur()->where('estado_id', 2)->count();
                    $pep_cerrado        = Peps::FiltroCrmCentroSurSur()->where('estado_id', 3)->count();

                } else {
                    if (Auth::user()->id == 25) {
                        $pep                = Peps::FiltroCrmMetropolitano()->buscar()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo', 'subestado')->paginate(20);
                        $pep_aperturado     = Peps::FiltroCrmMetropolitano()->where('estado_id', 1)->count();
                        $pep_enviado_cerrar = Peps::FiltroCrmMetropolitano()->where('estado_id', 2)->count();
                        $pep_cerrado        = Peps::FiltroCrmMetropolitano()->where('estado_id', 3)->count();
                    } else {
                        if ($rol->role_id == 12) {

                            $pep                = Peps::filtroCrm($crm->crm_id)->buscar()->with('site.pop.comuna.zona.crm', 'tipo_pep', 'estado', 'total_pep', 'flujo', 'subestado')->paginate(20);
                            $pep_aperturado     = Peps::filtroCrm($crm->crm_id)->where('estado_id', 1)->count();
                            $pep_enviado_cerrar = Peps::filtroCrm($crm->crm_id)->where('estado_id', 2)->count();
                            $pep_cerrado        = Peps::filtroCrm($crm->crm_id)->where('estado_id', 3)->count();
                        }
                    }

                }
            }
        }

        $ranking = \DB::connection('control_pep')->select('CALL proc_ranking_crm');

        $total_peps_sin_ticket = \DB::connection('control_pep')->select('CALL SP_TOTAL_PEP_SIN_TICKET');
        $fechas                = \DB::connection('control_pep')->select('CALL SP_GET_FECHAS_OLD_RANKING');
        $ultima_fecha          = Ranking::get();
        $pep_total             = Peps::count();

        $data = [
            'peps'                  => $pep,
            'pep_aperturado'        => $pep_aperturado,
            'pep_enviado_cerrar'    => $pep_enviado_cerrar,
            'pep_cerrado'           => $pep_cerrado,
            'ranking'               => $ranking,

            'total_peps_sin_ticket' => $total_peps_sin_ticket,
            'fechas'                => $fechas,
            'ultima_fecha'          => $ultima_fecha->last(),
            'pep_total'             => $pep_total,
        ];

        return response()->json($data);
    }

    public function oldRanking(Request $request)
    {

        $ranking = Ranking::where('created_at', 'like', "%" . $request->fecha . "%")->get();
        return response()->json($ranking);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {

        $pep = Peps::find($id);
        if ($pep->estado_id == 1) {
            $pep->estado_id            = 2;
            $pep->fecha_enviado_cerrar = Carbon::now();
            $pep->save();
            $pep_block      = new Pep_blocked;
            $pep_block->pep = $pep->pep;

            $pep_block->save();

            $bitacora              = new Bitacora_Pep;
            $bitacora->descripcion = 'Pep enviado a cerrar';
            $bitacora->user_id     = Auth::user()->id;
            $bitacora->pep_id      = $id;
            $bitacora->save();
            return;
        } else {
            if ($pep->estado_id == 2) {
                $pep->estado_id        = 3;
                $pep->subestado_id     = null;
                $pep->fecha_cierre_pep = Carbon::now();
                $pep->save();

                $bitacora              = new Bitacora_Pep;
                $bitacora->descripcion = 'Pep cerrado';
                $bitacora->user_id     = Auth::user()->id;
                $bitacora->pep_id      = $id;
                $bitacora->save();
                return;
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculateTotalSgcPep()
    {
        Total_sgc::query()->truncate();
        Total_pep::query()->truncate();

        $pep = Peps::where('pep', '!=', null)->get();

        foreach ($pep as $p) {

            $solicitudes = SolicitudSgc::where('proceso_id', '!=', 14)->where('oc', null)->with('tipo_moneda')->where('boleta', $p->pep)->get();

            foreach ($solicitudes as $solicitud) {
                if ($solicitud->costos_activos != null) {
                    $total        = new Total_sgc;
                    $total->total = $solicitud->costos_activos * $solicitud->tipo_moneda->valor;
                    $total->pep   = $p->pep;
                    $total->save();
                } else {
                    if ($solicitud->costos_servicios != null) {
                        $total        = new Total_sgc;
                        $total->total = $solicitud->costos_servicios * $solicitud->tipo_moneda->valor;
                        $total->pep   = $p->pep;
                        $total->save();

                    } else {
                        if ($solicitud->activo_servicio != null) {
                            $total        = new Total_sgc;
                            $total->total = $solicitud->activo_servicio * $solicitud->tipo_moneda->valor;
                            $total->pep   = $p->pep;
                            $total->save();

                        }
                    }
                }
            }

        }
        $total_peps = Total_sgc::groupBy('pep')
            ->selectRaw('sum(total) as total_suma, pep')
            ->get();

        foreach ($total_peps as $total_pep) {
            $peps        = new Total_pep;
            $peps->total = $total_pep->total_suma;
            $peps->pep   = $total_pep->pep;
            $peps->save();

        }

        $total_peps = Total_pep::get();
        foreach ($total_peps as $total_pep) {
            Peps::where('pep', $total_pep->pep)->update(['total_pep_id' => $total_pep->id]);
        }
        \DB::connection('control_pep')->select('CALL SP_UPDATE_TOTAL_NA_OC');

        return;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculateValueSgcConOc($id)
    {

        try {
            $pep = Peps::find($id);

            $total_check_insert = Total_sgc_c_oc::where('pep', $pep->pep)->get();
            if ($total_check_insert) {
                foreach ($total_check_insert as $total) {
                    $delete_insert = Total_sgc_c_oc::find($total->id);
                    $delete_insert->delete();
                }
            }

            $solicitudes = SolicitudSgc::where('oc', '!=', null)->where('tipo_boleta_id', 3)->where('proceso_id', '!=', 14)->with('tipo_moneda')->where('boleta', $pep->pep)->get();

            foreach ($solicitudes as $solicitud) {
                if ($solicitud->costos_activos != null) {
                    $total        = new Total_sgc_c_oc;
                    $total->total = $solicitud->costos_activos * $solicitud->tipo_moneda->valor;
                    $total->pep   = $pep->pep;
                    $total->save();
                } else {
                    if ($solicitud->costos_servicios != null) {
                        $total        = new Total_sgc_c_oc;
                        $total->total = $solicitud->costos_servicios * $solicitud->tipo_moneda->valor;
                        $total->pep   = $pep->pep;
                        $total->save();

                    } else {
                        if ($solicitud->activo_servicio != null) {
                            $total        = new Total_sgc_c_oc;
                            $total->total = $solicitud->activo_servicio * $solicitud->tipo_moneda->valor;
                            $total->pep   = $pep->pep;
                            $total->save();

                        }
                    }
                }
            }

            $total_peps = Total_sgc_c_oc::groupBy('pep')
                ->where('pep', $pep->pep)
                ->selectRaw('sum(total) as total_suma, pep')
                ->get();

            $total_monto_sgc_con_oc = 0;

            if ($total_peps) {
                foreach ($total_peps as $total_pep) {
                    $total_monto_sgc_con_oc = $total_pep->total_suma;
                }
            }

            $pep->total_sgc_con_oc = $total_monto_sgc_con_oc;
            if ($pep->total_pep) {
                $total_sin_oc = $pep->total_pep->total;
            } else {
                $total_sin_oc = 0;
            }
            $pep->total_real_sgc = $total_monto_sgc_con_oc + $total_sin_oc;
            $pep->save();

            $pep_data = Peps::where('id', $id)->with('total_pep')->first();

            return response()->json($pep_data);
        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSubestado(Request $request)
    {
        try {
            $pep = Peps::find($request->pep_id);
            if ($pep->subestado_id == null) {
                $pep->subestado_id    = 1;
                $pep->fecha_correo_cg = Carbon::now();
                $pep->save();

                $bitacora              = new Bitacora_Pep;
                $bitacora->descripcion = 'Correo enviado a CG';
                $bitacora->user_id     = Auth::user()->id;
                $bitacora->pep_id      = $request->pep_id;
                $bitacora->save();
                $mensaje = 'Estado modificado a correo enviado a CG';
                return $mensaje;

            } else {
                if ($pep->subestado_id == 1) {
                    $pep->subestado_id      = 2;
                    $pep->fecha_bloqueo_sap = Carbon::now();
                    $pep->save();

                    $bitacora              = new Bitacora_Pep;
                    $bitacora->descripcion = 'Pep Bloqueado en SAP';
                    $bitacora->user_id     = Auth::user()->id;
                    $bitacora->pep_id      = $request->pep_id;
                    $bitacora->save();
                    $mensaje = 'Estado modificado a bloqueo en SAP';
                    return $mensaje;

                } else {
                    if ($pep->subestado_id == 2) {
                        $pep->subestado_id     = 3;
                        $pep->fecha_acta_final = Carbon::now();
                        $pep->save();

                        $bitacora              = new Bitacora_Pep;
                        $bitacora->descripcion = 'Acta final';
                        $bitacora->user_id     = Auth::user()->id;
                        $bitacora->pep_id      = $request->pep_id;
                        $bitacora->save();
                        $mensaje = 'Estado modificado a Acta final';
                        return $mensaje;

                    }

                }
            }

        } catch (Exception $e) {
            return $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateReaperturaPep(Request $request)
    {
        $pep               = Peps::find($request->pep_id);
        $pep->estado_id    = 1;
        $pep->subestado_id = null;
        $pep->save();

        $bitacora              = new Bitacora_Pep;
        $bitacora->descripcion = 'Pep Reaperturado';
        $bitacora->user_id     = Auth::user()->id;
        $bitacora->pep_id      = $request->pep_id;
        $bitacora->save();
        return;

    }

    public function backSubestado(Request $request)
    {
        $pep = Peps::find($request->pep_id);
        if ($pep->subestado_id == 3) {
            $pep->subestado_id = 2;

            $pep->save();

            $mensaje = 'Estado modificado';
            return $mensaje;

        } else {
            if ($pep->subestado_id == 2) {
                $pep->subestado_id = 1;

                $pep->save();

                $mensaje = 'Estado modificado';
                return $mensaje;

            } else {
                if ($pep->subestado_id == 1) {
                    $pep->subestado_id = null;

                    $pep->save();

                    $mensaje = 'Estado modificado ';
                    return $mensaje;

                }

            }
        }
    }

    public function estadoRevision(Request $request)
    {
        $pep = Peps::find($request->pep_id);
        if ($pep->subestado_id != 4) {
            $pep->old_sub_estado_id = $pep->subestado_id;
            $pep->save();
            $pep->subestado_id  = 4;
            $pep->fecha_revisar = Carbon::now();
            $pep->save();
            $mensaje = 'Pep en estado revisión';
            return $mensaje;
        } else {
            if ($pep->subestado_id == 4) {

                $pep->subestado_id      = $pep->old_sub_estado_id;
                $pep->old_sub_estado_id = null;
                $pep->fecha_revisar     = Carbon::now();
                $pep->save();

                $bitacora              = new Bitacora_Pep;
                $bitacora->descripcion = 'En Revisión';
                $bitacora->user_id     = Auth::user()->id;
                $bitacora->pep_id      = $request->pep_id;
                $bitacora->save();
                $mensaje = 'Finalizo el estado revisión';
                return $mensaje;

            }

        }

    }
}
