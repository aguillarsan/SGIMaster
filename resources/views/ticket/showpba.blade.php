@extends('layouts.menu')

@section('content')

<div class="main-content" >
	<section class="section">
		<div class="section-header shadow-box-ag" >

			<div class="card-stats-title" ><h1>Ticket Nro° 255 </h1>
				


			</div>
			
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-6 col-sm-6 col-12">

				<ul class="progressbar">
					<li class="active">Solicitar cotizaciones</li>
					<li>Generar PxQ</li>
					<li>Indicar cuenta de cargo</li>
					<li class="active">Definir empresa</li>
					<li class="active">Crear SGC</li>
					<li class="active">Número OC</li>
					<li>Informe Final</li>

				</ul>

			</div>
		</div>

		<br>
		<div class="row">

			<div class="col-lg-4 col-md-6 col-sm-6 col-12">

				<div class="card card-hero  shadow-box-ag" >
					<div class="card-header"style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
						<div class="card-icon">

							<i class="fas fa-ticket-alt" style="color: #42E8B4"></i>
						</div>
						<h4>Ticket</h4>
						<div class="card-description">Datos del ticket </div>
					</div>
					<div class="card-body p-0">
						<div class="tickets-list">
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>My order hasn't arrived yet</h4>
								</div>
								<div class="ticket-info">
									<div>Laila Tazkiah</div>
									<div class="bullet"></div>
									<div class="text-primary">1 min ago</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Please cancel my order</h4>
								</div>
								<div class="ticket-info">
									<div>Rizal Fakhri</div>
									<div class="bullet"></div>
									<div>2 hours ago</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Do you see my mother?</h4>
								</div>
								<div class="ticket-info">
									<div>Syahdan Ubaidillah</div>
									<div class="bullet"></div>
									<div>6 hours ago</div>
								</div>
							</a>
							<a href="features-tickets.html" class="ticket-item ticket-more">
								View All <i class="fas fa-chevron-right"></i>
							</a>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12 ">

				<div class="card card-hero  shadow-box-ag">
					<div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
						<div class="card-icon">
							<i class="fas fa-globe-americas"style="color: #42E8B4"></i>
						</div>
						<h4>Pop</h4>
						<div class="card-description">Datos del sitio</div>
					</div>
					<div class="card-body p-0">
						<div class="tickets-list">
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>My order hasn't arrived yet</h4>
								</div>
								<div class="ticket-info">
									<div>Laila Tazkiah</div>
									<div class="bullet"></div>
									<div class="text-primary">1 min ago</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Please cancel my order</h4>
								</div>
								<div class="ticket-info">
									<div>Rizal Fakhri</div>
									<div class="bullet"></div>
									<div>2 hours ago</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Do you see my mother?</h4>
								</div>
								<div class="ticket-info">
									<div>Syahdan Ubaidillah</div>
									<div class="bullet"></div>
									<div>6 hours ago</div>
								</div>
							</a>
							<a href="features-tickets.html" class="ticket-item ticket-more">
								View All <i class="fas fa-chevron-right"></i>
							</a>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 col-12">

				<div class="card chat-box shadow-box-ag" id="mychatbox">
					<div class="card-header">
						<h4 style="color: #005cff">Bitacora</h4>
					</div>
					<div class="card-body chat-content">
						<div class="chat-item chat-left" style="">
							<img src="../layout/img/avatar/avatar-1.png">
							<div class="chat-details">
								<div class="chat">Sebastián Aguilar</div>
								<div class="chat-text">Ticekt Actualizado</div>
								<div class="chat-time">11/12/2019 09:49</div>
							</div>
						</div>
						<div class="chat-item chat-right" style="">
							<img src="../layout/img/avatar/avatar-1.png">
							<div class="chat-details">
								<div class="chat">Nicolas Ponce</div>
								<div class="chat-text" style="background-color: #005cff">Ticket Aprobado</div>
								<div class="chat-time">11/12/2019 09:49</div></div>
							</div>

						</div>

						<div class="card-footer chat-form">
							<form id="chat-form">
								<input type="text" class="form-control" placeholder="Escribe un mensaje">
								<button class="btn btn-primary">
									<i class="far fa-paper-plane"></i>
								</button>
							</form>
						</div>
					</div>


				</div>
			</div>
			<div class=" row">
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<div class="card shadow-box-ag">
						<div class="card-header">
							<h4 class="d-inline">Tareas</h4>
							
						</div>
						<div class="card-body">
							<ul class="list-unstyled list-unstyled-border">
								<li class="media">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cbx-1">
										<label class="custom-control-label" for="cbx-1"></label>
									</div>
									
									<div class="media-body">
										<div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
										<h6 class="media-title"><a href="#">Solicitar Cotizaciones</a></h6>
										
									</div>
								</li>
								<li class="media">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cbx-2" checked="">
										<label class="custom-control-label" for="cbx-2"></label>
									</div>

									<div class="media-body">
										<div class="badge badge-pill badge-primary mb-1 float-right">Completed</div>
										<h6 class="media-title"><a href="#">Generar PxQ</a></h6>
										
									</div>
								</li>
								<li class="media">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cbx-3" >
										<label class="custom-control-label" for="cbx-3"></label>
									</div>

									<div class="media-body">
										<div class="badge badge-pill badge-warning mb-1 float-right">Progress</div>
										<h6 class="media-title"><a href="#">Indicar cuenta de cargo</a></h6>

									</div>
								</li>
								<li class="media">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cbx-4">
										<label class="custom-control-label" for="cbx-4"></label>
									</div>
									
									<div class="media-body">
										<div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
										<h6 class="media-title"><a href="#">Definir empresa</a></h6>
										
									</div>
								</li>
								<li class="media">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cbx-4">
										<label class="custom-control-label" for="cbx-4"></label>
									</div>
									
									<div class="media-body">
										<div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
										<h6 class="media-title"><a href="#">Crear SGC</a></h6>
										
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-6 col-lg-4">
					<div class="card">
						<div class="card-header">
							<h4>Archivos</h4>
						</div>
						<div class="card-body shadow-box-ag">
							<div class="gallery gallery-md">
								<div class="gallery-item" data-image="../layout/img/news/img03.jpg" data-title="Image 1"></div>
								<div class="gallery-item" data-image="../layout/img/news/img14.jpg" data-title="Image 2"></div>
								<div class="gallery-item" data-image="../layout/img/news/img08.jpg" data-title="Image 3"></div>
								<div class="gallery-item" data-image="../layout/img/news/img05.jpg" data-title="Image 4"></div>
								<div class="gallery-item" data-image="../layout/img/news/img11.jpg" data-title="Image 5"></div>
								<div class="gallery-item" data-image="../layout/img/news/img09.jpg" data-title="Image 6"></div>
								<div class="gallery-item" data-image="../layout/img/news/img12.jpg" data-title="Image 8"></div>
								<div class="gallery-item" data-image="../layout/img/news/img13.jpg" data-title="Image 9"></div>
								<div class="gallery-item" data-image="../layout/img/news/img14.jpg" data-title="Image 10"></div>
								<div class="gallery-item" data-image="../layout/img/news/img15.jpg" data-title="Image 11"></div>
								<div class="gallery-item gallery-more" data-image="../assets/img/news/img08.jpg" data-title="Image 12">
									<div>+2</div>
								</div>
								<div class="gallery-item gallery-hide" data-image="../assets/img/news/img01.jpg" data-title="Image 9"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>









	</section>
</div>
@endsection