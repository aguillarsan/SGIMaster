@extends('layouts.MenuPsa')
@section('content')
<div id="app">
    <psa-solicitud :permision="'{{$permision}}'">
    </psa-solicitud> 
</div>
@endsection
