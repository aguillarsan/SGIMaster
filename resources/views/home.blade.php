@extends('layouts.menu')

@section('content')
@php
use Illuminate\Support\Facades\Auth;
use App\role_user;
use App\Configuracion_user;

$rol = role_user::where('user_id', Auth::user()->id)->select('role_id')->get(['role_id']);
    foreach ($rol as $r) {
       $RoleId = $r->role_id;
    }

$mode = Configuracion_user::where('user_id', Auth::user()->id)->get();
foreach ($mode as $m) {
            $modeid = $m->configuracion_id;
        }
@endphp
<div id="app">
    <div class="main-content">
        <input id="userid" name="" type="hidden" value="{{Auth::user()->id}}">
            
        </input>
        <baglog :config="'{{$modeid}}'" :crm_select="'{{$crm}}'" :selectmotivo="'{{$motivoid}}'" :rol_id="'{{$RoleId}}'"></baglog>
      
    </div> 
</div>
@endsection
