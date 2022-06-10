@extends('layouts.menu_ticket_ing')
@section('content')
<div id="app">
    <showing :code="'{{$cod}}'" :data='@json($data)'>
    </showing>
   
</div>
@endsection
