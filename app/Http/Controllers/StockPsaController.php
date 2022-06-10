<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock_bateria;

class StockPsaController extends Controller
{
    public function index(){
    	return view('psa.stock');
    }
    public function getStockBaterias(Request $request){
    	$baterias = Stock_bateria::buscar()->with('marca','negocio','capacidad')->orderby('negocio_id',('asc'))->get();
    	return $baterias;
    }
    public function updateStockBatery(Request $request){
    	$bateria = Stock_bateria::find($request->id);
    	$bateria->cantidad = $request->cantidad;
    	$bateria->save();
    	return;
    }
}
