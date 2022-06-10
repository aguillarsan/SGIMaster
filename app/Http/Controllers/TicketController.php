<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Area;
use App\Cargo_user;
use App\Crm;
use App\crm_user;
use App\Inputacion;
use App\Listing;
use App\Listing_ticket;
use App\Log;
use App\LogPsa;
use App\Mantencion;
use App\Mantencion_realizada;
use App\Notificacion;
use App\Peps;
use App\Permiso_rol;
use App\Pop;
use App\PsaSolicitud;
use App\Rechazo;
use App\role_user;
use App\Site;
use App\SolicitudSgc;
use App\Technologies;
use App\Ticket;
use App\Ticket_tp;
use App\Tipo_archivo;
use App\Tipo_motivo;
use App\User;
use App\Zona;
use App\Zona_user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
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
    public function index($id)
    {
        //BUSQUEDA DEL ROL

        if (floatval($id) === floatval(7) || floatval($id) === floatval(8) || floatval($id) === floatval(9) || floatval($id) === floatval(10) || floatval($id) === floatval(11) || floatval($id) === floatval(12)) {
            $motivoid = $id;
            $crm      = 0;
        } else {
            $crm      = $id;
            $motivoid = 0;
        }

        $motivo = Tipo_motivo::get();
        $area   = Area::get();
        $useId  = Auth::user()->id;
        return view('home', compact('motivo', 'crm', 'useId', 'motivoid'));
    }
    public function pbaShow()
    {
        return view('ticket.showpba');
    }

    public function datosTicket($id)
    {
        $bitacora = Log::where('ticket_id', $id)->where('tipo_mensaje_id', 1)->with('user')->orderBy('id', 'desc')->get();

        $ticket = Ticket::where('id', $id)->with('user', 'area', 'tecnica', 'equipo', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'inputacion')->first();

        $tps      = Ticket_tp::where('ticket_id', $id)->get();
        $archivos = Archivo::where('ticket_id', $id)->get();
        $pep      = Peps::where('pep', $ticket->nro_imputacion)->with('estadocontrolpep')->first();

        $data = [
            'bitacora' => $bitacora,
            'ticket'   => $ticket,

            'tps'      => $tps,
            'archivos' => $archivos,
            'pep'      => $pep,
        ];
        return response()->json($data);
    }

    public function updateDataTicketExpres(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->area_id = $request->area_id;
        $ticket->tecnica_id = $request->tecnica_id;
        $ticket->equipo_id = $request->equipo_id;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $request->ticket_id;
        $log->tipo_mensaje_id = 2;
        $log->descripcion     = "El área, técnica y equipo fueron ingresados";
        $log->user_id         = Auth::user()->id;
        $log->save();
        return;
    }

    public function listaBacklog(Request $request)
    {

        $id = Auth::user()->id;

        $rol = role_user::where('user_id', $id)->first(['role_id']);

        $state  = $request->state;
        $RoleId = $rol->role_id;

     

        if ($rol->role_id == 32) {
            $ticket = Ticket::buscar()->where('estado_id', $state)->whereIn('user_id', [21,268,267])->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

            return $ticket;
        }

       
        if ($rol->role_id == 33) {
            $crm = crm_user::where('user_id', Auth::user()->id)->first();
            $crm_id = $crm->crm_id;
            $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id',   $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

            return $ticket;
        }



        if ($rol->role_id == 29) {
            $ticket = Ticket::buscar()->filterState()->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
            return $ticket;
        }
        $crm = crm_user::where('user_id', Auth::user()->id)->first();
        $crm_id = $crm->crm_id;

        if ($rol->role_id == 34) {
            $ticket = Ticket::buscar()->where('estado_id', $state)->whereIn('user_id', [443,444,445])->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

            return $ticket;
        }
        if ( Auth::user()->id == 21 || Auth::user()->id == 14 || $RoleId == 5 || Auth::user()->id == 12 || Auth::user()->id == 11) {
         
            //////////////////////////////////
            if (floatval(Auth::user()->id) === floatval(21)) {
                if ($request->motivoSelectIng == 7) {
                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo')->orderBy('clasificacion_id', 'asc', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 8) {
                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 21)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 9) {
                            $ticket = Ticket::buscar()->filterState()->where('especialista_id', 21)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc', 'tipo_mantencion')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 11) {
                                $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 21)->where('tipo_motivo_id', 8)->where('tipo_mantencion_id', 1)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc', 'tipo_mantencion')->paginate(20);
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {
                                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 21)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                    return $ticket;
                                } else {
                                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 21)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                    return $ticket;
                                }
                            }
                        }
                    }
                }
            }

            if (Auth::user()->id == 14) {
                if ($request->motivoSelectIng == 7) {
                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 8) {
                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 14)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 9) {
                            $ticket = Ticket::buscar()->filterState()->where('especialista_id', 14)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 11) {
                                $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 14)->where('tipo_motivo_id', 8)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {
                                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 14)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                    return $ticket;
                                } else {
                                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('especialista_id', 14)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                    return $ticket;
                                }
                            }
                        }
                    }
                }
            }

            if (floatval($RoleId) === floatval(5)) {

                ////

                /////////////BUSQUEDA DE CARGO TIPO ZONA
                $cargo = Cargo_user::where('id_user', Auth::user()->id)->count();
                if ($cargo == 0 || $cargo == null) {
                    $cargo  = 0;
                    $estado = 1;
                } else {
                    $cargo = Cargo_user::where('id_user', Auth::user()->id)->get();

                    foreach ($cargo as $c) {
                        $cargo_id = $c->id_cargo;
                    }
                }
                if ($cargo_id == 1) {
                    $zonaUser = Zona_user::where('user_id', Auth::user()->id)->get();

                    foreach ($zonaUser as $z) {
                        $zona = $z->zona_id;
                    }

                    $ticket = Ticket::buscar()->where('estado_id', '!=', 7)->where('zona_id', $zona)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'technologie')->orderBy('clasificacion_id', 'asc')->paginate(20);
                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 7) {
                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 8) {
                            $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 9) {
                                $ticket = Ticket::buscar()->filterState()->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                return $ticket;
                            } else {
                                if ($request->motivoSelectIng == 11) {
                                    $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);
                                } else {
                                    if (floatval($request->motivoSelectIng) === floatval(12)) {
                                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                        return $ticket;
                                    } else {
                                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                        return $ticket;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (floatval(Auth::user()->id) === floatval(12)) {

                if ($request->motivoSelectIng == 7) {
                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                        ->where('crm_id', '!=', 2)

                        ->where('crm_id', '!=', 3)
                        ->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 8) {
                        $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                            ->where('crm_id', '!=', 2)

                            ->where('crm_id', '!=', 3)
                            ->where('estado_id', $state)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 9) {
                            $ticket = Ticket::buscar()->filterState()->where('crm_id', '!=', 1)
                                ->where('crm_id', '!=', 2)

                                ->where('crm_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 10) {
                                $ticket = Ticket::buscar()->filterState()->where('crm_id', '!=', 1)
                                    ->where('crm_id', '!=', 2)

                                    ->where('crm_id', '!=', 3)->where('user_id', '!=', Auth::user()->id)->orderBy('estado_id', 'desc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                                return $ticket;
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {
                                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                                        ->where('crm_id', '!=', 2)

                                        ->where('crm_id', '!=', 3)
                                        ->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                                    return $ticket;
                                } else {
                                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('estado_id', $state)->where('crm_id', '!=', 1)
                                        ->where('crm_id', '!=', 2)

                                        ->where('crm_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                                    return $ticket;
                                }
                            }
                        }
                    }
                }
            }

            if (floatval(Auth::user()->id) === floatval(11)) {

                if ($request->motivoSelectIng == 7) {
                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                        ->where('crm_id', '!=', 2)
                        ->where('crm_id', '!=', 3)
                        ->where('crm_id', '!=', 4)->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 8) {
                        $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                            ->where('crm_id', '!=', 2)
                            ->where('crm_id', '!=', 3)
                            ->where('crm_id', '!=', 4)->where('estado_id', $state)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 9) {
                            $ticket = Ticket::buscar()->filterState()->orderBy('clasificacion_id', 'asc')->userCreada()->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 10) {
                                $ticket = Ticket::buscar()->filterState()->userCreada()->where('user_id', '!=', Auth::user()->id)->orderBy('estado_id', 'desc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                                return $ticket;
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(12)) {
                                    $ticket = Ticket::buscar()->orderBy('clasificacion_id', 'asc')->where('crm_id', '!=', 1)
                                        ->where('crm_id', '!=', 2)
                                        ->where('crm_id', '!=', 3)
                                        ->where('crm_id', '!=', 4)->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                                    return $ticket;
                                } else {
                                    $ticket = Ticket::buscar()->userCreada()->orderBy('clasificacion_id', 'asc')->where('estado_id', $state)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);

                                    return $ticket;
                                }
                            }
                        }
                    }
                }
            }
        } else {
            if (floatval($crm_id) === floatval(7) || floatval($RoleId) === floatval(16)) {

                if (floatval($request->motivoSelectIng) === floatval(7)) {
                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                    return $ticket;
                } else {
                    if (floatval($request->motivoSelectIng) === floatval(8)) {
                        $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $state)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                        return $ticket;
                    } else {
                        if (floatval($request->motivoSelectIng) === floatval(9)) {
                            $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->filterState()->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                            return $ticket;
                        } else {
                            if (floatval($request->motivoSelectIng) === floatval(10)) {
                                $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->filterState()->where('user_id', '!=', Auth::user()->id)->orderBy('estado_id', 'desc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                                return $ticket;
                            } else {
                                if (floatval($request->motivoSelectIng) === floatval(11)) {
                                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $state)->where('tipo_motivo_id', 8)->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                                    return $ticket;
                                } else {
                                    if (floatval($request->motivoSelectIng) === floatval(12)) {
                                        $ticket = Ticket::buscar()->where('estado_id', $state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20, ['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id']);
                                        return $ticket;
                                    } else {
                                        $ticket = Ticket::with([
                                            'user'                     => function ($query) {
                                                $query->select('id', 'name', 'apellido');
                                            },
                                            'area'                     => function ($query) {
                                                $query->select('id', 'descripcion');
                                            },
                                            'site'                     => function ($query) {
                                                $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id', 'classification_type_id', 'category_type_id', 'olt_3play');
                                            },
                                            'site.pop'                 => function ($query) {
                                                $query->select('id', 'comuna_id');
                                            },
                                            'site.pop.comuna'          => function ($query) {
                                                $query->select('id', 'zona_id');
                                            },
                                            'site.pop.comuna.zona'     => function ($query) {
                                                $query->select('id', 'crm_id', 'cod_zona');
                                            },
                                            'site.pop.comuna.zona.crm' => function ($query) {
                                                $query->select('id', 'nombre_crm');
                                            },
                                            'crm'                      => function ($query) {
                                                $query->select('id', 'nombre_crm');
                                            },
                                            'estado'                   => function ($query) {
                                                $query->select('id', 'descripcion', 'color');
                                            },
                                            'tipo_motivo'              => function ($query) {
                                                $query->select('id', 'descripcion');
                                            },
                                            'tipo_mantencion'          => function ($query) {
                                                $query->select('id', 'descripcion');
                                            },
                                            'technologie'              => function ($query) {
                                                $query->select('id', 'nem_tech');
                                            },
                                        ])->buscar()->where('estado_id', $state)->orderBy('clasificacion_id', 'asc')->paginate(20, ['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id']);
                                        return $ticket;
                                    }
                                }
                            }
                        }
                    }
                }
            } else {

                if ($request->motivoSelectIng == 7) {
                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);
                    return $ticket;
                } else {
                    if ($request->motivoSelectIng == 8) {
                        $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', '!=', 3)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);
                        return $ticket;
                    } else {
                        if ($request->motivoSelectIng == 9) {
                            $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->filterState()->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                            return $ticket;
                        } else {
                            if ($request->motivoSelectIng == 10) {
                                $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->filterState()->where('user_id', '!=', Auth::user()->id)->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('estado_id', 'desc')->paginate(20);

                                return $ticket;
                            } else {
                                if ($request->motivoSelectIng == 11) {
                                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->where('tipo_motivo_id', 8)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);
                                    return $ticket;
                                } else {
                                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id')->buscar()->where('estado_id', $state)->where('crm_id', $crm_id)->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'pep_available')->orderBy('clasificacion_id', 'asc')->paginate(20);

                                    return $ticket;
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($crm_id == 7 || $RoleId == 16) {
            return $this->ListTicketAdmin($request);
        }
    }

    public function ListTicketAdmin($request)
    {

        if (floatval($request->motivoSelectIng) === floatval(7)) {
            $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $request->state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2020')->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
            return $ticket;
        } else {
            if (floatval($request->motivoSelectIng) === floatval(8)) {
                $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $request->state)->where('tipo_motivo_id', '!=', 3)->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie')->paginate(20);
                return $ticket;
            } else {
                if (floatval($request->motivoSelectIng) === floatval(9)) {
                    $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id', 'pep_available_id')->buscar()->filterState()->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                    return $ticket;
                } else {
                    if (floatval($request->motivoSelectIng) === floatval(10)) {
                        $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->filterState()->where('user_id', '!=', Auth::user()->id)->orderBy('estado_id', 'desc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                        return $ticket;
                    } else {
                        if (floatval($request->motivoSelectIng) === floatval(11)) {
                            $ticket = Ticket::select('id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id')->buscar()->where('estado_id', $state)->where('tipo_motivo_id', 8)->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20);
                            return $ticket;
                        } else {
                            if (floatval($request->motivoSelectIng) === floatval(12)) {
                                $ticket = Ticket::buscar()->where('estado_id', $request->state)->where('tipo_motivo_id', 3)->where('tipo_mantencion_id', 1)->where('anio_mantencion', '2021')->orderBy('clasificacion_id', 'asc')->with('user', 'area', 'site.pop.comuna.zona.crm', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'technologie', 'pep_available')->paginate(20, ['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id']);
                                return $ticket;
                            } else {
                                $ticket = Ticket::with([
                                    'user'                     => function ($query) {
                                        $query->select('id', 'name', 'apellido');
                                    },
                                    'area'                     => function ($query) {
                                        $query->select('id', 'descripcion');
                                    },
                                    'site'                     => function ($query) {
                                        $query->select('id', 'nem_site', 'nombre', 'pop_id', 'site_type_id', 'classification_type_id', 'category_type_id', 'olt_3play');
                                    },
                                    'site.pop'                 => function ($query) {
                                        $query->select('id', 'comuna_id');
                                    },
                                    'site.pop.comuna'          => function ($query) {
                                        $query->select('id', 'zona_id');
                                    },
                                    'site.pop.comuna.zona'     => function ($query) {
                                        $query->select('id', 'crm_id', 'cod_zona');
                                    },
                                    'site.pop.comuna.zona.crm' => function ($query) {
                                        $query->select('id', 'nombre_crm');
                                    },
                                    'crm'                      => function ($query) {
                                        $query->select('id', 'nombre_crm');
                                    },
                                    'estado'                   => function ($query) {
                                        $query->select('id', 'descripcion', 'color');
                                    },
                                    'tipo_motivo'              => function ($query) {
                                        $query->select('id', 'descripcion');
                                    },
                                    'tipo_mantencion'          => function ($query) {
                                        $query->select('id', 'descripcion');
                                    },
                                    'technologie'              => function ($query) {
                                        $query->select('id', 'nem_tech');
                                    },
                                    'pep_available'            => function ($query) {
                                        $query->select('id', 'pep');
                                    },
                                ])->buscar()->where('estado_id', $request->state)->orderBy('clasificacion_id', 'asc')->paginate(20, ['id', 'site_id', 'area_id', 'crm_id', 'zona_id', 'clasificacion_id', 'tipo_motivo_id', 'fecha_compromiso', 'created_at', 'descripcion', 'estado_id', 'denuncia_id', 'fecha_inicio', 'trimestre', 'mantencion_data', 'tipo_mantencion_id', 'technologie_id', 'pep_available_id']);
                                return $ticket;
                            }
                        }
                    }
                }
            }
        }
    }
    public function LastTicketsCreated()
    {
        $ticket = Ticket::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);
        return $ticket;
    }

    public function getMantencion(Request $request, $id)
    {
        dd($request);
    }

    public function descriptionEdit(Request $request, $id)
    {
        $ticket              = Ticket::find($id);
        $ticket->descripcion = $request->descripcion;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . '    ' . 'la descripción se a editado.';
        $log->tipo_mensaje_id = 1;
        $log->user_id         = Auth::user()->id;
        $log->save();

        return;
    }

    public function editMotivoTicket(Request $request)
    {
        $ticket                 = Ticket::find($request->ticket_id);
        $ticket->tipo_motivo_id = $request->motivo_id;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . '    ' . 'el motivo fue editado.';
        $log->tipo_mensaje_id = 1;
        $log->user_id         = Auth::user()->id;
        $log->save();
        return;
    }

    public function TipoMotivo()
    {
        $motivo = Tipo_motivo::get();
        return $motivo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rechazo1(Request $request, $id)
    {

        $ticket                = Ticket::find($id);
        $ticket->old_id        = $ticket->estado_id;
        $ticket->estado_id     = 9;
        $ticket->subestado_id  = 1;
        $ticket->fecha_rechazo = Carbon::now();

        $ticket->save();

        $rechazo              = new Rechazo;
        $rechazo->ticket_id   = $id;
        $rechazo->user_id     = Auth::user()->id;
        $rechazo->descripcion = $request->input('descripcion');
        $rechazo->save();
        $log            = new Log;
        $log->ticket_id = $ticket->id;

        $log->descripcion = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Rechazado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "CREADO" a en "RECHAZADO INGENIERO"' . ' ' . 'MOTIVO:' . ' ' . $request->input('descripcion');
        $log->user_id     = Auth::user()->id;
        $log->tipo_mensaje_id = 1;
        $log->save();
        return;
    }
    public function aprobar1(Request $request, $id)
    {
        $fecha                    = $request->input('fechaCompromiso');
        $ticket                   = Ticket::find($id);
        $ticket->estado_id        = 2;
        $ticket->fecha_curso      = Carbon::now();
        $ticket->aprobador_id     = Auth::user()->id;
        $ticket->fecha_compromiso = $fecha;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->tipo_mensaje_id = 2;
        $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Aprobado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "BACKLOG" a en "CURSO"';
        $log->user_id         = Auth::user()->id;
        $log->save();
        return;
    }

    public function retroceso($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->estado_id == 4) {
            $ticket->estado_id = 3;
            $ticket->save();
            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->tipo_mensaje_id = 2;
            $log->descripcion     = 'El Ticket Nro' . ' ' . $ticket->id . ' ' . ' a sido modificado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio el Estado "FINALIZADO" a  "VALIDACION"';
            $log->user_id         = Auth::user()->id;
            $log->save();
        } else {
            if ($ticket->estado_id == 3) {
                $ticket->estado_id = 2;
                $ticket->save();
                $log                  = new Log;
                $log->ticket_id       = $ticket->id;
                $log->tipo_mensaje_id = 2;
                $log->descripcion     = 'El Ticket Nro' . ' ' . $ticket->id . ' ' . ' a sido modificado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio el Estado "VALIDACION" a  "EN CURSO"';
                $log->user_id         = Auth::user()->id;
                $log->save();
            } else {
                if ($ticket->estado_id == 2) {
                    $ticket->estado_id = 1;
                    $ticket->save();
                    $log                  = new Log;
                    $log->ticket_id       = $ticket->id;
                    $log->tipo_mensaje_id = 2;
                    $log->descripcion     = 'El Ticket Nro' . ' ' . $ticket->id . ' ' . ' a sido modificado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio el Estado "EN CURSO " a  "BACKLOG"';
                    $log->user_id         = Auth::user()->id;
                    $log->save();
                }
            }
        }
        return;
    }

    public function aprobar2(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->estado_id == 2) {
            $ticket->estado_id        = 3;
            $ticket->fecha_validacion = Carbon::now();
            $ticket->save();
            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->tipo_mensaje_id = 2;
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Aprobado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "CURSO" a  "VALIDACION"';
            $log->user_id         = Auth::user()->id;
            $log->save();
            return 1;
        } else {
            if ($ticket->estado_id == 3) {
                $solicitud = SolicitudSgc::where('ticket_id', $ticket->id)->count();
                if ($solicitud == 0) {
                    $ticket->estado_id        = 4;
                    $ticket->fecha_finalizada = Carbon::now();
                    $ticket->save();
                    $log                  = new Log;
                    $log->ticket_id       = $ticket->id;
                    $log->tipo_mensaje_id = 2;
                    $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Validada por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "VALIDACION" a  "FINALZADA"';
                    $log->user_id         = Auth::user()->id;
                    $log->save();
                    return 1;
                } else {
                    if ($solicitud != 0) {
                        $solicitud_estado = SolicitudSgc::where('ticket_id', $ticket->id)->get();
                        $comprobar_estado = 0;
                        foreach ($solicitud_estado as $s) {
                            if ($s->proceso_id == 13 && $s->subestado_id == 4) {
                                $comprobar_estado++;
                            }
                        }
                        if ($comprobar_estado == $solicitud) {
                            $ticket->estado_id        = 4;
                            $ticket->fecha_finalizada = Carbon::now();
                            $ticket->save();
                            $log                  = new Log;
                            $log->ticket_id       = $ticket->id;
                            $log->tipo_mensaje_id = 2;
                            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Validada por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "VALIDACION" a  "FINALZADA"';
                            $log->user_id         = Auth::user()->id;
                            $log->save();
                            return 1;
                        } else {
                            if ($comprobar_estado != $solicitud) {
                                return 2;
                            }
                        }
                    }
                }
            } else {
                if ($ticket->estado_id == 8) {
                    $ticket->estado_id = 1;

                    $ticket->save();
                    $log                  = new Log;
                    $log->ticket_id       = $ticket->id;
                    $log->tipo_mensaje_id = 2;
                    $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Validada por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "APROBACION ING OYM" a  "EN ESPERA"';
                    $log->user_id         = Auth::user()->id;
                    $log->save();

                    $notification              = new Notificacion;
                    $notification->user_id     = $ticket->user_id;
                    $notification->activo_id   = 1;
                    $notification->descripcion = 'El ticket nro°' . ' ' . $ticket->id . ' ' . 'a sido aprobado';
                    $notification->save();
                    return 1;
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
    public function updateticket()
    {
        $ticket = Ticket::get();
        foreach ($ticket as $t) {
            $area        = Area::find($t->area_id);
            $user        = User::find($t->user_id);
            $tipo_motivo = Tipo_motivo::find($t->tipo_motivo_id);
            $site        = Site::find($t->site_id);
            $tkc         = Ticket::find($t->id);
            if ($tkc->tipo_mantencion_id == 1) {
                $tkc->identificador_ticket = $tipo_motivo->siglas . 'RC' . '-' . $tkc->id . '.' . strtoupper(substr($site->nem_site, 0, 3)) . $site->classification_type->classification_type;
            } else {
                $tkc->identificador_ticket = $tipo_motivo->siglas . '-' . $tkc->id . '.' . strtoupper(substr($site->nem_site, 0, 3)) . $site->classification_type->classification_type;
            }
            $tkc->save();
        }
    }
    public function store(Request $request)
    {

        try {

            $solicitud_psa = 0;
            $tipo_motivo   = Tipo_motivo::find($request->motivo);
            $ticket        = new Ticket;

            $descripcion = request('descripcion');
            $cantidad    = request('cantidad');
            $area_id     = (int) request('area');
            $tecnica_id  = (int) request('tecnica');
            $equipo_id   = (int) request('equipo');
            $motivo      = (int) request('motivo');

            $cargo = Cargo_user::where('id_user', Auth::user()->id)->count();

            if ($cargo == 0 || $cargo == null) {
                $cargo_id = 0;
                $estado   = 1;
            } else {
                $cargo = Cargo_user::where('id_user', Auth::user()->id)->get();

                foreach ($cargo as $c) {
                    $cargo_id = $c->id_cargo;
                }

                if ($cargo_id == 1) {
                    $estado = 8;
                } else {
                    if ($cargo_id == 2) {
                        $estado = 8;
                    } else {

                        $estado = 1;
                    }
                }
            }

            if ($area_id == null) {
                $area_id = null;
            }
            if ($tecnica_id == null) {
                $tecnica_id = null;
            }

            if ($equipo_id == null) {
                $equipo_id = null;
            }

            //TRANFORMACION DE DATOS DEL SITIO
            if (request('pop') != null) {

                //BUSQUEDA DEL POP Y LUEGO DEL CRM
                $site                = Site::find(request('pop'));
                $site_id             = request('pop');
                $crm                 = $site->pop->comuna->zona->crm->id;
                $zonaId              = $site->pop->comuna->zona->id;
                $classification_type = $site->classification_type_id;

                /////////////////////////////
            } else {
                if ($request->tech_id != null) {
                    $tecnologia          = Technologies::find($request->tech_id);
                    $site_id             = $tecnologia->site_id;
                    $site                = Site::find($tecnologia->site_id);
                    $crm                 = $site->pop->comuna->zona->crm->id;
                    $zonaId              = $site->pop->comuna->zona->id;
                    $classification_type = $site->classification_type_id;
                } else {
                    $site_id             = null;
                    $zonaId              = null;
                    $classification_type = null;
                    $crm                 = null;
                }
            }

            //CREACION DEL TICKECT
            $ticket->site_id          = $site_id;
            $ticket->technologie_id   = $request->tech_id;
            $ticket->area_id          = $area_id;
            $ticket->tecnica_id       = $tecnica_id;
            $ticket->equipo_id        = $equipo_id;
            $ticket->tipo_motivo_id   = $motivo;
            $ticket->zona_id          = $zonaId;
            $ticket->crm_id           = $crm;
            $ticket->clasificacion_id = $site->classification_type_id;
            $ticket->descripcion      = $descripcion;
            if ($request->motivo == 1 || $request->motivo == 7) {
                $ticket->denuncia_id = 1;
            }
            if (request('mantencion') != null) {
                if (request('mantencion') == 1) {
                    $ticket->tipo_mantencion_id = request('mantencion');
                    $ticket->trimestre          = 1;
                    $ticket->anio_mantencion    = '2021';
                } else {
                    $ticket->tipo_mantencion_id = request('mantencion');
                }
            }
            if ($motivo == 8) {
                $ticket->activo_id           = (int) $request->activo_id;
                $ticket->descripcion_activo  = $request->desc_activo;
                $ticket->cod_sap             = $request->cod_sap;
                $ticket->cantidad_activo     = (int) $request->cant_activo_resago;
                $ticket->fecha_puesta_marcha = $request->fecha_puesta_marcha;
                $ticket->valor_estimado      = (int) $request->valor_estimado;
                $ticket->pep_resago          = $request->pep;
                $ticket->ework               = $request->ework;
            }
            $ticket->cantidad_equipo = $cantidad;
            $ticket->estado_id       = $estado;
            $ticket->user_id         = Auth::user()->id;
            if (Auth::user()->id == 14) {
                $ticket->especialista_id = 14;
            }
            if (Auth::user()->id == 21) {
                $ticket->especialista_id = 21;
            }

            $ticket->save();
            //CREACIÓN SOLICITUD PSA
            if ($ticket->tecnica_id == 5 || $request->need_batery == 1) {
                $psa_request = new PsaSolicitud;

                $psa_request->activo_id    = 1;
                $psa_request->total_activo = $request->total_batery;

                if ($ticket->tipo_motivo_id == 2 || $ticket->tipo_motivo_id == 6 || $ticket->tipo_motivo_id == 9) {
                    $psa_request->motivo_id = 1;
                } else {
                    if ($ticket->tipo_motivo_id == 1 || $ticket->tipo_motivo_id == 7) {
                        $psa_request->motivo_id = 2;
                    }
                }
                $psa_request->estado_id    = 1;
                $psa_request->subestado_id = 14;
                $psa_request->descripcion  = $ticket->descripcion;
                $psa_request->ticket_id    = $ticket->id;
                $psa_request->site_id      = $ticket->site_id;
                $psa_request->crm_id       = $ticket->crm_id;
                $psa_request->flujo_simple = $request->flujo_simple;
                $psa_request->user_id      = Auth::user()->id;
                $psa_request->save();
                $solicitud_psa = $psa_request->id;
            }
            /////////////////////////////////////

            ///////////////

            //$exploded = explode(',', $request->imagen);
            //$decode=base64_decode($exploded[1]);
            //if(str_contains($exploded[0],'jpeg')){
            //$extension = 'jpeg';
            //}else{
            //$extension = 'png';
            //}
            //$filename = str_random().'.'.$extension;
            //$path='archivos'.'/'.$extension;
            //file_put_contents($path, $decode);

            $destinationPath = 'archivos';
            $files           = $request->file('cotizacion');

            if ($files != null) {
                $a = 0;
                foreach ($files as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = 'Cotizacion';
                    $tipo   = 1;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo = new Archivo;
                    if ($request->cotizacion_name_select == $filename) {
                        $archivo->cotizacion_select = 1;
                    }
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();

                    $ticket->cotizacion = 1;
                    $ticket->save();
                }
            }

            $lpu = $request->file('lpu');

            if ($lpu != null) {
                $a = 0;
                foreach ($lpu as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = 'LPU';
                    $tipo   = 6;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();
                }
            }

            $checklist = $request->file('checklist');

            if ($checklist != null) {
                $a = 0;
                foreach ($checklist as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = $filename;
                    $tipo   = 14;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();
                }
            }

            $pxq = $request->file('pxq');

            if ($pxq != null) {
                $a = 0;
                foreach ($pxq as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = 'PXQ';
                    $tipo   = 11;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();
                    $ticket->pxq = 1;
                    $ticket->save();
                }
            }

            $informefotografico = $request->file('informefotografico');

            if ($informefotografico != null) {
                $a = 0;
                foreach ($informefotografico as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = $filename;
                    $tipo   = 12;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();
                }
            }

            $docdenuncia = $request->file('docdenuncia');

            if ($docdenuncia != null) {
                $a = 0;
                foreach ($docdenuncia as $file) {
                    $a++;
                    $filename  = $file->getClientOriginalname();
                    $extension = $file->getClientOriginalExtension();

                    $nombre = $filename;
                    $tipo   = 13;

                    $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                    if ($tipoArchivo != 0) {
                        $a = $tipoArchivo + 1;
                    }
                    $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                    $upload_success = $file->move($destinationPath, $filenames);

                    $archivo                  = new Archivo;
                    $archivo->nombre_archivo  = $filenames;
                    $archivo->ticket_id       = $ticket->id;
                    $archivo->tipo_archivo_id = $tipo;
                    $archivo->extension       = $extension;
                    if ($extension == 'xls' || $extension == 'xlsx') {
                        $archivo->icono_archivo = "/logosEntel/exel.png";
                    } else {
                        if ($extension == 'doc' || $extension == 'docx') {
                            $archivo->icono_archivo = "/logosEntel/doc3.png";
                        } else {
                            if ($extension == 'pdf' || $extension == 'PDF') {
                                $archivo->icono_archivo = "/logosEntel/nuevopdf2.png";
                            } else {
                                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                                    $archivo->numero        = $a;
                                    $archivo->icono_archivo = "/logosEntel/img2.png";
                                }
                            }
                        }
                    }

                    $archivo->save();
                }
            }

            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Creado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 2;
            $log->save();

            $data = [
                'ticket_id'        => $ticket->id,
                'solicitud_psa_id' => $solicitud_psa,
            ];
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function createTicketCnt(Request $request)
    {

        $site                = Site::find($request->site_id);

        $ticket = new Ticket;
        $ticket->site_id = $request->site_id;
        $ticket->tipo_motivo_id = $request->tipo_motivo_id;
      
        $ticket->tipo_mantencion_id = $request->tipo_mantencion_id;
        

        $ticket->descripcion = $request->descripcion;
        $ticket->area_id = $request->area_id;
        $ticket->tecnica_id = $request->tecnica_id;
        $ticket->equipo_id = $request->equipo_id;
        $ticket->estado_id = $request->estado_id;
        $ticket->zona_id          = $site->pop->comuna->zona->id;
        $ticket->crm_id           = $site->pop->comuna->zona->crm->id;;
        $ticket->clasificacion_id = $site->classification_type_id;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();


        $destinationPath = 'archivos';
        $files           = $request->file('cotizacion');

        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {
                $a++;
                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $nombre = 'Cotizacion';
                $tipo   = 1;

                $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', $tipo)->count();
                if ($tipoArchivo != 0) {
                    $a = $tipoArchivo + 1;
                }
                $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                $file->move($destinationPath, $filenames);

                $archivo = new Archivo;
                $archivo->nombre_archivo  = $filenames;
                $archivo->ticket_id       = $ticket->id;
                $archivo->tipo_archivo_id = 1;
                $archivo->extension       = $extension;
                $archivo->icono_archivo = $extension == 'xls' || $extension == 'xlsx' ? '/logosEntel/exel.png' : ($extension == 'doc' || $extension == 'docx' ? '/logosEntel/doc3.png' : ($extension == 'pdf' || $extension == 'PDF' ? '/logosEntel/nuevopdf2.png' : ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG' ? '/logosEntel/img2.png' : '')));

                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                    $archivo->numero        = $a;
                }

                $archivo->save();

                $ticket->cotizacion = 1;
                $ticket->save();
            }
        }
        $files           = $request->file('validacion_compra');
        if ($files != null) {
            $a = 0;
            foreach ($files as $file) {
                $a++;
                $filename  = $file->getClientOriginalname();
                $extension = $file->getClientOriginalExtension();

                $nombre = 'validacion_compra';


                $tipoArchivo = Archivo::where('ticket_id', $ticket->id)->where('tipo_archivo_id', 17)->count();
                if ($tipoArchivo != 0) {
                    $a = $tipoArchivo + 1;
                }
                $filenames = $ticket->id . '_' . $nombre . '(' . $a . ')' . '.' . $extension;

                $file->move($destinationPath, $filenames);

                $archivo = new Archivo;
                $archivo->nombre_archivo  = $filenames;
                $archivo->ticket_id       = $ticket->id;
                $archivo->tipo_archivo_id = 17;
                $archivo->extension       = $extension;
                $archivo->icono_archivo = $extension == 'xls' || $extension == 'xlsx' ? '/logosEntel/exel.png' : ($extension == 'doc' || $extension == 'docx' ? '/logosEntel/doc3.png' : ($extension == 'pdf' || $extension == 'PDF' ? '/logosEntel/nuevopdf2.png' : ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG' ? '/logosEntel/img2.png' : '')));

                if ($extension == 'img' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'JPG' || $extension == 'PNG' || $extension == 'IMG' || $extension == 'JPEG') {
                    $archivo->numero        = $a;
                }

                $archivo->save();
            }
        }
        $message = "Ticket número " .$ticket->id. " creado.";
        return $message;
    }

    public function addTarea(Request $request, $id)
    {
        $ticket                   = Ticket::find($id);
        $ticket->nro_tarea_office = $request->tarea;
        $ticket->save();
        $log                  = new Log;
        $log->ticket_id       = $ticket->id;
        $log->tipo_mensaje_id = 2;
        $log->descripcion     = 'Número de tarea ingresado:' . ' ' . request('tarea');
        $log->user_id         = Auth::user()->id;
        $log->save();
        return;
    }

    public function reenvio(Request $request, $id)
    {

        $ticket = Ticket::find($id);
        if ($ticket->old_id == 1) {
            $ticket->estado_id    = 1;
            $ticket->subestado_id = null;

            $ticket->save();

            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Reenviado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "RECHAZADO" a  "CREADO"';
            $log->tipo_mensaje_id = 2;
            $log->user_id         = Auth::user()->id;
            $log->save();
            return;
        } else {
            if ($ticket->old_id == 3) {
                $ticket->estado_id    = 3;
                $ticket->subestado_id = null;

                $ticket->save();

                $log                  = new Log;
                $log->ticket_id       = $ticket->id;
                $log->tipo_mensaje_id = 2;
                $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Reenviado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "RECHAZADO" a  "VALIDACION"';
                $log->user_id         = Auth::user()->id;
                $log->save();
                return;
            } else {
                if ($ticket->old_id == 2) {
                    $ticket->estado_id = 2;
                }

                $ticket->subestado_id = null;
                $ticket->save();

                $log                  = new Log;
                $log->ticket_id       = $ticket->id;
                $log->tipo_mensaje_id = 2;
                $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Reenviado por' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido . ' ' . 'Cambio de Estado "RECHAZADO" a en "CURSO"';
                $log->user_id         = Auth::user()->id;
                $log->save();
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
    public function crm($id)
    {
        $idusr = Auth::user()->id;

        $id_crm       = (int) substr($id, 0, 1);
        $modulo       = (int) substr($id, -1);
        $inputaciones = Inputacion::get();

        if ($idusr == 21) {

            //CANTIDAD DE TICKET POR ESTADO
            $backlog    = Ticket::buscar()->where('estado_id', 1)->where('crm_id', $id_crm)->where('especialista_id', 21)->count();
            $curso      = Ticket::buscar()->where('estado_id', 2)->where('crm_id', $id_crm)->where('especialista_id', 21)->count();
            $finalizada = Ticket::buscar()->where('estado_id', 4)->where('crm_id', $id_crm)->where('especialista_id', 21)->count();

            //CANTIDAD DE TICKET POR CRM
            $norte         = Ticket::where('crm_id', 1)->where('especialista_id', 21)->count();
            $centronorte   = Ticket::where('crm_id', 2)->where('especialista_id', 21)->count();
            $metropolitano = Ticket::where('crm_id', 3)->where('especialista_id', 21)->count();
            $centrosur     = Ticket::where('crm_id', 4)->where('especialista_id', 21)->count();
            $sur           = Ticket::where('crm_id', 5)->where('especialista_id', 21)->count();
            $austral       = Ticket::where('crm_id', 6)->where('especialista_id', 21)->count();
            //TICKETS
            $ticket      = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 21)->where('estado_id', 1)->get();
            $ticketcurso = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 21)->where('estado_id', 2)->get();
            $ticketfin   = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 21)->where('estado_id', 4)->get();
            if ($id_crm == 1) {
                $nombrecrm = 'NORTE';
                $crm       = 1;
            }
            if ($id_crm == 2) {
                $nombrecrm = 'CENTRO NORTE';
                $crm       = 2;
            }
            if ($id_crm == 3) {
                $nombrecrm = 'METROPOLITANO';
                $crm       = 3;
            }
            if ($id_crm == 4) {
                $nombrecrm = 'CENTRO SUR';
                $crm       = 4;
            }
            if ($id_crm == 5) {
                $nombrecrm = 'SUR';
                $crm       = 5;
            }
            if ($id_crm == 6) {
                $nombrecrm = 'AUSTRAL';
                $crm       = 6;
            }
            $cod_crm = $id_crm;

            return view('crm.index', compact('backlog', 'curso', 'crm', 'finalizada', 'norte', 'centronorte', 'metropolitano', 'centrosur', 'sur', 'austral', 'nombrecrm', 'ticket', 'ticketcurso', 'ticketfin', 'cod_crm', 'modulo', 'inputaciones'));
        }

        if ($idusr == 14) {

            //CANTIDAD DE TICKET POR ESTADO
            $backlog    = Ticket::buscar()->where('estado_id', 1)->where('crm_id', $id_crm)->where('especialista_id', 14)->count();
            $curso      = Ticket::buscar()->where('estado_id', 2)->where('crm_id', $id_crm)->where('especialista_id', 14)->count();
            $finalizada = Ticket::buscar()->where('estado_id', 4)->where('crm_id', $id_crm)->where('especialista_id', 14)->count();

            //CANTIDAD DE TICKET POR CRM
            $norte         = Ticket::where('crm_id', 1)->where('especialista_id', 14)->count();
            $centronorte   = Ticket::where('crm_id', 2)->where('especialista_id', 14)->count();
            $metropolitano = Ticket::where('crm_id', 3)->where('especialista_id', 14)->count();
            $centrosur     = Ticket::where('crm_id', 4)->where('especialista_id', 14)->count();
            $sur           = Ticket::where('crm_id', 5)->where('especialista_id', 14)->count();
            $austral       = Ticket::where('crm_id', 6)->where('especialista_id', 14)->count();
            //TICKETS
            $ticket      = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 14)->where('estado_id', 1)->get();
            $ticketcurso = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 14)->where('estado_id', 2)->get();
            $ticketfin   = Ticket::buscar()->where('crm_id', $id_crm)->where('especialista_id', 14)->where('estado_id', 4)->get();
            if ($id_crm == 1) {
                $nombrecrm = 'NORTE';
                $crm       = 1;
            }
            if ($id_crm == 2) {
                $nombrecrm = 'CENTRO NORTE';
                $crm       = 2;
            }
            if ($id_crm == 3) {
                $nombrecrm = 'METROPOLITANO';
                $crm       = 3;
            }
            if ($id_crm == 4) {
                $nombrecrm = 'CENTRO SUR';
                $crm       = 4;
            }
            if ($id_crm == 5) {
                $nombrecrm = 'SUR';
                $crm       = 5;
            }
            if ($id_crm == 6) {
                $nombrecrm = 'AUSTRAL';
                $crm       = 6;
            }
            $cod_crm = $id_crm;

            return view('crm.index', compact('backlog', 'curso', 'crm', 'finalizada', 'norte', 'centronorte', 'metropolitano', 'centrosur', 'sur', 'austral', 'nombrecrm', 'ticket', 'ticketcurso', 'ticketfin', 'cod_crm', 'modulo', 'inputaciones'));
        }

        //CANTIDAD DE TICKET POR ESTADO
        $backlog    = Ticket::buscar()->where('estado_id', 1)->where('crm_id', $id_crm)->count();
        $curso      = Ticket::buscar()->where('estado_id', 2)->where('crm_id', $id_crm)->count();
        $finalizada = Ticket::buscar()->where('estado_id', 4)->where('crm_id', $id_crm)->count();

        //CANTIDAD DE TICKET POR CRM
        $norte         = Ticket::where('crm_id', 1)->count();
        $centronorte   = Ticket::where('crm_id', 2)->count();
        $metropolitano = Ticket::where('crm_id', 3)->count();
        $centrosur     = Ticket::where('crm_id', 4)->count();
        $sur           = Ticket::where('crm_id', 5)->count();
        $austral       = Ticket::where('crm_id', 6)->count();
        //TICKETS
        $ticket      = Ticket::buscar()->where('crm_id', $id_crm)->where('estado_id', 1)->get();
        $ticketcurso = Ticket::buscar()->where('crm_id', $id_crm)->where('estado_id', 2)->get();
        $ticketfin   = Ticket::buscar()->where('crm_id', $id_crm)->where('estado_id', 4)->get();
        if ($id_crm == 1) {
            $nombrecrm = 'NORTE';
            $crm       = 1;
        }
        if ($id_crm == 2) {
            $nombrecrm = 'CENTRO NORTE';
            $crm       = 2;
        }
        if ($id_crm == 3) {
            $nombrecrm = 'METROPOLITANO';
            $crm       = 3;
        }
        if ($id_crm == 4) {
            $nombrecrm = 'CENTRO SUR';
            $crm       = 4;
        }
        if ($id_crm == 5) {
            $nombrecrm = 'SUR';
            $crm       = 5;
        }
        if ($id_crm == 6) {
            $nombrecrm = 'AUSTRAL';
            $crm       = 6;
        }
        $cod_crm = $id_crm;

        return view('crm.index', compact('backlog', 'curso', 'crm', 'finalizada', 'norte', 'centronorte', 'metropolitano', 'centrosur', 'sur', 'austral', 'nombrecrm', 'ticket', 'ticketcurso', 'ticketfin', 'cod_crm', 'modulo', 'inputaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDataPsa($id)
    {
        $solicitud = PsaSolicitud::where('ticket_id', $id)->with('site.pop.comuna.region', 'oficina', 'activo', 'capacidad', 'marca', 'estado', 'subestado', 'almacen', 'codSap', 'motivo', 'user', 'crm')->get();
        return $solicitud;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (request('id') != null) {
            $id = request('id');
        }
        $tipoArchivos = Tipo_archivo::get();

        $listing      = Listing::get();
        $mantenciones = Mantencion::get();
        $mantencion1  = Mantencion_realizada::where('mantencion_id', 1)->where('ticket_id', $id)->count();
        if (floatval($mantencion1) === floatval(1)) {
            $Menergia = Mantencion_realizada::where('mantencion_id', 1)->where('ticket_id', $id)->get();
        } else {
            $Menergia = null;
        }
        $mantencion2 = Mantencion_realizada::where('mantencion_id', 2)->where('ticket_id', $id)->count();
        if (floatval($mantencion2) === floatval(1)) {
            $Mclima = Mantencion_realizada::where('mantencion_id', 2)->where('ticket_id', $id)->get();
        } else {
            $Mclima = null;
        }

        $mantencion3 = Mantencion_realizada::where('mantencion_id', 3)->where('ticket_id', $id)->count();
        if (floatval($mantencion3) === floatval(1)) {
            $Meegg = Mantencion_realizada::where('mantencion_id', 3)->where('ticket_id', $id)->get();
        } else {
            $Meegg = null;
        }

        $rol = role_user::where('user_id', Auth::user()->id)->get();
        foreach ($rol as $r) {
            $RolId = $r->role_id;
        }

        $permisos = Permiso_rol::where('role_id', $RolId)->get();
        $ticket   = Ticket::where('id', $id)->with('user', 'area', 'tecnica', 'equipo', 'site.pop.comuna.zona', 'crm', 'estado', 'tipo_motivo', 'tipo_mantencion', 'inputacion')->first();

        $bitacora = Log::where('ticket_id', $id)->where('tipo_mensaje_id', 1)->with('user')->orderBy('id', 'desc')->get();

        $tps      = Ticket_tp::where('ticket_id', $id)->get();
        $archivos = Archivo::where('ticket_id', $id)->get();
        $pep      = Peps::where('pep', $ticket->nro_imputacion)->with('estado')->first();

        return view('ticket.show', compact('ticket', 'listing', 'tipoArchivos', 'mantenciones', 'mantencion1', 'Menergia', 'mantencion2', 'mantencion3', 'Mclima', 'Meegg', 'permisos', 'id', 'bitacora', 'tps', 'archivos', 'pep'));
    }

    public function check($id, $select)
    {

        $array = explode(",", $select);

        if (isset($array)) {
            foreach ($array as $c) {
                $revision = Listing_ticket::where('ticket_id', $id)->where('listing_id', $c)->count();
                if ($revision == 0) {
                    $listing_ticket             = new Listing_ticket;
                    $listing_ticket->ticket_id  = $id;
                    $listing_ticket->listing_id = $c;
                    $listing_ticket->user_id    = Auth::user()->id;
                    $listing_ticket->save();

                    $list = Listing::find($c);

                    $log                  = new Log;
                    $log->ticket_id       = $id;
                    $log->tipo_mensaje_id = 2;

                    $log->descripcion = 'Ticket Nro' . ' ' . $id . '    ' . 'Tarea' . ' ' . $list->descripcion . ' ' . 'Ejecutada';
                    $log->user_id     = Auth::user()->id;
                    $log->save();
                }
            }
        }

        return;
    }

    public function psaRequestTicket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        $solicitud = new PsaSolicitud;

        $site = Site::find($ticket->site_id);

        $solicitud->crm_id  = $site->pop->comuna->zona->crm->id;
        $solicitud->zona_id = $site->pop->comuna->zona->id;

        ////////////////////////////////////
        $solicitud->site_id               = $ticket->site_id;
        $solicitud->activo_id             = $request->activo;
        $solicitud->total_activo          = $request->total_activo;
        $solicitud->descripcion           = $request->descripcion;
        $solicitud->motivo_id             = $request->motivo;
        $solicitud->ticket_id             = $request->ticket_id;
        $solicitud->prioridad_solicitante = $request->prioridad;
        $solicitud->flujo_simple          = $request->flujo_simple;

        $solicitud->estado_id    = 1;
        $solicitud->subestado_id = 14;

        //////////////////////////////////////////////////////////
        $solicitud->user_id = Auth::user()->id;
        $solicitud->save();

        $id                = $solicitud->id;
        $log               = new LogPsa;
        $log->solicitud_id = $solicitud->id;
        $log->user_id      = Auth::user()->id;
        $log->descripcion  = 'Solicitud Nro' . ' ' . $solicitud->id . ' de activos creada  ';
        $log->save();

        $log_ticket                  = new Log;
        $log_ticket->ticket_id       = $ticket->id;
        $log_ticket->tipo_mensaje_id = 1;
        $log_ticket->descripcion     = 'Solicitud de activos nro°' . ' ' . $solicitud->id . ' ' . 'creada.';
        $log_ticket->user_id         = Auth::user()->id;
        $log_ticket->save();

        return $solicitud->id;
    }
}
