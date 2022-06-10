@extends('layouts.menu')

@section('content')
<show-control-pep 
:tickets='@json($ticket)'
:pep='@json($pep)'
:solicitudes='@json($solicitudes)'
:solicitudes_con_oc='@json($solicitudes_con_oc)'
>
</show-control-pep>
@endsection
