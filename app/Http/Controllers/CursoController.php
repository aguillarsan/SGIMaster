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

class CursoController extends Controller
{
	public function __construct()
	{
		Carbon::setLocale('es');
		$this->middleware('auth');
	}

	public function curso(){

		$id = Auth::user()->id;

		$rol = role_user::where('user_id',$id)->select('role_id')->get();



		foreach($rol as $r){
			$RoleId = $r->role_id;
		}
/////////////

//BUSQUEDA DEL CRM

		$crm = crm_user::where('user_id',Auth::user()->id)->get();

		foreach ($crm as $c) 
		{
			$crm_id = $c->crm_id;
		}
///////

		$area= Area::get();

		$sitio = Pop::get();



		$inputaciones = Inputacion::get();
		$motivo = Tipo_motivo::get();
		
		if($id == 14){
			$ticketcurso = Ticket::buscar()->where('estado_id',2)->where('especialista_id',14)->orderBy('id','desc')->paginate(20);


			$totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',14)->count();
			$totalCurso = Ticket::where('estado_id',2)->where('especialista_id',14)->count();
			$totaljefe = Ticket::where('estado_id',3)->where('especialista_id',14)->count();
			$totalFin = Ticket::where('estado_id',4)->where('especialista_id',14)->count();


			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));


		}
		if($id == 21){
			$ticketcurso = Ticket::buscar()->where('estado_id',2)->where('especialista_id',21)->orderBy('id','desc')->paginate(20);


			$totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',21)->count();
			$totalCurso = Ticket::where('estado_id',2)->where('especialista_id',21)->count();
			$totaljefe = Ticket::where('estado_id',3)->where('especialista_id',21)->count();
			$totalFin = Ticket::where('estado_id',4)->where('especialista_id',21)->count();


			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));


		}

		if($RoleId ==5 ){


			$ticketcurso = Ticket::buscar()->where('estado_id',2)->where('user_id',$id)->orderBy('id','desc')->paginate(30);



			$totalCreado = Ticket::where('estado_id',1)->where('user_id',$id)->count();
			$totalCurso = Ticket::buscar()->where('estado_id',2)->where('user_id',$id)->count();
			$totaljefe = Ticket::where('estado_id',3)->where('user_id',$id)->count();
			$totalFin = Ticket::where('estado_id',4)->where('user_id',$id)->count();

			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));
		}


		if($id == 11){
			$ticketcurso = Ticket::buscar()->userEspera()->orderBy('id','desc')->paginate(30);


			$totalCreado = Ticket::userCreada()->where('estado_id',1)->count();
			$totalCurso = Ticket::buscar()->userEspera()->where('estado_id',2)->count();
			$totaljefe = Ticket::userJefe()->where('estado_id',3)->count();
			$totalFin = Ticket::userFin()->where('estado_id',4)->count();

			
			
			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));

		}
		if($crm_id == 7 || $RoleId == 16){


			$ticketcurso = Ticket::buscar()->where('estado_id',2)->orderBy('id','desc')->paginate(30);


			$totalCreado = Ticket::where('estado_id',1)->count();
			$totalCurso = Ticket::buscar()->where('estado_id',2)->count();
			$totaljefe = Ticket::where('estado_id',3)->count();
			$totalFin = Ticket::where('estado_id',4)->count();

			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));
		}else{


			$ticketcurso = Ticket::buscar()->where('estado_id',2)->where('crm_id',$crm_id)->orderBy('id','desc')->paginate(30);


			$totalCreado = Ticket::where('crm_id',$crm_id)->where('estado_id',1)->count();
			$totalCurso = Ticket::buscar()->where('crm_id',$crm_id)->where('estado_id',2)->count();
			$totaljefe = Ticket::where('crm_id',$crm_id)->where('estado_id',3)->count();
			$totalFin = Ticket::where('crm_id',$crm_id)->where('estado_id',4)->count();

			return view('ticket.Curso',compact('ticketcurso','totalCreado','totalCurso','totaljefe','totalFin','inputaciones'));
		}


	}


	public function aprobar(Request $request,$t,$m,$id){
		$ticket =  Ticket::find($t);
		$ticket->estado_id = 3;
		$ticket->save();
		$log = new Log ;
		$log->ticket_id = $ticket->id;
		$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Aprobado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Cambio de Estado "CURSO" a  "VALIDACION"';
		$log->user_id = Auth::user()->id;
		$log->save();

		$id = $id.$m;

		return redirect('/crm/'.$id);
	}


	public function rechazar2(Request $request,$t,$m,$id){
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
		$log->descripcion='Ticket Nro'.' '.$ticket->id.' '.'Rechazado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Cambio de Estado "EN CURSO" a en "RECHAZADO INGENIERO"'.' '.'MOTIVO:'.' '.request('motivo');
		$log->user_id = Auth::user()->id;
		$log->save();

		$id = $id.$m;
       
		return redirect('/crm/'.$id);
	}
}
