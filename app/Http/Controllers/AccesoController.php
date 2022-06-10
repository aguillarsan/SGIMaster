<?php

namespace App\Http\Controllers;

use App\Notificacion;
use App\Permiso_rol;
use App\role_user;
use App\Solicitud_acceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAcceso($id)
    {
        $solicitudPendiente = Solicitud_acceso::where('modulo_id', $id)->where('user_id', Auth::user()->id)->get();
        return $solicitudPendiente;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function solicitudpendiente($id)
    {
        $solicitudPendiente = Solicitud_acceso::where('modulo_id', $id)->where('user_id', Auth::user()->id)->where('status_id',1)->count();
        if ($solicitudPendiente != 0) {
            $solicitado = 2;
            return $solicitado;
        } else {
            $solicitado = 1;
            return $solicitado;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {

        $solicitud            = new Solicitud_acceso;
        $solicitud->user_id   = Auth::user()->id;
        $solicitud->modulo_id = $id;
        $solicitud->status_id = 1;
        $solicitud->save();

        return;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAccesos()
    {
        $solicitudPendiente = Solicitud_acceso::where('status_id', 1)->count();
        return $solicitudPendiente;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function GetDataAccesos()
    {
        $solicitudPendiente = Solicitud_acceso::where('status_id', 1)->with('user', 'modulo')->get();
        return $solicitudPendiente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AprobarAcceso($id)
    {
        $acceso  = Solicitud_acceso::find($id);
        $acceso->status_id = 2;
        $acceso->save();
        $rolUser = role_user::where('user_id', $acceso->user_id)->get();
        foreach ($rolUser as $r) {
            $rol = $r->role_id;
        }
        $permiso                = new Permiso_rol;
        $permiso->role_id       = $rol;
        $permiso->permission_id = $acceso->modulo->permiso_id;
        $permiso->save();

        $notification              = new Notificacion;
        $notification->user_id     = $acceso->user_id;
        $notification->activo_id   = 1;
        $notification->descripcion = 'Su solicitud de acceso al modulo '.' '.$acceso->modulo->nombre.' '.'fue aprobado.';
        $notification->save();
        return;

    }
    public function denegarAcceso($id)
    {
        $acceso  = Solicitud_acceso::find($id);
        $acceso->status_id = 3;
        $acceso->save();
       

        $notification              = new Notificacion;
        $notification->user_id     = $acceso->user_id;
        $notification->activo_id   = 1;
        $notification->descripcion = 'Su solicitud de acceso al modulo '.' '.$acceso->modulo->nombre.' '.'fue denegado.';
        $notification->save();
        return;

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
