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


				<li  class="active barlow" style="color: white;">Detalle halted</li>

			</ol>
		</div>
	</div>
</div>


<input id="tab1" class="box" type="radio"  name="tabs" checked>
<label for="tab1"><i class=" " style="color: #1ab394"></i><span class="blanco"> </span></label>
<br>
<div class=" style1 -bg" style="color: white; " >

	<div class="row "> 



	</div>


</div>
<section id="content1" class="tab-content"  style="border-radius: 12px; background: rgba(0,0,0,0.4);">

	<div class=" row wrapper wrapper-content  animated fadeIn" style=" background: rgba(0,0,0,0.0);">


		<h3 class="centro blanco" style="font-size: 23px; "> HALTED NRO°
			{{$halted->id}} 


		</h3>
		
		<div class="col-lg-12" >
			@if($halted->pop_id  != null)
			<div class="col-lg-4" style="color: white;" >
				@if($halted->pop->nem_fijo != null && $halted->pop->nem_movil != null)
				<h3>{{$halted->pop->nem_fijo}}-{{$halted->pop->nem_movil}}</h3>
				@else
				<h3>{{$halted->pop->nem_fijo}} {{$halted->pop->nem_movil}}</h3>
				@endif

				@if($halted->pop->core == 1)
				<div>
					<span class="label label-danger">POP CORE</span>
				</div>
				@endif
			</div>
			<div class="col-lg-4" style="text-align: center;color: white">
				<div>POP</div>
				@if($halted->pop != null)
				<div><h3>{{$halted->pop->nombre}}</h3></div>
				@endif
			</div>
			<div class=" pull-right">
				<div class="centro
				blanco">CRM</div>
				@if($halted->pop != null)
				<div ><h3 class="centro blanco">{{strtoupper($halted->pop->comuna->zona->crm->crm)}}</h3></div>
				@endif
			</div>
			@else
			SIN POP
			@endif
		</div>



	</div>
	<div class=" row wrapper wrapper-content  animated fadeIn" style=" background: rgba(0,0,0,0.7);border-radius: 12px;box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.50)">

		<div class="col-lg-12" style="">
			@if($halted->pop_id != null)
			<div class="col-lg-2 m-t-md">
				<div class="centro">
					<span class="label label-success " style="font-size: 15px;">{{$halted->pop->classification->classification}}</span>
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">CLASIFICACIÓN</small></strong></div>
			</div>
			<div class="col-lg-2 m-t-md">

				<div class="centro">
					@if($halted->pop->attention_priority_id == 1)
					<span class="label label-success " style="font-size: 15px;">P1</span>
					@endif
					@if($halted->pop->attention_priority_id == 2)
					<span class="label label-success " style="font-size: 15px;">P2</span>
					@endif
					@if($halted->pop->attention_priority_id == 3)
					<span class="label label-success " style="font-size: 15px;">P3</span>
					@endif
					@if($halted->pop->attention_priority_id == 4)
					<span class="label label-success " style="font-size: 15px;">P4</span>
					@endif
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">PRIORIDAD DE ATENCIÓN EN TERRENO</small></strong></div>
			</div>
			<div class="col-lg-2 m-t-md">
				<div class="centro">
					<span class="label label-success " style="font-size: 15px;">{{$halted->pop->dependencies}}</span>
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">DEPENDENCIAS</small></strong></div>
			</div>
			<div class="col-lg-2 m-t-md">
				<div class="centro">
					@if($halted->pop->category_id ==1)
					<span class="label label-warning " style="font-size: 15px;">A</span>
					@endif
					@if($halted->pop->category_id ==2)
					<span class="label label-warning " style="font-size: 15px;">A+</span>
					@endif
					@if($halted->pop->category_id ==3)
					<span class="label label-warning " style="font-size: 15px;">A++</span>
					@endif
					@if($halted->pop->category_id ==4)
					<span class="label label-warning " style="font-size: 15px;">B+</span>
					@endif
					@if($halted->pop->category_id ==5)
					<span class="label label-warning " style="font-size: 15px;">C</span>
					@endif
					@if($halted->pop->category_id ==6)
					<span class="label label-warning " style="font-size: 15px;">C+</span>
					@endif
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">CLASIFICACIÓN PLANIFICACIÓN</small></strong></div>
			</div>
			<div class="col-lg-2 m-t-md">
				<div class="centro">
					<span class="label label-success " style="font-size: 15px;">{{$halted->pop->autonomy}} <small>hrs.</small></span>
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">AUTONOMÍA TEÓRICA</small></strong></div>
			</div>
			<div class="col-lg-2 m-t-md">
				<div class="centro">
					<span class="label label-success " style="font-size: 15px;">{{$halted->pop->cod_planificacion}} </span>
				</div>
				<div class="centro m-t-sm"><strong><small class="blanco">CÓDIGO POP PLANIFICACIÓN</small></strong></div>
			</div>
		</div>

		@else
		SIN POP
		@endif

	</div>

	<div class="row wrapper wrapper-content" style=" background: rgba(0,0,0,0.0);">
		<div class="col-lg-12">

			<div class="col-lg-4" style=" background: rgba(0,0,0,0.4);border-radius: 10px;box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.20);margin-left: -20px;">
				@if($halted->pop_id != null)
				<div class="ibox">
					<div class="centro blanco m-t-md">
						<strong style="font-size: 17px;">DATOS DEL SITIO</strong>				
					</div>
					<div class="ibox-content " style=" background: rgba(0,0,0,0.0);">

						<div class="blanco col-lg-9">

							<div>
								<small class="blanco"><strong> CRM</strong></small>
							</div>
							{{$halted->pop->comuna->zona->crm->crm}}
						</div>
						<div class="blanco col-lg-3">

							<div>
								<small class="blanco"><strong> ZONA</strong></small>
							</div>
							<div>
								{{$halted->pop->comuna->zona->zona}}
							</div>
							<div>
								{{$halted->pop->comuna->zona->cod_zona}}
							</div>




						</div>



					</div>
					<div  class="ibox-content " style=" background: rgba(0,0,0,0.0);">
						<div>
							<strong class="blanco"><small>NEMONICOS</small> </strong>

						</div>
						<div class="m-t-sm"></div>
						<div class="col-lg-9">

							<div>
								<small class="blanco"><strong> FIJO</strong></small>
							</div>
							<div class="blanco">	
								{{$halted->pop->nem_fijo}}
							</div>


						</div>
						<div class="col-lg-3">

							<div>
								<small class="blanco"><strong> MOVIL</strong></small>
							</div>
							<div class="blanco">	
								{{$halted->pop->nem_movil}}
							</div>

						</div>
						<br>
						<br>
						<div class="col-lg-12">
							<div class="m-t-md">
								<strong class="blanco"><small>DIRECCIÓN</small></strong>

							</div>
							<div class="blanco">
								{{strtoupper($halted->pop->direccion)}}
							</div>
						</div>

						<div class="col-lg-6 m-t-md">
							<div class="m-t-sm ">
								<strong class="blanco"><small>COMUNA</small></strong>
								<div class="blanco"> {{$halted->pop->comuna->comuna}}</div>
								

							</div>
						</div>
						<div class="col-lg-6 m-t-md">
							<div class="m-t-sm ">
								<strong class="blanco " style="margin-left: ;" ><small>REGIÓN</small></strong>
								<div class="blanco"> {{$halted->pop->comuna->region->sigla_region}}-{{$halted->pop->comuna->region->region}}</div>
								
							</div>
						</div>


					</div>
					<div class="ibox-content" style=" background: rgba(0,0,0,0.0);">
						<div class="">
							<strong class="blanco"><small>COORDENADAS</small></strong>

						</div>
						<div class="col-lg-9">
							<strong class="blanco"><small>LATITUD</small></strong>
							<div class="blanco">{{$halted->pop->latitud}}</div>

						</div>
						<div class="col-lg-3">
							<strong class="blanco"><small>LONGITUD</small></strong>
							<div class="blanco">{{$halted->pop->longitud}}</div>
							
						</div>
					</div>
				</div>
				@else
				
				@endif

				
			</div>

			<div class="col-lg-4" style=" background: rgba(0,0,0,0.4);border-radius: 10px;box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.20); margin-left:15px;">
				<div class="ibox">
					<div class="centro blanco m-t-md">
						<strong style="font-size: 17px;">DATOS DEL HALTED {{$halted->id}}</strong>				
					</div>
					<div class="ibox-content " style=" background: rgba(0,0,0,0.0);">

						<div class="blanco col-lg-3">
							<div>
								<strong class="blanco"><small>ÁREA</small></strong>
							</div>
							@if($halted->area_id != null)
							{{$halted->area->descripcion}}
							@endif

							
						</div>
						<div class="blanco col-lg-3">
							<div>
								<strong class="blanco"><small>TÉCNICA</small></strong>
							</div>
							@if($halted->tecnica_id != null)
							{{$halted->tecnica->descripcion}}
							@endif




						</div>
						<div class="blanco col-lg-3">
							<div>
								<strong class="blanco"><small>EQUIPO</small></strong>
							</div>
							@if($halted->equipo_id != null)
							{{$halted->equipo->descripcion}}
							@endif




						</div>

						<div class="blanco col-lg-3">
							<div>
								<strong class="blanco"><small>FECHA INICIO</small></strong>
							</div>
							@if($halted->fecha_inicio != null)
							@php

							$feInicio = $halted->fecha_inicio->format('d-m-Y');

							@endphp
							{{$feInicio}}
							@else
							SIN FECHA
							@endif
							




						</div>



					</div>
					<div  class="ibox-content " style=" background: rgba(0,0,0,0.0);">
						<div class="blanco col-lg-12">
							<div>
								<strong class="blanco"><small>DESCRIPCIÓN</small></strong>
							</div>


							<div>
								{{$halted->descripcion}}
							</div>

							




						</div>
					</div>
					<div class="ibox-content" style=" background: rgba(0,0,0,0.0);">
						<div class="blanco col-lg-6">
							<div>
								<strong class="blanco"><small>CREADOR</small></strong>
							</div>

							{{$halted->user->name}} {{$halted->user->apellido}}
							




						</div>
						<div class="blanco col-lg-6">
							<div>
								<strong class="blanco"><small>FECHA CREACIÓN</small></strong>
							</div>

							@if($halted->created_at != null)
							@php

							$fecha_creada = $halted->created_at->format('d-m-Y');

							@endphp
							{{$fecha_creada}}
							@else
							SIN FECHA
							@endif
							




						</div>


					</div>
					 @if($equipement_ticket_verification != 0)

						<div class="col-lg-12">
							<div class="ibox float-e-margins" >

								<div class="ibox-content" style=" background: rgba(0,0,0,0.0);color: white">

									<table class="table  table-project">
										<thead>
											<tr>
											
												<th>EQUIPO</th>
												<th>CANTIDAD</th>
												<th>DESCRIPCIÓN</th>
											</tr>
										</thead>
										<tbody>
											@foreach($equipement_ticket as $e)


											<tr>
												<td>
													{{$e->equipo->descripcion}}

												</td>
												<td>
													{{$e->cantidad}}
												</td>
												<td>
													{{$e->descripcion}}
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						@endif
					
					
					
				</div>
			</div>
			<div class="col-lg-4" style="">
				<div class="ibox-content" style="background: rgba(0,0,0,0.4);border-radius: 10px;box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.07);" >

					<h3 style="text-align: center; font-size: 14px;color: white">BITÁCORA </h3>
					<div class="chat-form">
						<form method="POST" action="/MensajeHalted/{{$halted->id}}" enctype="multipart/form-data" class="form">

							{{method_field('PUT')}}

							{{csrf_field()}}
							<div class="form-group">
								<textarea class="form-control" style=" background: rgba(0,0,0,0.4); color: white; font-size:16px;border-radius: 40px;" name="mensaje" placeholder="Mensaje" required ></textarea>
							</div>
							<div class="text-right">
								<button type="submit" style="background-color:#1b84c6;color: white; font-size:15px;" class="btn btn-sm btn-primary m-t-n-xs"> Enviar Mensaje</button>
							</div>

						</form>

					</div>
					<br>

					<div class="ibox-content full-height-scroll" style="max-height: 300px !important;background: rgba(0,0,0,0.4);border-radius: 10px;" >
						@foreach($log as $l)
						<ul class=" sortable-list connectList agile-list" style="">
							<li class="" id="task1" style="background: rgba(0,0,0,0.0);border-radius: 10px;color: white">
								<div class="chat-element " style="background: rgba(0,0,0,0.0);border-radius: 10px;">
									<a href="#" class="pull-left">
										

										<img alt="image" style="width: 25px;height: 25px;"class="img-circle" src="{{$l->user->avatar}}">

									</a>
									@php
									$fechaBitacora =  $l->created_at->format('d/m/Y');
									$hora= substr($l->created_at,-8);
									@endphp
									<div class="media-body ">
										<small class="pull-right" style=" font-size:19;">{{$l->created_at->diffForHumans()}}</small>


										<h2 class=""style="font-size:11px;color: white">{{strtoupper($l->user->name)}} {{strtoupper($l->user->apellido)}}</h2>

										<p class="m-b-xs " style="  font-size:12px;">
											{{$l->descripcion}}
										</p>
										<small class="text-muted pull-right" style="font-size:10px;color: white">  {{$fechaBitacora}} {{$hora}}</small>

									</div>
								</div>
							</li>
						</ul> 
						@endforeach

					</div>

				</div>

			</div>

		</div>
	</div>


	<div class="table-responsive">
		<div class="wrapper wrapper-content" style="background: rgba(0,0,0,0.4);border-radius: 10px;">
			<div class="row">
				<div class="col-lg-4">
					<div class="ibox float-e-margins">
						<div class="ibox-content" style="background: rgba(0,0,0,0.4);border-radius: 10px;">
							<div class="file-manager">
								<h5 class="blanco centro">Arrastre o seleccione archivos</h5>
								<form action="/subirArchivosHalted/{{$halted->id}}" method="POST" enctype="multipart/form-data" >
									{{method_field('PUT')}}

									{{csrf_field()}}

									<ul class="folder-list" style="padding: 0;background-color:;">
										<input type="file" required id="drop" style="; margin-top:10px;" name="files[]" multiple />
									</ul>


									<div class="hr-line-dashed"></div>
									<button class="btn btn-success btn-block">Subir Archivos</button>
									<div class="hr-line-dashed"></div>
								</form>

								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 animated fadeInRight">
					<div class="row">
						<div class="col-lg-12" >

							@foreach($archivos as $archivo)
							<div class="file-box"style="background: rgba(0,0,0,0.0); border-color:rgba(0,0,0,0.0); " >
								<div class="file"style="background: rgba(0,0,0,0.0);border-color:rgba(0,0,0,0.0);">
									<a href="#">
										

										<div class="icon">

											<a href="../archivos/{{$archivo->nombre_archivo}}" target="_blank"><img src="{{$archivo->icono_archivo}}" style="width: 90px;height:80px;border-radius: 10px;" ></a>

										</div>
										<div class="file-name " style="background: rgba(0,0,0,0.0);border-color:rgba(0,0,0,0.0);">
											<small class="break-word">
												<strong><a href="../archivos/{{$archivo->nombre_archivo}}" target="_blank">{{$archivo->nombre_archivo}}</a></strong>
											</small>													
											<br/>
											<small style="color: white;">Creado: <strong style="color: white;">	{{ $archivo->created_at->toFormattedDateString()}}  </strong></small>
											<div class="file-name"  style="background: rgba(0,0,0,0.0);border-color:rgba(0,0,0,0.0);">
												<form action="/elimarArchivoHalted/{{$archivo->id}}" method="POST" enctype="multipart/form-data" >
													{{method_field('PUT')}}

													{{csrf_field()}}

													<button class="btn btn-block" id="" type="submit"   style="margin-top: 7px;background-color:#ed5565 ;color: white;" ><i class="fa fa-trash"></i></button>
												</form>
											</div>
										</div>
									</a>
								</div>

							</div>



							@endforeach




						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<div style="margin-top: 100px;">
	jkbj
</div>

@endsection