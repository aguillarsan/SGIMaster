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


				<li  class="active barlow" style="color: white;"> <a href="/home">Dashboard</a>  </li>
				<li  class="active barlow" style="color: white;">Crm {{strtolower($nombrecrm)}} </li>

			</ol>
		</div>
	</div>
</div>





<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-3">
			
		</div>
		<div class="col-lg-6">
			<div class="ibox float-e-margins btn btn-block" >
				<a href="/crm/{{1}}">

					<div class="ibox-content" style=" background: rgba(0,0,0,0.5); border-color: #f8ac59; border-radius: 5px;">
						<h2 class="centro"><i style="color: #f8ac59"class="fa fa-globe"></i>	<strong style="color:white ">CRM {{$nombrecrm}}</strong> </h2>


					</div>


					
				</a>
			</div>
		</div>


	</div>
</div>

<div class="tab_container">



  <input id="" class="box" type="radio"  name="tabs" >
  <label for=""><i class=""></i><span> </span></label>
  @if($modulo == 1)
  <input id="tab1" class="box" type="radio"  name="tabs" checked>
  @else
  <input id="tab1" class="box" type="radio"  name="tabs" >
  @endif
  <label for="tab1"><i class="fa fa-trello"></i><span>BACKLOG  </span>
  	<div> {{$backlog}}</div></label>


    @if($modulo == 2)
    <input id="tab2"class="box" type="radio" name="tabs" checked>
    @else
    <input id="tab2"class="box" type="radio" name="tabs">
    @endif
    <label for="tab2"><i class="fa fa-list"></i><span>EN CURSO </span>
      <div> {{$curso}}</div>
    </label>

    @if($modulo == 3)
    <input id="tab4"class="box" type="radio" name="tabs" checked>
    @else
    <input id="tab4"class="box" type="radio" name="tabs" >
    @endif
    <label for="tab4"><i class="fa fa-close"></i><span>FINALIZADAS </span>
      <div>{{$finalizada}}</div>
    </label>



    <section id="content1" class="tab-content" style="border-radius: 6px;border-color: #0CE ;background: rgba(0,0,0,0.5);box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.07);">
      <div class="wrapper wrapper-content">
        <div class="row animated fadeIn" >
          <div class="col-lg-12" >
            <div class="ibox float-e-margins"  style="">
             <div   class="row">




             </div>
             <div class="ibox"style="background: rgba(0,0,0,0.0);color: white">

              <div class="table-responsive project-list" >
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>

                      <th class="centro">#</th>
                      <th class="centro">CREADOR</th>
                      <th class="centro">ÁREA</th>
                      <th class="centro">SITIO</th>
                      <th class="centro">CATEGORÍA</th>
                      <th class="centro">ZONA </th>
                      <th class="centro">CRM </th>
                      <th class="centro">FECHA DE INICIO </th>
                      <th class="centro">FECHA DE TERMINO </th>

                      <th class="centro">DESCRIPCIÓN</th>
                      <th class="centro">IMPUTACION</th>
                      <th class="centro">ESTADO</th>
                      <th></th>

                    </tr>
                  </thead>

                  @php
                  $m = 1;
                  $id = $cod_crm.$m;
                  @endphp

                  <tr style="background: rgba(0,0,0,0.0);" class="centro">
                    <form action="/crm/{{$id}}" method="GET" enctype="multipart/form-data">


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
                    @foreach($ticket as $t)
                    <tr style="background: rgba(0,0,0,0.0);color: white">


                     <td class="centro">
                      <div>
                        <a href="{{route('ticket.show',['id' => Crypt::encrypt($t->id) ])}}" target="_blank"><span class="label label-success"style="font-size: 13px;">{{$t->id}}</span></a> 
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
                          @if($t->pop->classification)
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
                              @if($t->crm_id != null)

                              <div> 
                                @if($t->crm_id == 1)
                                <span class="label label-warning">{{$t->crm->crm}} </span>
                                @endif
                                @if($t->crm_id == 2)
                                <span class="label " style="background-color: #efa35bcf;color:white">{{$t->crm->crm}} </span>
                                @endif
                                @if($t->crm_id == 3)
                                <span class="label label-default">{{$t->crm->crm}} </span>
                                @endif
                                @if($t->crm_id == 4)
                                <span class="label " style="background-color: #23c6c8;color: white">{{$t->crm->crm}} </span>
                                @endif
                                @if($t->crm_id == 5)
                                <span class="label " style="background-color: #1c84c6;color: white">{{$t->crm->crm}} </span>
                                @endif
                                @if($t->crm_id == 6)
                                <span class="label " style="background-color: #2f4050;color: white;">{{$t->crm->crm}} </span>
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


                              <a class="btn btn-sm btn-waring" href="#fechatermino_{{$t->id}}" data-toggle="modal"  style="color:white">  {{$feTermino}}</a>
                            </div>

                          </td>
                          @else
                          <td class="centro">
                           <div>

                            <a class="btn btn-sm btn-waring" href="#fechatermino_{{$t->id}}" data-toggle="modal" style="color:white"> Sin fecha de Termino</a>
                          </div>

                        </td>
                        @endif


                        <td class="centro">
                         <div>
                           {{$t->descripcion}}
                         </div>
                       </td>
                       <td class="centro">


                        @if(Helper::imputacion($t->id))
                        @php
                        $imputacion = Helper::imputacion($t->id);
                        @endphp



                        @foreach($imputacion as $i)

                        @if($i->inputacion_id == 1)
                        <div style="margin-top: 5px;">
                          <a href="http://172.16.100.121/sho2/{{$i->nro_imputacion}}" target="_blank"><span class="label label-success">SGC {{$i->nro_imputacion}}</span></a> 
                        </div>  
                        @endif

                        @if($i->inputacion_id == 2)
                        <div style="margin-top: 5px;">
                          <a href="http://172.16.100.115/solicitud/{{$i->nro_imputacion}}" target="_blank"><span class="label label-warning">PRE-EWORK {{$i->nro_imputacion}}</span></a> 
                        </div> 
                        @endif

                        @if($i->inputacion_id ==3)
                        <div class="centro" style="margin-top: 5px;">
                          <span class="label label-primary">BTL-RED  - {{$i->nro_imputacion}}</span>
                        </div>


                        @endif

                        @if($i->inputacion_id ==4)
                        <div class="centro" style="margin-top: 5px;">
                          <span class="label label-default">ELEMENTO PEP  - {{$i->nro_imputacion}}</span>
                        </div>


                        @endif
                        @endforeach


                        @endif 
                        <br>

                        @if($t->inputacion == null)
                        <div>
                          <button class="btn btn-primary" data-toggle="modal" data-target="#Inputacion_{{$t->id}}"><i class="fa fa-plus"></i></button>
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


                  <td>

                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#fecha_{{$t->id}}" type="submit"><i class="fa fa-check"></i></button>


                    <button class="btn btn-danger btn-block"data-toggle="modal" data-target="#rechazo1_{{$t->id}}" ><i class="fa fa-close"></i></button>


                  </td>



                </tr>
                <div class="modal inmodal" id="Inputacion_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"style="color: #999999">Ingreso de Imputación</h4>
                        <small class="font-bold" style="color: #999999">Seleccione el tipo de Imputación</small>
                      </div>
                      <div class="modal-body">
                        <form action="/inputacion2/{{$t->id}}/{{1}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
                          {{method_field('PUT')}}

                          {{csrf_field()}}
                          <div class="form-group">
                            <p style="color: #999999">Inputaciones *</p>
                            <select class="form-control" style="color: #999999" id="" onchange="imputacion()" required name="inputacion" >
                              <option>
                                Seleccione

                              </option>
                              @foreach($inputaciones as $i)  
                              <option value="{{$i->id}}">
                                {{$i->descripcion}}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group" id="textInpu"  >
                            <p style="color: #999999">Ingrese Nro°</p>
                            <input type="text" class="form-control " style="color:#999999" name="nroinputacion" id=""  >
                          </div>




                        </div>
                        <div class="modal-footer">

                          <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal inmodal" id="rechazo1_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"style="color: #999999">Rechazo de ticket</h4>
                        <small class="font-bold" style="color: #999999">Ingrese El motivo del rechazo</small>
                      </div>
                      <div class="modal-body">
                        <form action="/rechazoCrm1/{{$t->id}}/{{1}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
                          {{method_field('PUT')}}

                          {{csrf_field()}}

                          <div class="form-group" id="textInpu" >
                            <p style="color: #999999">Motivo Rechazo</p>
                            <textarea type="text-area" class="form-control "  style="color:#999999 ; height: 200px;" name="motivo" id="" required ></textarea> 
                          </div>

                        </div>
                        <div class="modal-footer">

                          <button type="submit" class="btn btn-success">Aceptar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal inmodal" id="fechatermino_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"style="color: #999999">Ingreso de fecha de termino</h4>
                        <small class="font-bold" style="color: #999999">Seleccione la fecha</small>
                      </div>
                      <div class="modal-body">
                        <form action="/IngresoFecha/{{$t->id}}/{{1}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
                          {{method_field('PUT')}}

                          {{csrf_field()}}

                          <div class="form-group" id="textInpu" >
                            <p style="color: #999999">Ingrese Fecha de termino</p>
                            <input type="date" class="form-control " style="color:#999999" name="fechaCompromiso2" id="" required >
                          </div>

                        </div>
                        <div class="modal-footer">

                          <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal inmodal" id="fecha_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"style="color: #999999">Ingreso de fecha de termino</h4>
                        <small class="font-bold" style="color: #999999">Seleccione la fecha</small>
                      </div>
                      <div class="modal-body">
                        <form action="/cambioestadoCurso/{{$t->id}}/{{1}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
                          {{method_field('PUT')}}

                          {{csrf_field()}}

                          <div class="form-group" id="textInpu" >
                            <p style="color: #999999">Ingrese Fecha de termino</p>
                            <input type="date" class="form-control " style="color:#999999" name="fechaCompromiso" id="" required >
                          </div>

                        </div>
                        <div class="modal-footer">

                          <button type="submit" class="btn btn-success">Guardar cambios</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>



                @endforeach

              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>

  </div>
</div>


</section>

<section id="content2" class="tab-content"  style="border-radius: 6px;border-color: #1ab394;background: rgba(0,0,0,0.5);">
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

                <th class="centro">DESCRIPCIÓN</th>
                <th class="centro">IMPUTACION</th>
                <th class="centro">ESTADO</th>
                <th></th>
              </tr>
            </thead>

            @php
            $m = 2;
            $id = $cod_crm.$m;
            @endphp
            <tr style="background: rgba(0,0,0,0.0);" class="centro">
              <form action="/crm/{{$id}}" method="GET" enctype="multipart/form-data">

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
           @foreach($ticketcurso as $t)
           <tr style="background: rgba(0,0,0,0.0);color: white">


             <td class="centro">
              <div>
                <a href="{{route('ticket.show',['id' => Crypt::encrypt($t->id) ])}}" target="_blank"><span class="label label-success"style="font-size: 13px;">{{$t->id}}</span></a> 
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
                @if($t->pop_id != null)

                @if($t->pop->classification)
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
                    @if($t->crm_id != null)

                    <div> 
                      @if($t->crm_id == 1)
                      <span class="label label-warning">{{$t->crm->crm}} </span>
                      @endif
                      @if($t->crm_id == 2)
                      <span class="label " style="background-color: #efa35bcf;color:white">{{$t->crm->crm}} </span>
                      @endif
                      @if($t->crm_id == 3)
                      <span class="label label-default">{{$t->crm->crm}} </span>
                      @endif
                      @if($t->crm_id == 4)
                      <span class="label " style="background-color: #23c6c8;color: white">{{$t->crm->crm}} </span>
                      @endif
                      @if($t->crm_id == 5)
                      <span class="label " style="background-color: #1c84c6;color: white">{{$t->crm->crm}} </span>
                      @endif
                      @if($t->crm_id == 6)
                      <span class="label " style="background-color: #2f4050;color: white;">{{$t->crm->crm}} </span>
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


                    <a class="btn btn-sm btn-waring" href="#fechatermino2_{{$t->id}}" data-toggle="modal"  style="color:white">   {{$feTermino}}</a>
                  </div>

                </td>
                @else
                <td class="centro">
                 <div>

                  <a class="btn btn-sm btn-waring" href="#fechatermino2_{{$t->id}}" data-toggle="modal"  style="color:white">Sin fecha de Termino</a>
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


              @if(Helper::imputacion($t->id))
              @php
              $imputacion = Helper::imputacion($t->id);
              @endphp



              @foreach($imputacion as $i)

              @if($i->inputacion_id == 1)
              <div style="margin-top: 5px;">
                <a href="http://172.16.100.121/sho2/{{$i->nro_imputacion}}" target="_blank"><span class="label label-success">SGC {{$i->nro_imputacion}}</span></a> 
              </div>  
              @endif

              @if($i->inputacion_id == 2)
              <div style="margin-top: 5px;">
                <a href="http://172.16.100.115/solicitud/{{$i->nro_imputacion}}" target="_blank"><span class="label label-warning">PRE-EWORK {{$i->nro_imputacion}}</span></a> 
              </div> 
              @endif

              @if($i->inputacion_id ==3)
              <div class="centro" style="margin-top: 5px;">
                <span class="label label-primary">BTL-RED  - {{$i->nro_imputacion}}</span>
              </div>


              @endif

              @if($i->inputacion_id ==4)
              <div class="centro" style="margin-top: 5px;">
                <span class="label label-default">ELEMENTO PEP  - {{$i->nro_imputacion}}</span>
              </div>


              @endif
              @endforeach


              @endif 
              <br>

              @if($t->inputacion == null)
              <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#Inputacion2_{{$t->id}}"><i class="fa fa-plus"></i></button>
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
        <td>
         <form action="/cambioestadocrm1/{{$t->id}}/{{2}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
          {{method_field('PUT')}}

          {{csrf_field()}}

          <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-check"></i></button>
        </form>


        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#rechazo2_{{$t->id}}"><i class="fa fa-close"></i></button>
      </td>








    </tr>

    <div class="modal inmodal" id="Inputacion2_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"style="color: #999999">Ingreso de Imputación</h4>
            <small class="font-bold" style="color: #999999">Seleccione el tipo de Imputación</small>
          </div>
          <div class="modal-body">
            <form action="/inputacion2/{{$t->id}}/{{2}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
              {{method_field('PUT')}}

              {{csrf_field()}}
              <div class="form-group">
                <p style="color: #999999">Inputaciones *</p>
                <select class="form-control" style="color: #999999" id="" onchange="imputacion()" required name="inputacion" >
                  <option>
                    Seleccione

                  </option>
                  @foreach($inputaciones as $i)  
                  <option value="{{$i->id}}">
                    {{$i->descripcion}}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group" id="textInpu"  >
                <p style="color: #999999">Ingrese Nro°</p>
                <input type="text" class="form-control " style="color:#999999" name="nroinputacion" id=""  >
              </div>




            </div>
            <div class="modal-footer">

              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal inmodal" id="rechazo2_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"style="color: #999999">Rechazo de ticket</h4>
            <small class="font-bold" style="color: #999999">Ingrese El motivo del rechazo</small>
          </div>
          <div class="modal-body">
            <form action="/rechazoCrm2/{{$t->id}}/{{2}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
              {{method_field('PUT')}}

              {{csrf_field()}}

              <div class="form-group" id="textInpu" >
                <p style="color: #999999">Motivo Rechazo</p>
                <textarea type="text-area" class="form-control "  style="color:#999999 ; height: 200px;" name="motivo" id="" required ></textarea> 
              </div>

            </div>
            <div class="modal-footer">

              <button type="submit" class="btn btn-success">Aceptar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal inmodal" id="fechatermino2_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"style="color: #999999">Ingreso de fecha de termino</h4>
            <small class="font-bold" style="color: #999999">Seleccione la fecha</small>
          </div>
          <div class="modal-body">
            <form action="/IngresoFecha/{{$t->id}}/{{2}}/{{$cod_crm}}" method="POST" enctype="multipart/form-data">
              {{method_field('PUT')}}

              {{csrf_field()}}

              <div class="form-group" id="textInpu" >
                <p style="color: #999999">Ingrese Fecha de termino</p>
                <input type="date" class="form-control " style="color:#999999" name="fechaCompromiso2" id="" required >
              </div>

            </div>
            <div class="modal-footer">

              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    @endforeach

  </tbody>
</table>

</div>

</div>
</div>
</div>

</div>
</section>





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
                <th class="centro">TIEMPO</th>
                <th class="centro">DESCRIPCIÓN</th>
                <th class="centro">IMPUTACION</th>
                <th class="centro">ESTADO</th>
                <th></th>
              </tr>
            </thead>
            @php
            $m = 3;
            $id = $cod_crm.$m;
            @endphp


            <tr style="background: rgba(0,0,0,0.0);" class="centro">
              <form action="/crm/{{$id}}" method="GET" enctype="multipart/form-data">


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
           @foreach($ticketfin as $t)
           <tr style="background: rgba(0,0,0,0.0);color: white">


             <td class="centro">
              <div>
                <a href="{{route('ticket.show',['id' => Crypt::encrypt($t->id) ])}}" target="_blank"><span class="label label-success"style="font-size: 13px;">{{$t->id}}</span></a> 
              </div>



            </td>

            <td class="centro">
              <div>
                {{strtolower($t->user->name)}} {{strtolower($t->user->apellido)}}
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
                  @if($t->pop_id != null)

                  @if($t->pop->classification)
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
                      @if($t->crm_id != null)

                      <div> 
                        @if($t->crm_id == 1)
                        <span class="label label-warning">{{$t->crm->crm}} </span>
                        @endif
                        @if($t->crm_id == 2)
                        <span class="label " style="background-color: #efa35bcf;color:white">{{$t->crm->crm}} </span>
                        @endif
                        @if($t->crm_id == 3)
                        <span class="label label-default">{{$t->crm->crm}} </span>
                        @endif
                        @if($t->crm_id == 4)
                        <span class="label " style="background-color: #23c6c8;color: white">{{$t->crm->crm}} </span>
                        @endif
                        @if($t->crm_id == 5)
                        <span class="label " style="background-color: #1c84c6;color: white">{{$t->crm->crm}} </span>
                        @endif
                        @if($t->crm_id == 6)
                        <span class="label " style="background-color: #2f4050;color: white;">{{$t->crm->crm}} </span>
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
                      @if($t->dia == 1)
                      {{$t->tiempo_falla}} Dia(s)
                      @else
                      {{$t->tiempo_falla}} Hora(s)
                      @endif
                    </div>
                  </td>

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

    </div>

  </div>
</div>
</div>

</div>
</section>




</div>


<div  class="wrapper wrapper-content">

</div>

@endsection