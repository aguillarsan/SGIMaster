<template>
	<div class="">

		<ul class="list-unstyled list-unstyled-border">
			<li class="media" v-for="tarea in tareas">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="cbx-1">
					<label class="custom-control-label" for="cbx-1"></label>
				</div>

				<div class="media-body">
					<div class="badge badge-pill badge-danger mb-1 float-right">Not Finished</div>
					<h6 class="media-title"><a href="#">{{tarea.descripcion}}</a></h6>

				</div>
			</li>
			
		</ul>

	</div>

</template>

<script>
import axios from 'axios';




export default {
	data(){
		return{
			tareas:[],
			


		}
	},

	created:function(){
		this.getTareas();


	},
	methods:{

		getTareas:function(){
			axios.get('/tareas')
			.then((response) => {

				this.tareas = response.data
			})

		}

	}
}
</script>
