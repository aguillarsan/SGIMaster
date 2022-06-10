@extends('layouts.menu')

@section('content')



	<div class="main-content" >
		<section class="section">
			<div class="section-header shadow-box-ag" >
				<div class="col-lg-10 col-md-6 col-sm-6 col-12">

					<div class="card-stats-title" ><h1>Sitios halted </h1>
					</div>


				</div>
				<div class="col-lg-2 col-md-6 col-sm-6 col-12">
					<button class="btn btn-info" data-target="#halted"  data-toggle="modal"> <i class="fa fa-plus"></i> Crear sitio halted </button>
				</div>

			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
					<div class="card card-statistic-1 shadow-box-ag boxBounce">
						<a href="/lista">
							<div class="card-icon bg-info" >
								<i class="fas fa-globe-americas"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>HALTED</h4>
								</div>
								<div class="card-body" style="font-size: 35px;">
									{{$halted}}
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1 shadow-box-ag boxBounce">
						<div class="card-icon " style="background-color: #42e8b4;">
							<i class="fas fa-check"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>OPERATIVOS</h4>
							</div>
							<div class="card-body" style="font-size: 35px;">
								{{$operativo}}
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="card-stats-title" style="text-align: center" ><h1>Crm </h1>

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{1}}" style="color: #6c757d"><h2 > Norte</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$norteHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$norteOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{2}}" style="color: #6c757d"><h2 > Centro Norte</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$centronorteHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$centronorteOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{3}}" style="color: #6c757d"><h2 > Metropolitano</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$metropolitanoHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$metropolitanoOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{4}}" style="color: #6c757d"><h2 > Centro sur</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$centrosurHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$centrosurOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{5}}" style="color: #6c757d"><h2 >  Sur</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$surHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$surOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div> 

						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="card card-statistic-2 shadow-box-ag boxBounce">
							<div class="card-stats">
								<div class="card-stats-title" style="text-align: ">
									<a href="/ticketblade/{{6}}" style="color: #6c757d"><h2 >  Austral</h2></a>

								</div>
								<div class="card-stats-items">
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary azul blanco" style="font-size: 22px;border-radius: 3px;">			{{$australHalted}}</span></div>
										<div class="card-stats-item-label" style="font-size: 14px;">Halted</div>
									</div>
									<div class="card-stats-item">

									</div>
									<div class="card-stats-item">
										<div class="card-stats-item-count"><span class="badge shadow-primary  verde blanco" style="font-size: 22px;border-radius: 3px;">		{{$australOperativo}}</span></div>
										<div class="card-stats-item-label"style="font-size: 14px;">Operativo</div>
									</div>
								</div>
								<div style="margin-top: 30px;">

								</div>
							</div>

						</div>
					</div>
				</div>

			</section>
			<formhalted></formhalted>
		
	
		
			

		

	@endsection