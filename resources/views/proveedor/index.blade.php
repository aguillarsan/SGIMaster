@extends('layouts.MenuSgc')

@section('content')
<proveedor-list :permisos="'{{$permisos}}'"></proveedor-list> 
@endsection