<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;
use App\Rechazo;
use App\Log;
use App\Pop;
use App\Ticket;
use Carbon\Carbon;
use App\Inputacion;
use App\crm_user;
use App\role_user;
use App\Area;
use App\Inputacion_ticket;
use App\Tipo_motivo;
use App\Solicitud_ework;

use Illuminate\Support\Facades\Auth;

class BacklogController extends Controller
{
	public function aprobar(Request $request,$t,$m,$id)
	{
		$fecha = request('fechaCompromiso');
		$ticket =  Ticket::find($t);
		$ticket->estado_id = 2;
		$ticket->aprobador_id = Auth::user()->id;
		$ticket->fecha_compromiso=$fecha;
		$ticket->save();

		$log = new Log ;
		$log->ticket_id = $ticket->id;
		$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Aprobado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Cambio de Estado "CREADO" a en "CURSO"';
		$log->user_id = Auth::user()->id;
		$log->save();
		$id = $id.$m;

		return redirect('/crm/'.$id);
	}
	public function fecha(Request $request,$t,$m,$id){
		$fecha = request('fechaCompromiso2');
		$ticket =  Ticket::find($t);


		$ticket->fecha_compromiso=$fecha;
		$ticket->save();

		$log = new Log ;
		$log->ticket_id = $ticket->id;
		$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Modificado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Ingreso de nueva fecha de termino'.' '. $ticket->fecha_compromiso;
		$log->user_id = Auth::user()->id;
		$log->save();
		$id = $id.$m;

		return redirect('/crm/'.$id);
	}


	public function rechazar(Request $request,$t,$m,$id){
		$ticket =  Ticket::find($t);
		$ticket->old_id = $ticket->estado_id;
		$ticket->estado_id = 6;
		$ticket->subestado_id = 1;


		$ticket->save();

		$rechazo = new Rechazo;
		$rechazo->ticket_id = $id;
		$rechazo->user_id = Auth::user()->id;
		$rechazo->descripcion = request('motivo');
		$rechazo->save();
		$log = new Log ;
		$log->ticket_id = $ticket->id;
		$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Rechazado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Cambio de Estado "CREADO" a en "RECHAZADO INGENIERO"'.' '.'MOTIVO:'.' '.request('motivo');
		$log->user_id = Auth::user()->id;
		$log->save();

		$id = $id.$m;

		return redirect('/crm/'.$id);
	}

	public function area(){
		$area = Area::get();
		return $area;
	}
}
