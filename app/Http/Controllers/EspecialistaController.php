<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Log;
use Illuminate\Support\Facades\Auth;
class EspecialistaController extends Controller
{
	public function asignar($id)
	{
		$ticket = Ticket::find($id);
		$ticket->especialista_id = 14;
		$ticket->save();

		$log = new Log ;
		$log->ticket_id = $id;
		$log->descripcion='Ticket Nro°'.' '.$ticket->id.' '.'Asignado a especialista de clima Luis Godoy Painecura';
		$log->user_id = Auth::user()->id;
		$log->save();
	

		return;

	}

	public function asignarOcc($id)
	{
		$ticket = Ticket::find($id);
		$ticket->especialista_id = 21;
		$ticket->save();

		$log = new Log ;
		$log->ticket_id = $id;
		$log->descripcion='Ticket Nro°'.' '.$ticket->id.' '.'Asignado a especialista de OO.CC Carlos Henriquez';
		$log->user_id = Auth::user()->id;
		$log->save();
	

		return;

	}

	
}
