<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notificacion;
use Illuminate\Support\Facades\Auth;
class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacion = Notificacion::where('user_id',Auth::user()->id)->where('activo_id',1)->get();
        return $notificacion;
    }

    public function totalnotificaciones()
    {
        $total = Notificacion::where('user_id',Auth::user()->id)->where('activo_id',1)->select('id')->count();
        return $total;
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusNotificaction()
    {
        $notificacion = Notificacion::where('user_id',Auth::user()->id)->where('activo_id',1)->count();
        if($notificacion >0){
            $activo = 1;
            return $activo;
        }else{
           $activo = 2;
           return $activo;
       }

   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UpdateNotificaciones()
    {

     $notificacionActive = Notificacion::where('user_id',Auth::user()->id)->where('activo_id',1)->count();
     if($notificacionActive >0){
      $notificacion = Notificacion::where('user_id',Auth::user()->id)->get();
      foreach ($notificacion as $n) {
         $noti = Notificacion::find($n->id);
         $noti->activo_id = 2;
         $noti->save();

     }
 }

 return;
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
