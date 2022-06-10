<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket_tp;
use App\Log;
use Illuminate\Support\Facades\Auth;

class TicketTpController extends Controller
{
    public function addTp(Request $request , $id)
	{
		$ticket_tp = new Ticket_tp;
		$ticket_tp->ticket_id = $id;
		$ticket_tp->nro_tp = $request->tp;
		$ticket_tp->motivo=$request->motivoTp;
		$ticket_tp->save();

		$log = new Log ;
		$log->ticket_id = $id;
		$log->tipo_mensaje_id=2;
		$log->descripcion='Número de tp ingresado:'.' '.request('tp');
		$log->user_id = Auth::user()->id;
		$log->save();
		

		return;
	}

	public function getTp($id){
      $tps = Ticket_tp::where('ticket_id',$id)->get();
      return $tps;
	}
}
