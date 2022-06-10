<?php

namespace App\Http\Controllers\Ticket_support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\role_user;
use Illuminate\Support\Facades\Auth;
use App\Models\Support\Ticket_support;
use App\Models\Support\Plataforma;
use App\Models\Support\Tipo_requisito;
use App\Models\Support\Ticket_suport_task;
use App\Models\Support\Archivo;


use Carbon\Carbon;

class TicketSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTicketsSuport(Request $request)
    {
        $role = role_user::where('user_id', Auth::user()->id)->first();
        if (Auth::user()->id == 1 || Auth::user()->id == 2) {
            $tickets = Ticket_support::filter()->with('tipo_requisito', 'user', 'prioridad', 'plataforma')->where('responsable_id', Auth::user()->id)->orderBy('prioridad_id', 'desc')->paginate(4);
            $validacion = Ticket_support::where('estado_id', 1)->where('responsable_id', Auth::user()->id)->count();
            $proceso = Ticket_support::where('estado_id', 2)->where('responsable_id', Auth::user()->id)->count();
            $finalizado = Ticket_support::where('estado_id', 3)->where('responsable_id', Auth::user()->id)->count();
            $rechazado = Ticket_support::where('estado_id', 7)->where('responsable_id', Auth::user()->id)->count();
            $data = [
                'tickets' => $tickets,
                'validacion' => $validacion,
                'proceso' => $proceso,
                'finalizado' => $finalizado,
                'rechazado' => $rechazado,

            ];
            return $data;
        } else {
            $tickets = Ticket_support::filter()->with('tipo_requisito', 'user', 'prioridad', 'plataforma')->where('user_id', Auth::user()->id)->orderBy('prioridad_id', 'desc')->paginate(4);
            $validacion = Ticket_support::where('estado_id', 1)->where('user_id', Auth::user()->id)->count();
            $proceso = Ticket_support::where('estado_id', 2)->where('user_id', Auth::user()->id)->count();
            $finalizado = Ticket_support::where('estado_id', 3)->where('user_id', Auth::user()->id)->count();
            $rechazado = Ticket_support::where('estado_id', 7)->where('user_id', Auth::user()->id)->count();
            $data = [
                'tickets' => $tickets,
                'validacion' => $validacion,
                'proceso' => $proceso,
                'finalizado' => $finalizado,
                'rechazado' => $rechazado,

            ];
            return $data;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataForm()
    {
        $plataformas = Plataforma::get();
        $motivo = Tipo_requisito::get();
        $data = [
            'plataformas' => $plataformas,
            'motivo' => $motivo
        ];
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createTicketSupport(Request $request)
    {

     
        $ticket = new Ticket_support();
        $ticket->descripcion = $request->descripcion;
        $ticket->plataforma_id = $request->plataforma_id;
        $ticket->tipo_requisito_id = $request->tipo_requisito_id;
        $ticket->prioridad_id = $request->prioridad_id;
        $ticket->responsable_id = $request->responsable_id;
        $ticket->estado_id = 1;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        $destinationPath = "SupportFiles";
        $files = $request->file('files');

        if ($files != null) {
         
            //////CARGA Y REGISTRO  DE ARCHIVOS
            foreach ($files as $file) {


                $filename                    = $file->getClientOriginalName();
                $extension                   = $file->getClientOriginalExtension();

                $archivo                     = new Archivo;
                $archivo->nombre_archivo     = $filename;
                $archivo->ticket_support_id = $ticket->id;



                $archivo->save();

                $file->move($destinationPath, $filename);
            }
        }

        return $ticket->id;
    }

    public function createTaskSupportTicket(Request $request)
    {
        $task = new Ticket_suport_task();
        $task->name_task = $request->name_task;
        $task->ticket_support_id = $request->ticket_support_id;
        $task->complete = 0;
        $task->save();
        return ;
    }

    public function getTaskTicket(Request $request)
    {
        $tasks = Ticket_suport_task::where('ticket_support_id', $request->ticket_id)->get();
        $archivos = Archivo::where('ticket_support_id', $request->ticket_id)->get();
        $data = [
            'tasks' => $tasks,
            'archivos' => $archivos,
        ];
        return  $data;
    }

    public function updateListTaskTicket(Request $request)
    {
        $tasks = Ticket_suport_task::find($request->task_id);
        $tasks->complete = $request->complete;
        $tasks->save();
        return;
    }

    public function aproveTicket(Request $request)
    {
        $ticket = Ticket_support::find($request->ticket_id);
        if ($ticket->estado_id == 1) {
            $ticket->estado_id = 2;
            $ticket->fecha_curso = Carbon::now();
            $ticket->save();
            return;
        } else {
            if ($ticket->estado_id == 2) {
                $ticket->estado_id = 3;
                $ticket->fecha_finalizada = Carbon::now();
                $ticket->save();
                return;
            }
        }
    }
}
