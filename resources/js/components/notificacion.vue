<template>
		<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" @click.prevent="UpdateNotificaciones"   class="nav-link notification-toggle nav-link-lg "><i class="far fa-bell" style="font-size:20px;">  </i><span class="badge " style="background-color:white;color:#191919">{{totalNotifications}}</span></a>
		<div class="dropdown-menu dropdown-list dropdown-menu-right">
			<div class="dropdown-header">Notificaciones
				
			</div>
			<div class="dropdown-list-content dropdown-list-icons">
				<a href="#" class="dropdown-item dropdown-item-unread" v-for="notificacion in Notificaciones">
					<div class="dropdown-item-icon bg-primary text-white">
						<i class="fas fa-user"></i>
					</div>
					<div class="dropdown-item-desc">
						{{notificacion.descripcion}} 
						<div class="time text-primary">{{formato(notificacion.created_at)}} </div>
					</div>
				</a>
				
			</div>
			<div class="dropdown-footer text-center">
				
			</div>
		</div>
		
	</li>
</template>


<script>
import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus";
import VueSweetalert2 from 'vue-sweetalert2';




Vue.use(VueSweetalert2);

		



export default {
	data(){
		return{

			Notificaciones:'',
			active:'',
			totalNotifications:'',
			color:'',




		}
	},


	created:function(){

		this.GetTotalNotifications();
		
		setInterval(() => this.GetTotalNotifications(), 1 * 9000)

        

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
           EventBus.$on('notificacion.color', function (modulo) {
          
            self.color = modulo;
            


        });
	},
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY - hh:mm:ss");
		},
		sendAudio:function(){
			var MyTrack = new Audio('sound/notificacion.mp3');
			MyTrack.play();
		},
		GetTotalNotifications:function(){
           axios.get('/totalnotificaciones').then((response)=>{
				this.totalNotifications = response.data
                 if (this.totalNotifications != 0){
                 	this.AlertNotification();
                 }
			})

		},
		GetNotificaciones:function(){
			axios.get('/notificaciones').then((response)=>{
				this.Notificaciones = response.data

			})
			this.GetTotalNotifications()

			

			


		},
       AlertNotification:function(){
          axios.get('/statusNotificaction').then((response)=>{
				this.active = response.data
				if(this.active== 1){
                

					const Toast = Swal.mixin({
						toast: true,
						position: 'bottom-end',
						showConfirmButton: false,
						timer: 3000,
						
						onOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})

					Toast.fire({
						type: 'info',
						title: 'Tienes nuevas notificaciones.'
					})
				
				}
			})
       },
      
		UpdateNotificaciones:function(){
			this.GetNotificaciones();
			axios.get('/UpdateNotificaciones').then((response)=>{
				this.active = 2;
				this.GetTotalNotifications();
			})

		}



	}
}
</script>
