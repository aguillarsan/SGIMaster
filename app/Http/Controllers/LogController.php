<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function mensaje(Request $request, $id)
    {

        $log                  = new Log;
        $log->ticket_id       = $id;
        $log->tipo_mensaje_id = 1;
        $log->descripcion     = $request->input('descripcion');
        $log->user_id         = Auth::user()->id;
        $log->save();

        return;
    }

    public function mensajeHalted(Request $request, $id)
    {

        $log              = new Log;
        $log->halted_id   = $id;
        $log->descripcion = request('mensaje');
        $log->user_id     = Auth::user()->id;
        $log->save();
        $id = \Crypt::encrypt($id);

        return redirect('/detalleHalted/' . $id);
    }

    public function logTicket($id)
    {
        $bitacora = Log::where('ticket_id', $id)->where('tipo_mensaje_id', 1)->with('user')->orderBy('id', 'desc')->get();

        return $bitacora;
    }

    public function logTicket2($id)
    {
        $bitacora = Log::where('ticket_id', $id)->where('tipo_mensaje_id', 2)->with('user')->orderBy('id', 'desc')->get();

        return $bitacora;
    }

}
