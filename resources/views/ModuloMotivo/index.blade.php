@extends('layouts.menu')

@section('content')

<div id="app">
  <indexmotivo :id="'{{$id}}'"></indexmotivo>
</div>	

@endsection