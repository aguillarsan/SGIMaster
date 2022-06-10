<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Listing_ticket;
class TareaController extends Controller
{
	public function index(){
		$tarea = Listing::get();
		
		return $tarea;
	}

	public function cotizacion($id){
		$cotizaciones = Listing_ticket::where('ticket_id',$id)->where('listing_id',1)->count();
		return $cotizaciones;
	}
	public function pxq($id){
		$pxq = Listing_ticket::where('ticket_id',$id)->where('listing_id',2)->count();
		return $pxq;
	}
	public function Cuenta($id){
		$cuenta = Listing_ticket::where('ticket_id',$id)->where('listing_id',3)->count();
		return $cuenta;
	}

	public function Empresa($id){
		$empresa = Listing_ticket::where('ticket_id',$id)->where('listing_id',4)->count();
		return $empresa;
	}
	public function sgc($id){
		$sgc = Listing_ticket::where('ticket_id',$id)->where('listing_id',5)->count();
		return $sgc;
	}

	public function oc($id){
		$oc = Listing_ticket::where('ticket_id',$id)->where('listing_id',6)->count();
		return $oc;
	}


	public function informe($id){
		$informe = Listing_ticket::where('ticket_id',$id)->where('listing_id',7)->count();
		return $informe;
	}



}
