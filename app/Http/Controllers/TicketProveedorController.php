<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketProveedorController extends Controller
{
    public function index(){
    	return view('ticket.proveedor');
    }
}
