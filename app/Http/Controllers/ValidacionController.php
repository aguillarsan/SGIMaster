<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
class ValidacionController extends Controller
{
	public function validacion()
	{
        //BUSQUEDA DEL ROL

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




		 if($id == 21){
        $ticketjefe = Ticket::buscar()->where('estado_id',3)->where('especialista_id',21)->orderBy('id','desc')->paginate(20);

        
        $totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',21)->count();
        $totalCurso = Ticket::where('estado_id',2)->where('especialista_id',21)->count();
        $totaljefe = Ticket::where('estado_id',3)->where('especialista_id',21)->count();
        $totalFin = Ticket::where('estado_id',4)->where('especialista_id',21)->count();

		return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));

      }

		 if($id == 14){
        $ticketjefe = Ticket::buscar()->where('estado_id',3)->where('especialista_id',14)->orderBy('id','desc')->paginate(20);

        
        $totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',14)->count();
        $totalCurso = Ticket::where('estado_id',2)->where('especialista_id',14)->count();
        $totaljefe = Ticket::where('estado_id',3)->where('especialista_id',14)->count();
        $totalFin = Ticket::where('estado_id',4)->where('especialista_id',14)->count();

		return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));

      }


		if($RoleId ==5 ){


			$ticketjefe = Ticket::buscar()->where('estado_id',3)->where('user_id',$id)->orderBy('id','desc')->paginate(30);



			$totalCreado = Ticket::where('estado_id',1)->where('user_id',$id)->count();
			$totalCurso = Ticket::where('estado_id',2)->where('user_id',$id)->count();
			$totaljefe = Ticket::buscar()->where('estado_id',3)->where('user_id',$id)->count();
			$totalFin = Ticket::where('estado_id',4)->where('user_id',$id)->count();

			return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));
		}


		if($id == 11){


			$ticketjefe = Ticket::buscar()->userJefe()->orderBy('id','desc')->paginate(30);


			$totalCreado = Ticket::userCreada()->where('estado_id',1)->count();
			$totalCurso = Ticket::userEspera()->where('estado_id',2)->count();
			$totaljefe = Ticket::buscar()->userJefe()->where('estado_id',3)->count();
			$totalFin = Ticket::userFin()->where('estado_id',4)->count();

			return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));

		}
		if($crm_id == 7 || $RoleId == 16){

			$ticketjefe = Ticket::buscar()->where('estado_id',3)->orderBy('id','desc')->paginate(30);
			$totalCreado = Ticket::where('estado_id',1)->count();
			$totalCurso = Ticket::where('estado_id',2)->count();
			$totaljefe = Ticket::buscar()->where('estado_id',3)->count();
			$totalFin = Ticket::where('estado_id',4)->count();

			return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));
		}else{


			$ticketjefe = Ticket::buscar()->where('estado_id',3)->where('crm_id',$crm_id)->orderBy('id','desc')->paginate(30);
			$totalCreado = Ticket::where('crm_id',$crm_id)->where('estado_id',1)->count();
			$totalCurso = Ticket::where('crm_id',$crm_id)->where('estado_id',2)->count();
			$totaljefe = Ticket::buscar()->where('crm_id',$crm_id)->where('estado_id',3)->count();
			$totalFin = Ticket::where('crm_id',$crm_id)->where('estado_id',4)->count();

			return view('ticket.validacion',compact('inputaciones','ticketjefe','totalCreado','totalCurso','totaljefe','totalFin'));
		}



	}
}
