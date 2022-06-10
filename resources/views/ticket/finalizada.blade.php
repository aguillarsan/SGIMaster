
@extends('layouts.menu')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading" style="background-color: rgba(0,0,0,0.2);">
  <div class="col-lg-12">
    <div style=" color: white; font-size:16px;" class="pull-right m-t-md m-b-xs font-weight-light font-size-20 barlow2">Gerencia OyM redes acceso
      <br/>
      <span class="pull-right text-muted">
        <div class="font-weight-light font-size-16 barlow2" style="font-size: 16px; color: white">Subgerencia de infraestructura, poder y clima</div>
      </span>
    </div>
    <div class=" m-t-md" style="">
      <div class="font-weight-normal font-size-24 barlow2 " style="font-size: 16px; color: white;">PLATAFORMA DE GESTION DE TICKETS INFRAESTRUCTURA</div>
      <ol class="breadcrumb" style="background-color: rgba(0,0,0,0.0);color: white">
        <li class="barlow2"> <a href="/home">Inicio</a></li>


        <li  class="active barlow" style="color: white;">Tickets Finalizados </li>

      </ol>
    </div>
  </div>
</div>
<div class="tab_container">
  <a href="/ticket">
    <input id="" class="box" type="radio"  name="tabs" >
    <label for=""><i class="fa fa-trello"></i><span>BACKLOG {{$totalCreado}}</span></label>
  </a>
  <a href="/curso">
    <input id=""class="box" type="radio" name="tabs">
    <label for=""><i class="fa fa-list"></i><span>EN CURSO {{$totalCurso}}</span></label>
  </a>
  <a href="/validacion">
    <input id=""class="box" type="radio" name="tabs">
    <label for=""><i class="fa fa-check"></i><span>VALIDACIÓN {{$totaljefe}}</span></label>
  </a>

  <input id="tab4"class="box" type="radio" name="tabs" checked>
  <label for="tab4"><i class="fa fa-close"></i><span>FINALIZADAS {{$totalFin}}</span></label>

  <section id="content4" class="tab-content"  style="border-radius: 6px;border-color: #ed5565;background: rgba(0,0,0,0.5);">
    <div class="row animated fadeIn">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
         <div   class="row">

          <div class="col-lg-10">

          </div>
          <div class="col-lg-2">

          </div>


        </div>
        <div class="ibox" style="background: rgba(0,0,0,0.0);color: white;">

          <div class="table-responsive project-list">
            <table class="table table-striped table-hover">
              <thead>
                <tr>

                  <th class="centro">#</th>
                  <th class="centro">CREADOR </th>
                  <th class="centro">ÁREA </th>
                  <th class="centro">SITIO </th>
                  <th class="centro">CATEGORÍA</th>
                  <th class="centro">ZONA </th>
                  <th class="centro">CRM </th>
                  <th class="centro">FECHA DE INICIO </th>
                  <th class="centro">FECHA DE TERMINO </th>
                  s
                  <th class="centro">DESCRIPCIÓN</th>
                  <th class="centro">IMPUTACION</th>
                  <th class="centro">ESTADO</th>
                  <th></th>
                </tr>
              </thead>

              <tr style="background: rgba(0,0,0,0.0);" class="centro">
                <form action="/fin" method="GET" enctype="multipart/form-data">


                 <th  class="centro">
                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="codigo">
                </th>
                <th  class="centro">
                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="usuario">


                </th>
                <th   class="centro">
                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="area">
                </th>
                <th   class="centro">
                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="sitio">
                </th>
                <th   class="centro">
                  <input type="" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="categoria">
                </th>
                <th   class="centro">

                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="zona">

                </th>
                <th   class="centro">
                  <input type="text" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="crm">
                </th>
                <th   class="centro">
                  <input type="hidden" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="">
                </th>
                <th   class="centro">
                  <input type="hidden" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="">
                </th>

                <th   class="centro">
                  <input type="hidden"  class=" m-l-xl form-control " style="color: #999;border-radius: 20px;width: ;" name="descripcion">
                </th>
                <th   class="centro">
                  <input type="hidden" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="imputacion">
                </th>
                <th   class="centro">
                  <input type="hidden" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="estado">
                </th>
                <th   class="centro">
                  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                </th>
              </form>
            </tr>
            <tbody>
             @foreach($ticketFin as $t)
             <tr style="background: rgba(0,0,0,0.0);color: white">


               <td class="centro">
                <div>
                  <a href="{{route('ticket.show',['id' => Crypt::encrypt($t->id) ])}}"><span class="label label-success"style="font-size: 13px;">{{$t->id}}</span></a> 
                </div>



              </td>

              <td class="centro">
                <div>
                  {{strtoupper($t->user->name)}} {{strtoupper($t->user->apellido)}}
                </div>



              </td>
              <td class="centro">
                <div>
                  @if($t->area_id != null)
                  @if($t->area_id == 1)
                  <span class="label label-success">
                    {{strtoupper($t->area->descripcion)}}
                    @elseif($t->area_id ==2) 
                    <span class="label label-primary">
                      {{strtoupper($t->area->descripcion)}}
                      @elseif($t->area_id==3) 
                      <span class="label label-warning">
                        {{strtoupper($t->area->descripcion)}}
                      </span> 
                      @endif
                      @endif
                    </div>



                  </td>
                  <td class="centro">
                    @if($t->pop_id != null)
                    @if($t->tipo_tecnologia == 1)
                    <div> {{$t->pop->nem_fijo}} {{$t->pop->nombre}}
                      <br>
                      <span class="label label-primary">FIJO</span>
                    </div>
                    @elseif($t->tipo_tecnologia == 2)
                    <div>{{$t->pop->nem_movil}} {{$t->pop->nombre}}
                      <br>
                      <span class="label label-success">MOVIL</span>
                    </div>
                    @endif
                    @endif
                    @if($t->pop != null)
                    @if($t->tipo_tecnologia == null)
                    <div> {{$t->pop->nem_fijo}} {{$t->pop->nombre}}
                      <br>

                    </div>
                    @endif
                    @endif
                    <br>
                    @if($t->pop_id != null)
                    <div class="centro">
                      @if($t->pop->bafi ==1)
                      <span class="label label-danger">BAFI</span>
                      @endif
                      @endif
                    </div>
                  </td>
                  <td>
                   @if($t->pop_id!= null)
                   @if($t->pop->classification != null)
                   <div class="centro">
                    @if($t->pop->classification->id ==1)
                    <span class="label label-primary ">
                     @endif
                     @if($t->pop->classification->id ==2)
                     <span class="label label-success ">
                       @endif
                       @if($t->pop->classification->id ==3)
                       <span class="label label-warning ">
                         @endif
                         @if($t->pop->classification->id ==4)
                         <span class="label label-default ">
                           @endif
                           {{$t->pop->classification->classification}}
                         </span>

                       </div>
                       @endif
                       @endif
                     </td>


                     <td class="centro">
                      @if($t->pop_id != null)

                      <div> {{$t->pop->comuna->zona->zona}} 
                        <br>
                        <span class="label label-primary">{{$t->pop->comuna->zona->cod_zona}}</span>
                      </div>


                      @endif
                    </td>
                    <td class="centro">
                      @if($t->pop_id != null)

                      <div> 
                        @if($t->pop->comuna->zona->crm->id == 1)
                        <span class="label label-warning">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif
                        @if($t->pop->comuna->zona->crm->id == 2)
                        <span class="label " style="background-color: #efa35bcf;color:white">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif
                        @if($t->pop->comuna->zona->crm->id == 3)
                        <span class="label label-default">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif
                        @if($t->pop->comuna->zona->crm->id == 4)
                        <span class="label " style="background-color: #23c6c8;color: white">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif
                        @if($t->pop->comuna->zona->crm->id == 5)
                        <span class="label " style="background-color: #1c84c6;color: white">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif
                        @if($t->pop->comuna->zona->crm->id == 6)
                        <span class="label " style="background-color: #2f4050;color: white;">{{$t->pop->comuna->zona->crm->crm}} </span>
                        @endif



                      </div>


                      @endif
                    </td>

                    @if($t->fecha_inicio != null)
                    @php

                    $feInicio = $t->fecha_inicio->format('d-m-Y');

                    @endphp
                    <td class="centro">
                     <div>
                       {{$feInicio}}
                     </div>
                   </td>

                   @else
                   <td class="centro">
                     <div>
                       SIN FECHA DE INICIO
                     </div>
                   </td>
                   @endif
                   @if($t->fecha_compromiso != null)
                   @php
                   $feTermino = $t->fecha_compromiso->format('d-m-Y');
                   @endphp
                   <td class="centro">
                     <div>
                       {{$feTermino}}
                     </div>
                   </td>
                   @else
                   <td class="centro">
                     <div>
                       Sin fecha de Termino
                     </div>
                   </td>
                   @endif


                   <td class="centro">
                     <div>
                      {{$t->descripcion}}
                    </div>
                  </td>
                  <td class="centro">
                   <div >
                    @if($t->inputacion == null)
                    <button class="btn btn-primary" data-toggle="modal" data-target="#Inputacion2_{{$t->id}}"><i class="fa fa-plus"></i></button>
                    @elseif($t->inputacion_id == 1)

                    <a href="http://172.16.100.121/sho2/{{$t->nro_inputacion}}" target="_blank"><span class="label label-success">{{$t->inputacion->descripcion}} {{$t->nro_inputacion}}</span></a> 

                    @elseif($t->inputacion_id == 2)

                    <a href="http://172.16.100.115/solicitud/{{$t->nro_inputacion}}" target="_blank"><span class="label label-warning">{{$t->inputacion->descripcion}} {{$t->nro_inputacion}}</span></a> 

                    @else

                    <div style="text-align: center;">

                      {{$t->inputacion->descripcion}}

                    </div>
                    <div class="   barlow"style="text-align: center">




                      {{$t->nro_inputacion}}

                    </div>


                    @endif
                  </div>
                </td>

                <td>
                 <div class="centro"> 
                  <span class="label " style="background-color: {{$t->estado->color}};color:white">
                    <strong>{{$t->estado->descripcion}}
                    </strong>
                  </span>
                </div>
              </td>







            </tr>

            @endforeach

          </tbody>
        </table>
        {{$ticketFin->appends(Request::only(['sitio','crm','usuario','cod_zona','estado','imputacion']))->links()}}

      </div>

    </div>
  </div>
</div>

</div>
</section>
@endsection
