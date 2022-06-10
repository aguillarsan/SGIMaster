@extends('layouts.MenuSgc')

@section('content')
 <tablerequest :rol="'{{$rol}}'" :cargo_id="'{{$cargo_id}}'"></tablerequest>

@endsection