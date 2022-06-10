<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Log;
use Illuminate\Support\Facades\Auth;

class ChangeEstadoController extends Controller
{
	public function redirect(Request $request){
		$ticket = Ticket::find(request('id'));
		if(request('estado') ==5 || request('estado')==6 ) {
			$ticket->estado_id = request('estado');
			$ticket->subestado_id=1;
			$ticket->save();
			$log = new Log ;
			$log->ticket_id = request('id');
			$log->descripcion='Tikcet rechazado por'.' '. Auth::user()->name.' '.Auth::user()->apellido;
			$log->user_id = Auth::user()->id;
			$log->save();

		}else{
			if(request('estado')==1){
				$estado = 'EN ESPERA';
			}
			if(request('estado')==2){
				$estado = 'EN CURSO';
			}
			if(request('estado')==3){
				$estado = 'VALIDACIÓN';
			}
			if(request('estado')==4){
				$estado = 'FINALIZADA';
			}
			if(request('estado')==7){
				$estado = 'ELIMINADO';
			}
			$ticket->estado_id = request('estado');
			$ticket->save();
			$log = new Log ;
			$log->ticket_id = request('id');
			$log->tipo_mensaje_id =2;
			$log->descripcion='Ticket Cambio de estado a'.' '.$estado;
			$log->user_id = Auth::user()->id;
			$log->save();

		}
		return;


	}
}
