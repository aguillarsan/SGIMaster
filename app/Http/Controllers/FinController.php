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

class FinController extends Controller
{
       public function finalizada()
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


     if($id == 14){
        $ticketFin = Ticket::buscar()->where('estado_id',4)->where('especialista_id',14)->orderBy('id','desc')->paginate(20);

        
        $totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',14)->count();
        $totalCurso = Ticket::where('estado_id',2)->where('especialista_id',14)->count();
        $totaljefe = Ticket::where('estado_id',3)->where('especialista_id',14)->count();
        $totalFin = Ticket::where('estado_id',4)->where('especialista_id',14)->count();

       
        return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));

      }
      
       if($id == 21){
        $ticketFin = Ticket::buscar()->where('estado_id',4)->where('especialista_id',21)->orderBy('id','desc')->paginate(20);

        
        $totalCreado = Ticket::buscar()->where('estado_id',1)->where('especialista_id',21)->count();
        $totalCurso = Ticket::where('estado_id',2)->where('especialista_id',21)->count();
        $totaljefe = Ticket::where('estado_id',3)->where('especialista_id',21)->count();
        $totalFin = Ticket::where('estado_id',4)->where('especialista_id',21)->count();

       
        return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));

      }
      if($RoleId ==5 ){


        $ticketFin = Ticket::buscar()->where('estado_id',4)->where('user_id',$id)->orderBy('id','desc')->paginate(30);


        $totalCreado = Ticket::where('estado_id',1)->where('user_id',$id)->count();
        $totalCurso = Ticket::where('estado_id',2)->where('user_id',$id)->count();
        $totaljefe = Ticket::where('estado_id',3)->where('user_id',$id)->count();
        $totalFin = Ticket::buscar()->where('estado_id',4)->where('user_id',$id)->count();
        
        return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));
      }

      
      if($id == 11){
      
        $ticketFin = Ticket::buscar()->userFin()->orderBy('id','desc')->paginate(30);
        
        $totalCreado = Ticket::userCreada()->where('estado_id',1)->count();
        $totalCurso = Ticket::userEspera()->where('estado_id',2)->count();
        $totaljefe = Ticket::userJefe()->where('estado_id',3)->count();
        $totalFin = Ticket::buscar()->userFin()->where('estado_id',4)->count();

 return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));

      }
      if($crm_id == 7 || $RoleId == 16){

     
        $ticketFin = Ticket::buscar()->where('estado_id',4)->orderBy('id','desc')->paginate(30);

        $totalCreado = Ticket::where('estado_id',1)->count();
        $totalCurso = Ticket::where('estado_id',2)->count();
        $totaljefe = Ticket::where('estado_id',3)->count();
        $totalFin = Ticket::buscar()->where('estado_id',4)->count();
        return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));
      }else{

        $ticketFin = Ticket::buscar()->where('estado_id',4)->where('crm_id',$crm_id)->orderBy('id','desc')->paginate(30);

        $totalCreado = Ticket::where('crm_id',$crm_id)->where('estado_id',1)->count();
        $totalCurso = Ticket::where('crm_id',$crm_id)->where('estado_id',2)->count();
        $totaljefe = Ticket::where('crm_id',$crm_id)->where('estado_id',3)->count();
        $totalFin = Ticket::buscar()->where('crm_id',$crm_id)->where('estado_id',4)->count();
        return view('ticket.finalizada',compact('inputaciones','totalCreado','totalCurso','totaljefe','totalFin','ticketFin'));
      }
      


    }
}
