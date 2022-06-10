@extends('layouts.menu_ticket_ing')
@section('content')
<div class="main-content">
    <indexing :rol="'{{$role}}'" :total_ticket_conexion="'{{$total_ticket_conexion}}'" :total_ticket_grandes_proyectos="'{{$total_ticket_grandes_proyectos}}'">
    </indexing>
</div>
@endsection
