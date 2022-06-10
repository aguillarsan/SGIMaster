<?php

namespace App\Http\Controllers;

use App\Actividades;
use App\Cambio_sitio;
use App\Log_ingenieria;
use App\Responsable_ing;
use App\role_user;
use App\Room;
use App\Site;
use App\Subgerencia;
use App\Subproceso;
use App\Supervisor;
use App\ticket_equipo;
use App\Ticket_ingenieria;
use App\Ticket_ingenieria_tp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IngenieriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ingIndx()
    {
        $rol = role_user::where('user_id', Auth::user()->id)->get(['role_id']);

        foreach ($rol as $r) {
            $role = $r->role_id;
        }

        if ($role == 29) {
            $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->where('user_id', Auth::user()->id)->count();
            $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->where('user_id', Auth::user()->id)->count();

        }

        if ($role == 10) {
            $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
            $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

        } else {
            if ($role == 26) {

                $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->where('user_id', Auth::user()->id)->count();
                $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->where('user_id', Auth::user()->id)->count();

            } else {
                if ($role == 14) {

                    $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
                    $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

                } else {
                    if ($role == 1) {
                        $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
                        $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

                    }
                }
            }
        }

        return view('ingenieria.index', compact('role', 'total_ticket_conexion', 'total_ticket_grandes_proyectos'));

    }

    public function getTotalesTipoTicket()
    {
        $rol = role_user::where('user_id', Auth::user()->id)->first();

        if ($rol->role_id == 29) {
            $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->where('user_id', Auth::user()->id)->count();
            $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->where('user_id', Auth::user()->id)->count();

        }

        if ($rol->role_id == 10) {
            $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
            $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

        } else {
            if ($rol->role_id == 26) {

                $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->where('user_id', Auth::user()->id)->count();
                $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->where('user_id', Auth::user()->id)->count();

            } else {
                if ($rol->role_id == 14) {

                    $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
                    $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

                } else {
                    if ($rol->role_id == 1) {
                        $total_ticket_conexion          = Ticket_ingenieria::where('tipo_ticket_id', 1)->count();
                        $total_ticket_grandes_proyectos = Ticket_ingenieria::where('tipo_ticket_id', 2)->count();

                    }
                }
            }
        }
        $data = [
            'total_ticket_conexion'          => $total_ticket_conexion,
            'total_ticket_grandes_proyectos' => $total_ticket_grandes_proyectos,

        ];
        return response()->json($data);
    }
    public function index(Request $request)
    {
        $rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get(['role_id']);

        foreach ($rol as $r) {
            $RoleId = $r->role_id;
        }

        if ($RoleId == 29) {
            $solicitudes = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->where('tipo_ticket_id', $request->tipo_ticket)->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->orderBy('id', 'desc')->paginate(20);
            return $solicitudes;
        }

        if ($RoleId == 10) {
            $solicitudes = Ticket_ingenieria::buscar()->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
            return $solicitudes;
        } else {
            if ($RoleId == 26) {
                if ($request->state == 4) {
                    $solicitudes = Ticket_ingenieria::buscar()->where('proceso_id', 2)->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
                    return $solicitudes;
                } else {
                    if ($request->state == 5) {
                        $solicitudes = Ticket_ingenieria::buscar()->where('subproceso_id', 5)->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
                        return $solicitudes;
                    } else {
                        $solicitudes = Ticket_ingenieria::buscar()->where('user_id', Auth::user()->id)->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->orderBy('id', 'desc')->where('tipo_ticket_id', $request->tipo_ticket)->paginate(20);
                        return $solicitudes;
                    }

                }

            } else {
                if ($RoleId == 14) {

                    if ($request->state == 14) {

                        $solicitudes = Ticket_ingenieria::buscar()->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
                        return $solicitudes;
                    } else {
                        if ($request->state == 15) {
                            $solicitudes = Ticket_ingenieria::buscar()->where('subproceso_id', 7)->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
                            return $solicitudes;
                        }
                    }

                } else {
                    if ($RoleId == 1) {
                        $solicitudes = Ticket_ingenieria::buscar()->with('room', 'user', 'pop', 'proceso', 'subproceso', 'site')->where('tipo_ticket_id', $request->tipo_ticket)->orderBy('id', 'desc')->paginate(20);
                        return $solicitudes;
                    }
                }
            }
        }

    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response


 */

    public function registrarProveedor(Request $request)
    {
        $ticket_ingenieria               = Ticket_ingenieria::find($request->ticket_id);
        $ticket_ingenieria->proveedor_id = $request->proveedor_id;
        $ticket_ingenieria->save();
        return;
    }
    public function FinalizarSlcIng($id)
    {
        $ticket_ingenieria                = Ticket_ingenieria::find($id);
        $ticket_ingenieria->proceso_id    = 4;
        $ticket_ingenieria->subproceso_id = 7;
        $ticket_ingenieria->save();

        $log              = new Log_ingenieria;
        $log->ticket_id   = $id;
        $log->descripcion = 'Ticket Finalizado.';
        $log->user_id     = Auth::user()->id;
        $log->save();
        return;

    }

    public function getSubgerencia()
    {
        $subgerencias = Subgerencia::get();
        return response()->json($subgerencias);
    }

    public function getResponsable(Request $request)
    {
        $responsables = Responsable_ing::where('subgerencia_id', $request->subgerencia_id)->get();
        return response()->json($responsables);
    }

    public function moreInfo(Request $request)
    {
        $ticket_ingenieria                = Ticket_ingenieria::find($request->id);
        $ticket_ingenieria->proceso_id    = 2;
        $ticket_ingenieria->subproceso_id = 8;
        $ticket_ingenieria->save();

        $log              = new Log_ingenieria;
        $log->ticket_id   = $id;
        $log->descripcion = 'Se solicita la siguiente información:' . ' ' . $request->descripcion;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;

    }

    public function AprobarTicketIng($id)
    {
        $ticket_ingenieria = Ticket_ingenieria::find($id);

        if ($ticket_ingenieria->proceso_id == 1 && $ticket_ingenieria->subproceso_id == 1) {
            $ticket_ingenieria->proceso_id    = 1;
            $ticket_ingenieria->subproceso_id = 2;
            $ticket_ingenieria->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $id;
            $log->descripcion = 'Factibilidad  positiva.';
            $log->user_id     = Auth::user()->id;
            $log->save();
            return;
        }
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {

        try {

            $ticket_ingenieria                       = new Ticket_ingenieria;
            $ticket_ingenieria->site_id              = $request->site_id;
            $ticket_ingenieria->room_id              = $request->room;
            $ticket_ingenieria->responsable_id       = $request->responsable_id;
            $ticket_ingenieria->nombre_proyecto      = $request->nombre_proyecto;
            $ticket_ingenieria->user_id              = Auth::user()->id;
            $ticket_ingenieria->proceso_id           = 1;
            $ticket_ingenieria->subproceso_id        = 1;
            $ticket_ingenieria->subgerencia_id       = $request->subgerencia_id;
            $ticket_ingenieria->fecha_implementacion = $request->fecha_implementacion;
            $ticket_ingenieria->cantidad_equipo      = $request->cantidad_equipo;
            $ticket_ingenieria->cantidad_rack        = $request->cantidad_rack;
            $ticket_ingenieria->potencia_proyecto    = $request->potencia_proyecto;
            $ticket_ingenieria->tipo_ticket_id       = $request->tipo_ticket_id;
            $ticket_ingenieria->coordernada_sala     = $request->coordenada_sala;
            $ticket_ingenieria->comentario           = $request->comentario_coordenada_sala;
            $ticket_ingenieria->tipo_rack_id         = $request->tipo_rack;
            $ticket_ingenieria->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $ticket_ingenieria->id;
            $log->descripcion = 'Ticket creado';
            $log->user_id     = Auth::user()->id;
            $log->save();

            return $ticket_ingenieria->id;

        } catch (Exception $e) {
            return $e;
        }

    }
    public function setEquiposIngSolicitud(Request $request)
    {
        try {
            $equipos                             = new ticket_equipo;
            $equipos->equipo                     = $request->equipo;
            $equipos->item                       = $request->equipo;
            $equipos->caracteristica_dispositivo = $request->caracteristica_equipo;
            $equipos->voltaje_id                 = $request->voltaje_id;
            $equipos->potencia_real              = $request->potencia_real;
            $equipos->tipo_fuente_id             = $request->tipo_fuente_id;
            $equipos->cantidad_fuente            = $request->cantidad_fuente;
            $equipos->capacidad_disyuntor        = $request->capacidad_disyutor;
            $equipos->cable_interno              = $request->cable_interno;
            $equipos->ticket_id                  = $request->solicitud_id;
            $equipos->save();
            return;

        } catch (Exception $e) {
            return $e;
        }

    }

    public function editarFechaEjecucion(Request $request)
    {
        $tp = Ticket_ingenieria_tp::find($request->tp_id);

        $log              = new Log_ingenieria;
        $log->ticket_id   = $tp->ticket_ingenieria_id;
        $log->descripcion = 'La fecha de ejecución del tp nro°' . ' ' . $tp->tp . ' ' . 'cambio del' . ' ' . '"'.$tp->fecha_ejecucion_tp.'"'.' '.'al'.' '.'"'.$request->fecha_ejecucion_tp.'"' ;
        $log->user_id     = Auth::user()->id;
        $log->save();

        $tp->fecha_ejecucion_tp = $request->fecha_ejecucion_tp;
        $tp->save();
        return;
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {
        $cod     = $id;
        $ticket  = Ticket_ingenieria::where('id', $id)->with('room', 'user', 'pop.comuna.region', 'proceso', 'subproceso', 'site', 'subgerencia', 'tipo_rack')->first();
        $tps     = Ticket_ingenieria_tp::where('ticket_ingenieria_id', $id)->get(['tp', 'fecha_ejecucion_tp', 'id']);
        $equipos = ticket_equipo::where('ticket_id', $id)->get();
        $rol     = role_user::where('user_id', Auth::user()->id)->first();
        $data    = [
            'ticket'  => $ticket,
            'tps'     => $tps,
            'equipos' => $equipos,
            'rol_id'  => $rol->role_id,
        ];
        return view('ingenieria.show', compact('cod', 'data'));
    }

    public function getSlc($id)
    {
        $ticket = Ticket_ingenieria::where('id', $id)->with('room', 'user', 'pop.comuna.region', 'proceso', 'subproceso', 'site', 'subgerencia','tipo_rack')->first();
        $tps    = Ticket_ingenieria_tp::where('ticket_ingenieria_id', $id)->get(['tp', 'fecha_ejecucion_tp', 'id']);
        $data   = [
            'ticket' => $ticket,
            'tps'    => $tps,
        ];
        return $data;
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function getEstados()
    {
        $state = Subproceso::get();
        return $state;
    }

    public function getSupervisor(Request $request)
    {
        $supervisores = Supervisor::where('tipo_supervisor_id', $request->tipo_supervisor)->get();
        return $supervisores;
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function CestaTicketIngenieria(Request $request)
    {
        $ticket                = Ticket_ingenieria::find($request->ticket_id);
        $ticket->cesta         = $request->cesta;
        $ticket->subproceso_id = 10;
        $ticket->save();

        $log              = new Log_ingenieria;
        $log->ticket_id   = $request->ticket_id;
        $log->descripcion = 'Número de cesta ingresado:' . ' ' . $request->cesta;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
    }

    public function getActividades()
    {
        $actividades = Actividades::get();
        return $actividades;
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function OcTicketIngenieria(Request $request)
    {
        $ticket                = Ticket_ingenieria::find($request->ticket_id);
        $ticket->oc            = $request->oc;
        $ticket->subproceso_id = 11;
        $ticket->save();

        $log              = new Log_ingenieria;
        $log->ticket_id   = $request->ticket_id;
        $log->descripcion = 'Número de OC ingresado:' . ' ' . $request->oc;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
    }
    public function DASTicketIngenieria(Request $request)
    {
        $ticket                = Ticket_ingenieria::find($request->ticket_id);
        $ticket->das           = $request->das;
        $ticket->subproceso_id = 7;
        $ticket->proceso_id    = 3;
        $ticket->save();

        $log              = new Log_ingenieria;
        $log->ticket_id   = $request->ticket_id;
        $log->descripcion = 'Número de DAS ingresada:' . ' ' . $request->das;
        $log->user_id     = Auth::user()->id;
        $log->save();

        return;
    }
    public function propuestaCambioSitio(Request $request)
    {

        try {
            $ticket                = Ticket_ingenieria::find($request->ticket_id);
            $ticket->subproceso_id = 13;
            $ticket->proceso_id    = 2;
            $ticket->save();

            $cambio_sitio             = new Cambio_sitio;
            $cambio_sitio->site_id    = $request->site_id;
            $cambio_sitio->room_id    = $request->room_id;
            $cambio_sitio->ticket_id  = $request->ticket_id;
            $cambio_sitio->comentario = $request->comentario;
            $cambio_sitio->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'Propuesta cambio de sitio ingresada';
            $log->user_id     = Auth::user()->id;
            $log->save();
            return;

        } catch (Exception $e) {
            return $e;
        }

    }
    public function getDatosPropuesta($id)
    {
        $datos_propuesta = Cambio_sitio::where('ticket_id', $id)->first();
        $sitio           = Site::where('id', $datos_propuesta->site_id)->first();
        $room            = Room::where('id', $datos_propuesta->room_id)->first();

        $data = [
            'p_sitio'      => $sitio->nem_site,
            'p_sala'       => $room->name . ' - ' . $room->old_name,
            'p_comentario' => $datos_propuesta->comentario,
        ];
        return response()->json($data);
        // p_sitio
        // p_sala
        // p_comentario
    }
    public function actualizarCambioSitioSala(Request $request)
    {
        try {
            $datos_propuesta = Cambio_sitio::where('ticket_id', $request->ticket_id)->first();
            $sitio           = Site::where('id', $datos_propuesta->site_id)->first();
            $room            = Room::where('id', $datos_propuesta->room_id)->first();

            $ticket                = Ticket_ingenieria::find($request->ticket_id);
            $ticket->site_id       = $datos_propuesta->site_id;
            $ticket->room_id       = $datos_propuesta->room_id;
            $ticket->proceso_id    = 1;
            $ticket->subproceso_id = 2;
            $ticket->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'Se aprobo el cambio de sitio y sala. El nuevo sitio es ' . ' ' . $sitio->nem_site . ' ' . 'y la sala' . ' ' . $room->name . ' - ' . $room->old_name;
            $log->user_id     = Auth::user()->id;
            $log->save();

            $datos_propuesta->delete();

            return;
        } catch (Exception $e) {
            return $e;
        }

    }

    public function actualizarCantidadEquipos(Request $request)
    {
        try {
            $ticket                  = Ticket_ingenieria::find($request->ticket_id);
            $ticket->cantidad_equipo = $request->c_equipos;
            $ticket->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'La cantidad de equipos fue editada';
            $log->user_id     = Auth::user()->id;
            $log->save();

            return;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function actualizarCantidadRack(Request $request)
    {
        try {
            $ticket                = Ticket_ingenieria::find($request->ticket_id);
            $ticket->cantidad_rack = $request->c_racks;
            $ticket->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'La cantidad de racks fue editada';
            $log->user_id     = Auth::user()->id;
            $log->save();

            return;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function actualizaPotenciaTotal(Request $request)
    {
        try {
            $ticket                    = Ticket_ingenieria::find($request->ticket_id);
            $ticket->potencia_proyecto = $request->p_total_kw;
            $ticket->save();

            $log              = new Log_ingenieria;
            $log->ticket_id   = $request->ticket_id;
            $log->descripcion = 'La potencia total fue editada';
            $log->user_id     = Auth::user()->id;
            $log->save();

            return;
        } catch (Exception $e) {
            return $e;
        }
    }
}
