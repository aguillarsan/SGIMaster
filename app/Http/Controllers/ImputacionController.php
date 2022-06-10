<?php

namespace App\Http\Controllers;

use App\Inputacion;
use App\Inputacion_ticket;
use App\Log;
use App\Pep_available;
use App\Solicitud_ework;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImputacionController extends Controller
{
    public function inputacion(Request $request, $id)
    {

        $ticket = Ticket::find($id);

        $inputacion =  request('inputacion');

        $nroinpputacion = request('nroinputacion');

        //if($inputacion ==2 ){
        //$solicitud = new Solicitud_ework;
        //$solicitud->tipo_motivo_id = $ticket->tipo_motivo_id;
        //$solicitud->descripcion = $ticket->descripcion;
        //if($ticket->tipo_motivo_id == 1){
        //$solicitud->denuncia = 1;
        //$solicitud->save();
        //}
        //$solicitud->ticket_id = $id;
        //$solicitud->estado_id= 1;
        //$solicitud->pop_id =  $ticket->site_id;

        //$solicitud->user_id= Auth::user()->id;
        //$solicitud->save();

        //$ticket->solicitud_ework_id = $solicitud->id;
        //$ticket->save();

        //if($inputacion == 2){
        //$tip = 'PRE-EWORK'.' '.$solicitud->id;
        //}

        //$inputacion_ticket= new Inputacion_ticket;

        //$inputacion_ticket->inputacion_id = $inputacion;
        //$inputacion_ticket->ticket_id = $ticket->id;
        //$inputacion_ticket->nro_imputacion = $solicitud->id;
        //$inputacion_ticket->save();

        //$log = new Log ;
        //$log->ticket_id = $ticket->id;
        //$log->tipo_mensaje_id =2 ;
        //$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Imputacion Ingresada,' .' '.'Tipo de imputación y numero'.' '.$tip.' ' .'Ingresado por:'.' '.Auth::user(//)->name.' '.Auth::user()->apellido;
        //$log->user_id = Auth::user()->id;
        //$log->save();

        //return;
        //}else{

        if ($inputacion == 1) {
            $tip = 'CECO' . ' ' . $nroinpputacion;
        }
        if ($inputacion == 2) {
            $tip = 'PRE-EWORK' . ' ' . $nroinpputacion;
        }
        if ($inputacion == 3) {
            $tip = 'BTL-RED' . ' ' . $nroinpputacion;
        }
        if ($inputacion == 4) {
            $tip = 'ELEMENTO PEP' . ' ' . $nroinpputacion;

            $pep_available      = new Pep_available;
            $pep_available->pep = $nroinpputacion;
            $pep_available->save();
            $ticket->pep_available_id = $pep_available->id;
            $ticket->pep_new_checked  = 1;
            $ticket->save();
        }
       

        $ticket->nro_imputacion = $nroinpputacion;
        $ticket->inputacion_id = $inputacion;
        $ticket->save();

        $log            = new Log;
        $log->ticket_id = $ticket->id;

        if ($inputacion == 4) {
            $log->descripcion     = 'Número de PEP' . ' ' . $nroinpputacion . ' ' . 'ingresado.';
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 1;
        } else {
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Imputacion Ingresada,' . ' ' . 'Tipo de imputación y numero' . ' ' . $tip . ' ' . 'Ingresado por:' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
            $log->user_id         = Auth::user()->id;
            $log->tipo_mensaje_id = 2;
        }

        $log->save();

        return;

    }
    public function deleImputacion(Request $request)
    {
        $ticket = ticket::find($request->ticket_id);

        $log                  = new Log;
        $log->ticket_id       = $request->ticket_id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = 'El número de imputación' . ' ' . $ticket->nro_imputacion . ' ' . 'fue borrado';
        $log->user_id         = Auth::user()->id;
        $log->save();

        $ticket->nro_imputacion = null;
        $ticket->inputacion_id  = null;
        $ticket->save();
        return;

    }
    public function inputacion2(Request $request, $t, $m, $id)
    {

        $ticket = Ticket::find($t);

        $inputacion = (int) request('inputacion');

        $nroinpputacion = request('nroinputacion');

        if ($inputacion == 2) {
            $solicitud                 = new Solicitud_ework;
            $solicitud->tipo_motivo_id = $ticket->tipo_motivo_id;
            $solicitud->descripcion    = $ticket->descripcion;
            if ($ticket->tipo_motivo_id == 1) {
                $solicitud->denuncia = 1;
                $solicitud->save();
            }
            $solicitud->ticket_id = $t;
            $solicitud->estado_id = 1;
            $solicitud->pop_id    = $ticket->pop_id;

            $solicitud->user_id = Auth::user()->id;
            $solicitud->save();

            $ticket->solicitud_ework_id = $solicitud->id;
            $ticket->save();

            if ($inputacion == 2) {
                $tip = 'PRE-EWORK' . ' ' . $solicitud->id;
            }

            $inputacion_ticket = new Inputacion_ticket;

            $inputacion_ticket->inputacion_id  = $inputacion;
            $inputacion_ticket->ticket_id      = $ticket->id;
            $inputacion_ticket->nro_imputacion = $solicitud->id;
            $inputacion_ticket->save();

            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->tipo_mensaje_id = 2;
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Imputacion Ingresada,' . ' ' . 'Tipo de imputación y numero' . ' ' . $tip . ' ' . 'Ingresado por:' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
            $log->user_id         = Auth::user()->id;
            $log->save();

            return redirect('/ticket');
        } else {

            if ($inputacion == 1) {
                $tip = 'CECO' . ' ' . $nroinpputacion;
            }
            if ($inputacion == 2) {
                $tip = 'PRE-EWORK' . ' ' . $nroinpputacion;
            }
            if ($inputacion == 3) {
                $tip = 'BTL-RED' . ' ' . $nroinpputacion;
            }
            if ($inputacion == 4) {
                $tip = 'ELEMENTO PEP' . ' ' . $nroinpputacion;
            }
            $inputacion_ticket = new Inputacion_ticket;

            $inputacion_ticket->inputacion_id  = $inputacion;
            $inputacion_ticket->ticket_id      = $ticket->id;
            $inputacion_ticket->nro_imputacion = $nroinpputacion;
            $inputacion_ticket->save();

            $log                  = new Log;
            $log->ticket_id       = $ticket->id;
            $log->tipo_mensaje_id = 2;
            $log->descripcion     = 'Ticket Nro' . ' ' . $ticket->id . ' ' . 'Imputacion Ingresada,' . ' ' . 'Tipo de imputación y numero' . ' ' . $tip . ' ' . 'Ingresado por:' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
            $log->user_id         = Auth::user()->id;
            $log->save();

            $id = $id . $m;

            return redirect('/crm/' . $id);
        }

    }

    public function GetImputacion($id)
    {
        $imputaciones = Inputacion_ticket::where('ticket_id', '=', $id)->get();
        return $imputaciones;
    }

    public function change_state_pep_new($id)
    {

        $ticket                  = Ticket::find($id);
        $ticket->pep_new_checked = 0;
        $ticket->save();

        $log                  = new Log;
        $log->ticket_id       = $id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = 'Pep visualizado por:' . ' ' . Auth::user()->name . ' ' . Auth::user()->apellido;
        $log->user_id         = Auth::user()->id;
        $log->save();

        return;
    }
}
