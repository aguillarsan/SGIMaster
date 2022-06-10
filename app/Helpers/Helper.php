<?php
namespace App\Helpers;

use App\Rechazo;
use App\Inputacion_ticket;
use App\SolicitudSgc;
use Illuminate\Http\Request;
use App\Listing_ticket;

class Helper {

    // Nabvar


	public static function rechazo($id) {
		$rechazo = Rechazo::where('ticket_id', $id)->get();
		return $rechazo;
	}


	public static function imputacion($id) {
		$inputacion = Inputacion_ticket::where('ticket_id', $id)->get();
		return $inputacion;
	}
	public static function solicitudSgc($id) {
		$solicitud = SolicitudSgc::where('ticket_id', $id)->select('id')->get();
		return $solicitud;
	}





	public static function lista($id,$l) { 
		$list = Listing_ticket::where('ticket_id',$id)->where('listing_id',$l)->get();
		return $list;
	}






}