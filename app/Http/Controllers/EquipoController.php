<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use Illuminate\Support\Facades\Input;
use App\Ticket;
class EquipoController extends Controller
{
    public function index($id)
	{
		
		
		$equipos = Equipo::where('tecnica_id', '=', $id)->get();
		return $equipos;
	}

	public function GetEquipoTecnicaCompactoDeMedida(){
		$total = Ticket::where('equipo_id',3)->count();
		return $total;
	}
	public function GetEquipoTecnicaTransformador(){
		$total = Ticket::where('equipo_id',2)->count();
		return $total;
	}
	public function GetEquipoTecnicaLineaElectrica(){
		$total = Ticket::where('equipo_id',1)->count();
		return $total;
	}

	public function GetEquipoTecnicaGrupoElectrogeno(){
		$total = Ticket::where('equipo_id',4)->count();
		return $total;
	}
	public function GetEquipoTecnicaMotor(){
		$total = Ticket::where('equipo_id',5)->count();
		return $total;
	}
	public function GetEquipoTecnicaGenerador(){
		$total = Ticket::where('equipo_id',6)->count();
		return $total;
	}
	public function GetEquipoTecnicaEstanqueCombustibler(){
		$total = Ticket::where('equipo_id',7)->count();
		return $total;
	}
	public function GetEquipoTecnicaControladorG(){
		$total = Ticket::where('equipo_id',8)->count();
		return $total;
	}
	public function GetEquipoTecnicaControladorTTA(){
		$total = Ticket::where('equipo_id',9)->count();
		return $total;
	}
	public function GetEquipoTecnicaRectificadores(){
		$total = Ticket::where('equipo_id',10)->count();
		return $total;
	}





}
