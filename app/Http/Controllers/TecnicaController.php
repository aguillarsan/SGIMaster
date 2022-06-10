<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tecnica;
use Illuminate\Support\Facades\Input;
use App\Ticket;

class TecnicaController extends Controller
{
	public function index($id)
	{
		
		
		$tecnicas = Tecnica::where('area_id', '=', $id)->get();
		return $tecnicas;
	}
	public function GetFilterTecnica(){

		$tecnicas = Tecnica::where('area_id',1)->where('id','!=',2)->where('id','!=',3)->where('id','!=',4)->where('id','!=',5)->where('id','!=',6)->where('id','!=',1)->get();
		return $tecnicas;
	}

	public function GetFilterTecnicaClima(){

		$tecnicas = Tecnica::where('area_id',2)->where('id','!=',7)->get();
		return $tecnicas;

	}
	public function TotalLineasElectricas(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',1)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalGrupoElectrogeno(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',2)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalPlantaRectificadora(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',3)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalPanelesSolares(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',4)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalBaterias(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',5)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function Totaleolicos(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',6)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalAireAcondicionado(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',7)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalVentiladores(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',8)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalEstructuraVertical(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',9)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalInfraestructura(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',10)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalCercoPerimetral(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',11)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalReforzamiento(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',12)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}
	public function TotalDerrameCombustible(Request $request){
      $lineaElectrica = Ticket::buscar()->where('tecnica_id',13)->where('estado_id','!=',7)->count();
      return $lineaElectrica;

	}

	public function TecnicasEnergia(){
		$tencinaEnergia = Tecnica::where('area_id',1)->get();
		return $tencinaEnergia;
	}
}
