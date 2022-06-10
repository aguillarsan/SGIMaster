<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class EditController extends Controller
{
    public function EditDateCreated(Request $request){
    	$ticket = Ticket::find(request('id'));
    	if(request('tipoFecha')==1){
    		$ticket->created_at = request('Fechanueva');
    	}
    	if(request('tipoFecha')==2){
    		$ticket->fecha_compromiso = request('Fechanueva');
    	}
    	
    	
    	$ticket->save();
    	return;
    }
}
