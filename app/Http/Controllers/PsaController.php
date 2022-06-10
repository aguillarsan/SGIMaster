<?php

namespace App\Http\Controllers;

use App\Acces_user_module;
use App\Activo;
use App\Capacidad;
use App\Cargo_user;
use App\Cod_sap;
use App\crm_user;
use App\EstadoPsa;
use App\LogPsa;
use App\Marca;
use App\MotivoPsa;
use App\Notificacion;
use App\Permiso_rol;
use App\Permission_role_psa;
use App\PrioridadPsa;
use App\PsaSolicitud;
use App\role_user;
use App\Rol_user_psa;
use App\SubestadoPsa;
use App\Zona_user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolUser = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($rolUser as $r) {
            $rol = $r->role_id;
        }
        $permisos = Permiso_rol::where('role_id', $rol)->where('permission_id', 145)->count();

        if ($permisos != 0) {
            Acces_user_module::create([
                'user_id'   => Auth::user()->id,
                'modulo_id' => 3,

            ]);
            $rol_user_psa = Rol_user_psa::where('user_id', Auth::user()->id)->get();
            foreach ($rol_user_psa as $r) {
                $rol_id = $r->role_id;
            }
            $permision = Permission_role_psa::where('role_id', $rol_id)->get();
            return view('psa.index', compact('permision'));
        } else {
            return view('errores.403');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetDatosSolicitudPsa(Request $request)
    {
        //

        $rol = Rol_user_psa::where('user_id', Auth::user()->id)->select('role_id')->get();

        $crm = crm_user::where('user_id', Auth::user()->id)->get();
        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        foreach ($crm as $c) {
            $crm_id = $c->crm_id;
        }

        if (floatval($RoleId) === floatval(1) || floatval($RoleId) === floatval(2)) {
            $solicitud = PsaSolicitud::buscar()->with('site.pop.comuna.zona.crm', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'motivo')->select('id', 'site_id', 'created_at', 'user_id', 'oficina_id', 'crm_id', 'total_activo', 'cod_sap_id', 'prioridad_id', 'estado_id', 'subestado_id', 'prioridad_solicitante', 'motivo_id', 'descripcion')->orderBy('id', 'desc')->paginate(20);
            return $solicitud;
        } else {
            if ($RoleId == 3) {
                $solicitud = PsaSolicitud::buscar()->with('site.pop.comuna.zona.crm', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'motivo')->where('crm_id', $crm_id)->orderBy('id', 'desc')->paginate(20);

                return $solicitud;
            } else {
                if (floatval(Auth::user()->id) === floatval(11)) {
                    $solicitud = PsaSolicitud::buscar()->filterF()->with('site.pop.comuna.zona.crm', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'motivo')->orderBy('id', 'desc')->paginate(20);
                    return $solicitud;
                } else {
                    $cargosCount = Cargo_user::where('id_user', Auth::user()->id)->count();
                    if ($cargosCount != 0) {

                        $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
                        foreach ($cargos as $cargo) {
                            $cargo_id = $cargo->id_cargo;
                        }

                        if ($cargo_id == 1) {
                            $zonaUsers = Zona_user::where('user_id', Auth::user()->id)->get();
                            foreach ($zonaUsers as $z) {
                                $zona_id = $z->zona_id;
                            }

                            if ($zona_id != null) {
                                $solicitud = PsaSolicitud::buscar()->with('site.pop.comuna.zona.crm', 'estado', 'prioridad', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'motivo')->where('zona_id', $zona_id)->orderBy('id', 'desc')->paginate(20);
                                return $solicitud;
                            }
                        }
                    } else {
                        if (floatval($RoleId) === floatval(5)) {
                            $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
                            foreach ($cargos as $cargo) {
                                $cargo_id = $cargo->id_cargo;
                            }
                            if ($cargo_id == 2) {
                                $solicitud = PsaSolicitud::buscar()->with('site.pop.comuna.zona.crm', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'motivo')->where('crm_id', $crm_id)->orderBy('id', 'desc')->paginate(20);
                                return $solicitud;
                            }
                        }
                        if (floatval($RoleId) === floatval(4)) {
                            $cargos = Cargo_user::where('id_user', Auth::user()->id)->get();
                            foreach ($cargos as $cargo) {
                                $cargo_id = $cargo->id_cargo;
                            }

                            $solicitud = PsaSolicitud::buscar()->with('site.pop.comuna.zona.crm', 'estado', 'subestado', 'user', 'codSap', 'crm', 'oficina', 'prioridad', 'motivo')->orderBy('id', 'desc')->paginate(20);
                            return $solicitud;
                        }
                    }
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetMarcas(Request $request)
    {
        $marcas = Marca::where('activo_id', request('activo'))->get();
        return $marcas;
    }

    public function GetActivo()
    {
        $activos = Activo::get();
        return $activos;
    }
    public function AddPrioridadPsa(Request $request)
    {
        $solicitud               = PsaSolicitud::find($request->id);
        $solicitud->prioridad_id = floatval($request->prioridad_id);
        $solicitud->save();

        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        if ($request->tipoEdicion == 1) {
            $prioridad        = PrioridadPsa::find($request->prioridad_id);
            $log->descripcion = 'Prioridad' . ' ' . $prioridad->descripcion;
        } else {
            $prioridad        = PrioridadPsa::find($request->prioridad_id);
            $log->descripcion = 'Prioridad editada, nueva prioridad:' . ' ' . $prioridad->descripcion;
        }

        $log->save();
        return;
    }
    public function GetMotivo()
    {
        $motivos = MotivoPsa::get();
        return $motivos;
    }
    public function AddSitePsa(Request $request)
    {
        $solicitud          = PsaSolicitud::find($request->id);
        $solicitud->site_id = $request->site_id;
        $solicitud->save();
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Sitio agregado';
        $log->save();
        return;
    }
    public function RechazoSolicitud(Request $request)
    {
        $solicitud                   = PsaSolicitud::find($request->id);
        $solicitud->motivo_rechazo   = $request->motivo;
        $solicitud->old_estado_id    = $solicitud->estado_id;
        $solicitud->old_subestado_id = $solicitud->subestado_id;
        $solicitud->estado_id        = 7;
        $solicitud->subestado_id     = null;
        $solicitud->save();
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Solicitud rechazada, motivo:' . ' ' . $request->motivo;
        $log->save();

        $notification              = new Notificacion;
        $notification->user_id     = $solicitud->user_id;
        $notification->activo_id   = 1;
        $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'fue rechazada, por el siguiente motivo:' . ' ' . $request->motivo;
        $notification->save();

        return;
    }

    public function GetCapacidad($id)
    {

        $capacidad = Capacidad::where('marca_id', $id)->get();
        return $capacidad;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AprobarIng($id)
    {
        $solicitud = PsaSolicitud::find($id);
        if ($solicitud->subestado_id == 1) {

            $solicitud->subestado_id = 2;
            $solicitud->save();

            $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
            $nombre            = (string) $user;
            $id                = $solicitud->id;
            $log               = new LogPsa;
            $log->solicitud_id = $solicitud->id;
            $log->user_id      = Auth::user()->id;
            $log->descripcion  = 'Solicitud Aprobada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "VALIDACION ELECTRICO CRM " a "VALIDACION INGENIERO OYM"';
            $log->save();
            $notification              = new Notificacion;
            $notification->user_id     = $solicitud->user_id;
            $notification->activo_id   = 1;
            $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'fue aprobada.';
            $notification->save();
        } else {
            if ($solicitud->subestado_id == 2) {
                $solicitud->estado_id      = 2;
                $solicitud->estado_gestion = Carbon::now();

                $solicitud->subestado_id = 3;
                $solicitud->save();
                $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
                $nombre            = (string) $user;
                $id                = $solicitud->id;
                $log               = new LogPsa;
                $log->solicitud_id = $solicitud->id;
                $log->user_id      = Auth::user()->id;
                $log->descripcion  = 'Solicitud Aprobada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "VALIDACION INGENIERO OYM" a "GESTIÓN VALIDAR STOCK"';
                $log->save();
                $notification              = new Notificacion;
                $notification->user_id     = $solicitud->user_id;
                $notification->activo_id   = 1;
                $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'fue aprobada.';
                $notification->save();
            } else {
                if ($solicitud->estado_id == 2 && $solicitud->subestado_id == 4) {
                    $solicitud->estado_id       = 3;
                    $solicitud->estado_despacho = Carbon::now();

                    $solicitud->subestado_id = 5;
                    $solicitud->save();
                    $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
                    $nombre            = (string) $user;
                    $id                = $solicitud->id;
                    $log               = new LogPsa;
                    $log->solicitud_id = $solicitud->id;
                    $log->user_id      = Auth::user()->id;
                    $log->descripcion  = 'Solicitud Aprobada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "GESTIÓN OYM" a "DESPACHO"';
                    $log->save();
                    $notification              = new Notificacion;
                    $notification->user_id     = $solicitud->user_id;
                    $notification->activo_id   = 1;
                    $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'esta en proceso de despacho';
                    $notification->save();
                } else {
                    if ($solicitud->estado_id == 3) {
                        $solicitud->estado_id          = 4;
                        $solicitud->subestado_id       = 11;
                        $solicitud->estado_instalacion = Carbon::now();

                        $solicitud->save();
                        $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
                        $nombre            = (string) $user;
                        $id                = $solicitud->id;
                        $log               = new LogPsa;
                        $log->solicitud_id = $solicitud->id;
                        $log->user_id      = Auth::user()->id;
                        $log->descripcion  = 'Solicitud Aprobada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "DESPACHO OYM" a "INSTALCIÓN RECEPCION"';
                        $log->save();
                        $notification              = new Notificacion;
                        $notification->user_id     = $solicitud->user_id;
                        $notification->activo_id   = 1;
                        $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'esta en proceso de instalación';
                        $notification->save();
                    } else {
                        if ($solicitud->estado_id == 4 && $solicitud->fecha_instalacion != null) {
                            $solicitud->estado_id         = 5;
                            $solicitud->subestado_id      = null;
                            $solicitud->estado_finalizado = Carbon::now();

                            $solicitud->save();

                            $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
                            $nombre            = (string) $user;
                            $id                = $solicitud->id;
                            $log               = new LogPsa;
                            $log->solicitud_id = $solicitud->id;
                            $log->user_id      = Auth::user()->id;
                            $log->descripcion  = 'Solicitud finalizada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "INSTALACIÓN GESTIÓN" a "FINALIZADA"';
                            $log->save();
                            $notification              = new Notificacion;
                            $notification->user_id     = $solicitud->user_id;
                            $notification->activo_id   = 1;
                            $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'fue finalizada';
                            $notification->save();

                            //if ($solicitud->activo_id = 1 && $solicitud->site_id != null) {
                            // $total = $solicitud->total_activo;

                            //for ($i = 0; $i < $total; $i++) {

                            // $batery                    = new Batteries;
                            //
                            //$batery->battery_type_id          = $solicitud->marca_id;

                            // $batery->installed_at = $solicitud->fecha_instalacion;
                            //$batery->save();
                            // }

                            // }
                        } else {
                            if ($solicitud->subestado_id == 14) {
                                $solicitud->estado_id      = 2;
                                $solicitud->estado_gestion = Carbon::now();

                                $solicitud->subestado_id = 3;
                                $solicitud->save();
                                $user              = Auth::user()->name . ' ' . Auth::user()->apellido;
                                $nombre            = (string) $user;
                                $id                = $solicitud->id;
                                $log               = new LogPsa;
                                $log->solicitud_id = $solicitud->id;
                                $log->user_id      = Auth::user()->id;
                                $log->descripcion  = 'Solicitud Aprobada Por' . ' ' . $nombre . ' ' . 'Cambio de estado "VALIDACION " a "GESTIÓN VALIDAR STOCK"';
                                $log->save();
                                $notification              = new Notificacion;
                                $notification->user_id     = $solicitud->user_id;
                                $notification->activo_id   = 1;
                                $notification->descripcion = 'Su solicitud de activos  nro°' . ' ' . $solicitud->id . ' ' . 'fue aprobada.';
                                $notification->save();
                            }
                        }
                    }
                }
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
    public function EditTotalBatery(Request $request)
    {
        $solicitud               = PsaSolicitud::find($request->solicitud_id);
        $solicitud->total_activo = $request->total;
        $solicitud->save();
        return;
    }

    public function GetCodSap($id)
    {
        $solicitud = PsaSolicitud::find($id);
        $cod_saps  = Cod_sap::where('negocio_id', $solicitud->negocio_id)->get();
        return $cod_saps;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AddMarca(Request $request)
    {
        $solicitud           = PsaSolicitud::find($request->solicitud_id);
        $solicitud->marca_id = $request->marca_id;
        $solicitud->save();
        return;
    }

    public function AddCapacidad(Request $request)
    {
        $solicitud               = PsaSolicitud::find($request->solicitud_id);
        $solicitud->capacidad_id = $request->capacidad_id;
        $solicitud->save();
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetCapacidades(Request $request)
    {
        $solicitud   = PsaSolicitud::find($request->solicitud_id);
        $capacidades = Capacidad::where('marca_id', $solicitud->marca_id)->get();
        return $capacidades;
    }

    public function AnularSolicitud(Request $request)
    {
        $solicitud               = PsaSolicitud::find($request->solicitud_id);
        $solicitud->estado_id    = 9;
        $solicitud->subestado_id = null;
        $solicitud->save();

        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Solicitud anulada, motivo:' . ' ' . $request->motivo;
        $log->save();
    }

    public function registrarBitacora(Request $request)
    {

        $log               = new LogPsa;
        $log->solicitud_id = $request->solicitud_id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = $request->mensaje;
        $log->save();
    }

    public function getBitacora($id)
    {
        $log = LogPsa::where('solicitud_id', $id)->with('user')->orderby('id', 'desc')->get();
        return response()->json($log);
    }

    public function getEstados()
    {
        $estados = EstadoPsa::get();
        return response()->json($estados);
    }

    public function agregarOdenTraslado(Request $request)
    {
        $solicitud                 = PsaSolicitud::find($request->id);
        $solicitud->orden_traslado = $request->dato;

        $solicitud->save();

        return;
    }

    public function getSubEstados(Request $request)
    {
        $subestados = SubestadoPsa::where('estado_id', $request->estado_id)->get();
        return response()->json($subestados);
    }

    public function updateEstadoSubestado(Request $request)
    {
        $solicitud               = PsaSolicitud::find($request->solicitud_id);
        $solicitud->estado_id    = $request->estado_id;
        $solicitud->subestado_id = $request->subestado_id;
        $solicitud->save();
        return;
    }
}
