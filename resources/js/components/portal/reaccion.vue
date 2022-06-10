<template>
    <div>
        <div class="geme-social-share pt-5 d-flex">
            <p>
                Que opinas?
            </p>
            <a href="#" @click.prevent="setReaccion(1)">
                <i class="fas fa-thumbs-up" style="color: #2fcbf1; font-size: 20px;">
                </i>
            </a>
            <div>
                <span class="badge badge-primary ">
                    {{totalLikes}}
                </span>
            </div>
            <a href="#" @click.prevent="setReaccion(2)">
                <i class="fas fa-surprise" style="color: #2fcbf1; font-size: 20px;">
                </i>
            </a>
            <div>
                <span class="badge badge-primary ">
                    {{totalAsombro}}
                </span>
            </div>
            <a href="#" @click.prevent="setReaccion(3)">
                <i class="fas fa-smile-beam" style="color: #2fcbf1; font-size: 20px;">
                </i>

            </a>
            <div>
                <span class="badge badge-primary ">
                    {{totalAngry}}
                </span>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import moment from 'moment';



export default {
	  props: [ 'id' ],
	data(){
		return{
		  totalLikes:'',
		  totalAngry:'',
          totalAsombro:''


		}
	},

	created:function(){

     this.getLikes()

		

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		
	},
	methods:{
		formato:function(d){
			return moment(d).format("DD/MM/YY - hh:mm:ss");
		},
		getLikes:function(){
			axios.get('/GettotalLikes/'+this.id).then((response)=>{
               this.totalLikes = response.data
			})
			axios.get('/GetAngry/'+this.id).then((response)=>{
               this.totalAngry = response.data
			})
		    axios.get('/GetAsombro/'+this.id).then((response)=>{
               this.totalAsombro = response.data
			})
		},
		setReaccion:function(reaccion){
			axios.get('/setReaccion/'+this.id+'/'+reaccion).then((response)=>{
				this.getLikes()
			})
		}

		
		
	}
}
</script>