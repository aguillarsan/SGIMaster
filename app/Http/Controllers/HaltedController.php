<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Halted;
use App\Log;
use Illuminate\Support\Facades\Auth;
use App\Archivo;
use App\Equipement_ticket;
use App\Rechazo;
use App\role_user;
use App\crm_user;
class HaltedController extends Controller
{

	public function getHaltedTotal(){
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

		if($id==11){

			$hated = Halted::userg()->buscar()->where('state_halted_id',1)->count();;
			return $hated;
		}
		if($RoleId == 12){

			$hated = Halted::buscar()->where('state_halted_id',1)->where('crm_id',$crm_id)->count();
			return $hated;
		}
		if($RoleId == 1){
			$hated = $sitio = Halted::buscar()->where('state_halted_id',1)->count();
			return $hated;
		}

	}
	public function getOperativoTotal(){

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

		if($id==11){

			$operativo = Halted::userg()->buscar()->where('state_halted_id',2)->count();;
			return $operativo;
		}
		if($RoleId == 12){

			$operativo = Halted::buscar()->where('state_halted_id',1)->where('crm_id',$crm_id)->count();
			return $operativo;
		}
		if($RoleId == 1){
			$operativo = $sitio = Halted::buscar()->where('state_halted_id',2)->count();
			return $operativo;
		}


	}
	public function updatestate ($id)
	{
		$halted = Halted::find($id);
		$halted->state_halted_id = 2;
		$halted->save();

		$log = new Log ;
		$log->halted_id = $halted->id;
		$log->descripcion='Halted Nro'.' '.$halted->id.' '.'Cambio de estado, de  "HALTED" A "OPERATIVO"';
		$log->user_id = Auth::user()->id;
		$log->save();

		return redirect('/lista');

	}

	public function aprobarcrm($t,$m,$id)
	{
		$halted = Halted::find($t);
		$halted->state_halted_id = 2;
		$halted->save();

		$log = new Log ;
		$log->halted_id = $halted->id;
		$log->descripcion='Halted Nro'.' '.$halted->id.' '.'Cambio de estado, de  "HALTED" A "OPERATIVO"';
		$log->user_id = Auth::user()->id;
		$log->save();

		$id = $id.$m;
		return redirect('/crmPop/'.$id);
	}

	public function rechazocrmHalted($t,$m,$id)
	{

		$halted =  Halted::find($t);

		$halted->state_halted_id = 3;
		


		$halted->save();

		$rechazo = new Rechazo;
		$rechazo->halted_id = $id;
		$rechazo->user_id = Auth::user()->id;
		$rechazo->descripcion = request('motivo');
		$rechazo->save();
		$log = new Log ;
		$log->halted_id = $halted->id;
		$log->descripcion='halted Nro'.' '.$halted->id.' '.'Rechazado por'.' '.Auth::user()->name.' '.Auth::user()->apellido.' '.'Cambio de Estado "EN CURSO" a en "RECHAZADO INGENIERO"'.' '.'MOTIVO:'.' '.request('motivo');
		$log->user_id = Auth::user()->id;
		$log->save();

		$id = $id.$m;

		return redirect('/crmPop/'.$id);

	}

	public function show($id)
	{
		$id = \Crypt::decrypt($id);  
		$halted = Halted::find($id);
		$equipement_ticket = Equipement_ticket::where('halted_id',$id)->get();
		$equipement_ticket_verification = Equipement_ticket::where('halted_id',$id)->count();
		$log = Log::where('halted_id',$id)->orderBy('id','desc')->get();
		$archivos = Archivo::where('halted_id',$id)->get();
		

		return view('pop.show',compact('halted','log','archivos','equipement_ticket','equipement_ticket_verification'));
	}

	public function crm ($id)
	{

		$idusr = Auth::user()->id;

		$id_crm = (int)substr($id,0,1);
		$modulo =  (int)substr($id,-1);


              //CANTIDAD DE TICKET POR ESTADO
		$halted = Halted::buscar()->where('state_halted_id',1)->where('crm_id',$id_crm)->orderBy('id','desc')->get();
		$operativo = Halted::buscar()->where('state_halted_id',2)->where('crm_id',$id_crm)->orderBy('id','desc')->get();

		$haltedTotal = Halted::buscar()->where('state_halted_id',1)->where('crm_id',$id_crm)->count();
		$operativoTotal = Halted::buscar()->where('state_halted_id',2)->where('crm_id',$id_crm)->count();




		if($id_crm == 1){
			$nombrecrm = 'NORTE';
			$crm=1;
		}
		if($id_crm == 2){
			$nombrecrm = 'CENTRO NORTE';
			$crm=2;
		}
		if($id_crm == 3){
			$nombrecrm = 'METROPOLITANO';
			$crm=3;
		}
		if($id_crm == 4){
			$nombrecrm = 'CENTRO SUR';
			$crm=4;
		}
		if($id_crm == 5){
			$nombrecrm = 'SUR';
			$crm=5;
		}
		if($id_crm == 6){
			$nombrecrm = 'AUSTRAL';
			$crm=6;
		}
		$cod_crm=$id_crm;


		return view('pop.crm',compact('haltedTotal','operativoTotal','operativo','crm','halted','nombrecrm','cod_crm','modulo','id'));
	}

	
}
