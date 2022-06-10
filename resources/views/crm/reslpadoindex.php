<h2 style="text-align: center;color: white"> <strong>CRM</strong> </h2>

<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block" >
				<a href="/crm/{{1}}">
					@if($crm == 1)
					<div class="ibox-content" style=" background: rgba(0,0,0,0.8); border-color: #f8ac59; border-radius: 5px;">
						<h2 class="centro"><i style="color: #f8ac59"class="fa fa-globe"></i>	<strong style="color:white ">NORTE</strong> </h2>
						<h3 class="centro" style="color:white;">TOTAL</h3>
						<h1 class="no-margins"><span  class="label label-warning " style="font-size: 20px;">{{$norte}}</span></h1>

					</div>
					@else
					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #f8ac59; border-radius: 5px;">
						<h2 class="centro"><i style="color: #f8ac59"class="fa fa-globe"></i>	<strong style="color: white">NORTE</strong> </h2>
						<h3 class="centro" style="color:white;">TOTAL</h3>
						<h1 class="no-margins"><span  class="label label-warning " style="font-size: 20px;">{{$norte}}</span></h1>

					</div>
					@endif
					
				</a>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block">

				<a href="/crm/{{2}}">
					@if($crm ==2)
					<div class="ibox-content" style="background: rgba(0,0,0,0.8); border-color: #71604d; border-radius: 5px;">
						<h2 class="centro"><i class="fa fa-globe"  style="color: #71604d"></i> <strong  style="color: #71604d">CENTRO NORTE</strong>	</h2>
						<h3 class="centro" style="color: #71604d">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #71604d;color: white">{{$centronorte}}</span></h1>

					</div>
					@else
					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #71604d; border-radius: 5px;">
						<h2 class="centro"><i class="fa fa-globe"  style="color: #71604d"></i> <strong  style="color: white">CENTRO NORTE</strong>	</h2>
						<h3 class="centro" style="color: white">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #71604d;color: white">{{$centronorte}}</span></h1>

					</div>
					@endif
					
				</a>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block">
				<a href="/crm/{{3}}">
					@if($crm == 3)
					<div class="ibox-content" style="background: rgba(0,0,0,0.8); border-color: #999; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#999 "></i> <strong style="color:#999;">METROPOLITANO</strong>	</h2>
						<h3 class="centro" style="color: #999">TOTAL</h3>
						<h1 class="no-margins"><span  class="label label-default" style="font-size: 20px;">{{$metropolitano}}</span></h1>

					</div>
					@else
					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #d1dade; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#d1dade "></i> <strong style="color:white;">METROPOLITANO</strong>	</h2>
						<h3 class="centro" style="color: white">TOTAL</h3>
						<h1 class="no-margins"><span  class="label label-default" style="font-size: 20px;">{{$metropolitano}}</span></h1>

					</div>
					@endif
					
				</a>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block">

				<a href="/crm/{{4}}">
					@if($crm == 4)
					<div class="ibox-content" style="background: rgba(0,0,0,0.8); border-color: #23c6c8; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#23c6c8 "></i> <strong style="color:#23c6c8;">CENTRO SUR</strong>	</h2>
						<h3 class="centro" style="color: #23c6c8">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #23c6c8;color:white">{{$centrosur}}</span></h1>

					</div>
					@else
					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #23c6c8; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#23c6c8 "></i> <strong style="color:white;">CENTRO SUR</strong>	</h2>
						<h3 class="centro" style="color: white">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #23c6c8;color:white">{{$centrosur}}</span></h1>

					</div>
					@endif

				</a>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block">

				<a href="/crm/{{5}}">
					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #1c84c6; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#1c84c6 "></i> <strong style="color:white;">SUR</strong>	</h2>
						<h3 class="centro" style="color: white">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #1c84c6;color: white;">{{$sur}}</span></h1>

					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="ibox float-e-margins btn btn-block">
				<a href="/crm/{{6}}">

					<div class="ibox-content" style="background: rgba(0,0,0,0.5); border-color: #2f4050; border-radius: 5px;">
						<h2 class="centro" ><i class="fa fa-globe" style="color:#2f4050 "></i> <strong style="color:white;">AUSTRAL</strong>	</h2>
						<h3 class="centro" style="color: white">TOTAL</h3>
						<h1 class="no-margins"><span  class="label " style="font-size: 20px;background-color: #2f4050;color: white">{{$austral}}</span></h1>

					</div>
				</a>
			</div>
		</div>

	</div>
</div>