<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class EstadisticaController extends Controller
{
    public function index()
    {
    	$energia = Ticket::where('area_id',1)->count();
    	$clima = Ticket::where('area_id',2)->count();
    	$oocc = Ticket::where('area_id',3)->count();
    	$medioAmbiente = Ticket::where('area_id',4)->count();
    	$todas = $energia+$clima+$oocc;
    	return view('graficos.index',compact('clima','energia','oocc','medioAmbiente','todas'));
    }
}
