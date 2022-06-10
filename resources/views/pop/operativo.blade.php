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


				<li  class="active barlow" style="color: white;">Listado operativo </li>

			</ol>
		</div>
	</div>
</div>


<div class="tab_container">
	<a href="/lista">
		<input id="" class="box" type="radio"  name="tabs" >
		<label for=""><i class="fa fa-trello"></i><span>HALTED {{$totalhalted}}</span></label>
	</a>
	
	<input id="tab2"class="box" type="radio" name="tabs" checked>
	<label for="tab2"><i class="fa fa-list"></i><span>OPERATIVO {{$totaloperativo}}</span></label>
	

	<section id="content2" class="tab-content" style="border-radius: 6px;border-color: #0CE ;background: rgba(0,0,0,0.5);box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.07);">
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
											<th class="centro">DÍAS EN HALTED</th>
											<th class="centro">DESCRIPCIÓN</th>

											<th class="centro">ESTADO</th>
											<th></th>

										</tr>
									</thead>
									<tbody>
										<thead>

											<tr style="background: rgba(0,0,0,0.0);" class="centro">
												<form action="/operativo" method="GET" enctype="multipart/form-data">


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
														<input type="hidden" class="form-control" style="color: #999;border-radius: 20px;width: ;" name="estado">
													</th>
													<th   class="centro">
														<button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
													</th>
												</form>
											</tr>

										</thead>
										@foreach($operativo as $t)
										<tr style="background: rgba(0,0,0,0.0);color: white">


											<td class="centro">
												<div>
													<a href="{{route('halted.show',['id' => Crypt::encrypt($t->id) ])}}" target="_blank"><span class="label label-success"style="font-size: 13px;">{{$t->id}}</span></a>	
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
														<div> 
															<a href="http://172.16.100.123/inventario/index.php?mod=pop&id_pop={{$t->pop->id}}" target="_blank"> {{$t->pop->nem_fijo}} {{$t->pop->nombre}}</a> 
															<br>
															<span class="label label-primary">FIJO</span>
														</div>
														@elseif($t->tipo_tecnologia == 2)
														<div>
															<a href="http://172.16.100.123/inventario/index.php?mod=pop&id_pop={{$t->pop->id}}" target="_blank"> {{$t->pop->nem_movil}} {{$t->pop->nombre}}</a> 

															<br>
															<span class="label label-success">MOVIL</span>
														</div>
														@endif
														@endif

														@if($t->pop != null)
														@if($t->tipo_tecnologia == null)
														<div > 
															<a style="color: white;" href="http://172.16.100.123/inventario/index.php?mod=pop&id_pop={{$t->pop->id}}" target="_blank"> {{$t->pop->nem_movil}} {{$t->pop->nem_fijo}} {{$t->pop->nombre}}</a> 
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
														</div>
														@endif
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
																@if($t->fecha_solucion != null)
																@php
																$feTermino = $t->fecha_solucion->format('d-m-Y');
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
																	@php
																	$dias = $t->fecha_inicio->diffInDays($t->fecha_solucion);
																	@endphp
																	@if($dias <= 5)
																	<span style="font-size: 12px" class="label label-primary">{{$dias}}</span>
																	@elseif($dias >=6 && $dias <=15)
																	<span style="font-size: 12px" class="label label-warning">{{$dias}}</span>
																	@elseif($dias>=16)
																	<span style="font-size: 12px" class="label label-danger">{{$dias}}</span>
																	@endif
																</td>

																<td class="centro">
																	<div>
																		{{$t->descripcion}}
																	</div>
																</td>


																<td>
																	<div class="centro"> 
																		<span class="label " style="background-color: {{$t->state_halted->color}};color:white">
																			<strong>{{strtoupper($t->state_halted->descripcion)}}
																			</strong>
																		</span>
																	</div>
																	<div class="centro m-t-sm"  >
																		<span class="label " style="background-color: {{$t->state_pop_halted->color}};color:white">
																			<strong>{{strtoupper($t->state_pop_halted->descripcion)}}
																			</strong>
																		</span>
																	</div>
																</td>


																<td>
																	<form action="/haltedUpdate/{{$t->id}}" method="POST" enctype="multipart/form-data">
																		{{method_field('PUT')}}

																		{{csrf_field()}}

																		<button class="btn btn-primary btn-block"  type="submit"><i class="fa fa-check"></i></button>

																	</form>



																	<button class="btn btn-danger btn-block"data-toggle="modal" data-target="#rechazo1_{{$t->id}}" ><i class="fa fa-close"></i></button>


																</td>





															</tr>

															<div class="modal inmodal" id="rechazo1_{{$t->id}}" tabindex="-1" role="dialog" aria-hidden="true">
																<div class="modal-dialog modal-sm">
																	<div class="modal-content animated bounceInRight">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																			<h4 class="modal-title"style="color: #999999">Rechazo de ticket</h4>
																			<small class="font-bold" style="color: #999999">Ingrese El motivo del rechazo</small>
																		</div>
																		<div class="modal-body">
																			<form action="/rechazo1/{{$t->id}}" method="POST" enctype="multipart/form-data">
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




															@endforeach

														</tbody>
													</table>
													{{$operativo->appends(Request()->all(['sitio','crm','usuario','cod_zona','estado','imputacion']))->links()}}


												</div>

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