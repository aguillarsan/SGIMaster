<template>
	<div>
		<form method="PUT" v-on:submit.prevent="UpdateFechaCreacion(datosTicketUpdate.id)">
			<div class="modal inmodal" id="fecha" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content animated bounceInRight">
						<div class="modal-header">

							<h4 class="modal-title"style="color: #999999">Ingreso de fecha de termino</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">


							<div class="form-group" id="textInpu" >
								<p style="color: #999999">Ingrese Fecha de termino</p>
								<input type="date" class="form-control " style="color:#999999" name="fechaCompromiso" v-model="datosTicket.fechaCompromiso" id="fechaInput" required >
							</div>

						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-success">Aprobar</button>

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	import axios from 'axios';

	import EventBus from "./event-bus"


	export default {
		data(){
			return{



			}
		},

		created:function(){
          



		},

		methods:{



		}
	}
</script>
