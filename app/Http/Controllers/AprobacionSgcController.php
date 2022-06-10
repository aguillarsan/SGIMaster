<?php

namespace App\Http\Controllers;

use App\BitacoraSgc;
use App\SolicitudSgc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AprobacionSgcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AprobacionJefeArea($id)
    {

        $solicitud = SolicitudSgc::find($id);
        if ($solicitud->duplicado_id != null) {

            $soliciutduno = SolicitudSgc::where('id', $solicitud->duplicado_id)->get();

            foreach ($soliciutduno as $sol) {
                $idUno = $sol->id;
            }
            if ($solicitud->proceso_id != 14) {
                $solicitud->proceso_id   = 2;
                $solicitud->subestado_id = 7;
                $solicitud->save();
            }

            $solicitudprimera = SolicitudSgc::find($idUno);
            if ($solicitudprimera->proceso_id != 14) {
                $solicitudprimera->proceso_id   = 2;
                $solicitudprimera->subestado_id = 7;
                $solicitudprimera->save();
            }

        } else {
            $verificacion = SolicitudSgc::where('duplicado_id', $id)->count();
            if ($verificacion != 0) {
                $verificacion = SolicitudSgc::where('duplicado_id', $id)->get();

                foreach ($verificacion as $v) {
                    $idDupli = $v->id;
                }
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 7;
                    $solicitud->save();
                }

                $soliudDuplicada = SolicitudSgc::find($idDupli);
                if ($soliudDuplicada->proceso_id != 14) {
                    $soliudDuplicada->proceso_id   = 2;
                    $soliudDuplicada->subestado_id = 7;
                    $soliudDuplicada->save();
                }

            } else {
                if ($solicitud->proceso_id != 14) {
                    $solicitud->proceso_id   = 2;
                    $solicitud->subestado_id = 7;
                    $solicitud->save();
                }

            }

        }

        $user                         = Auth::user()->id;
        $nom                          = Auth::user()->name;
        $resp                         = Auth::user()->avatar;
        $bitacora                     = new BitacoraSgc;
        $bitacora->mensaje            = 'Solicitud Aprobada';
        $bitacora->nuevassolicitud_id = $id;
        $bitacora->user_id            = $user;
        $bitacora->usuario            = $nom;
        $bitacora->responsable        = $resp;

        $bitacora->save();

        return;

    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
   

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
