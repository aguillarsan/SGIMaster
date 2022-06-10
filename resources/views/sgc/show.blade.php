@extends('layouts.MenuSgc')

@section('content')
<div id="app">
	<sgc-detail-request :permisos="'{{$permisos}}'" :cargo_id="'{{$cargo_id}}'"  :solicitud='@json($solicitud)'  ></sgc-detail-request>
</div>
@endsection