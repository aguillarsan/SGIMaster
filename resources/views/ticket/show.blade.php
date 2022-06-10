@extends('layouts.menu')

@section('content')
<div id="app">
    <ticketShow :permisos='@json($permisos)' 
    :tickets='@json($ticket)' 
    :bitacora='@json($bitacora)'  
    :tpsticket='@json($tps)'  
    :archivo='@json($archivos)' 
    :peps='@json($pep)' 
    :user='@json(auth()->user())'>
    </ticketShow>
    <div class="main-content">
        <div id="ticektList">
            @if($ticket->tipo_mantencion_id == 1)

                   @include('ticket.cheklist')

               @endif
        </div>
    </div>
    <elementos :idticket="'{{$ticket->id}}'">
    </elementos>
    @if($ticket->prevalorizacion == null)
    <input id="valorTicektElemeto" name="" type="hidden" value="0"/>
    @else
    <input id="valorTicektElemeto" name="" type="hidden" value="{{$ticket->prevalorizacion}}"/>
    @endif
    <modal-edit-site>
    </modal-edit-site>
    <fileticket>
    </fileticket>
</div>
@endsection
