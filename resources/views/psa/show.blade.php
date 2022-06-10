@extends('layouts.MenuPsa')
@section('content')
<psa-show :id="'{{$id}}'" :permisos='@json($permision)'  :solicitud='@json($solicitud)' :bitacora='@json($bitacora)'></psa-show>
@endsection