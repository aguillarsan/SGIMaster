@extends('layouts.menu')

@section('content')

<index-control-pep :permisos='@json($permisos)'>
</index-control-pep>
@endsection
