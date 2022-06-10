<template>
    <div>
        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12 ">
                <div class="card mt-4 shadow-box-ag" style="border-radius: 8px;">
                    <div class="card-header" style="background: -webkit-linear-gradient(left,#0072ff,#00c6ff );">
                        <h2 class="barlow semi_bold blanco " style="color:white">
                            Sitios
                        </h2>
                    </div>
                    <div class="card-body">
                        <div id="tabs_sitios_tickets">
                            <div class="row">
                                <div class="col-lg-2 col-md-4 col-sm-12 " v-for="sitio in sitios_tickets.data">
                                    <a @click.prevent="show_information_ticket(sitio)" class="box_select_blue" href="#">
                                        <div class="card card-statistic-1 boxBounce box_select_blue" style="border-radius: 6px;box-shadow: 0 0.5em 1em -0.125em rgb(10 10 10 / 10%), 0 0px 0 1px rgb(10 10 10 / 2%);">
                                            <div class="card-wrap">
                                                <div class="card-header">
                                                    <h4 class="barlow semi_bold" style="color: #191919;font-size: 16px;">
                                                        {{sitio.site.nem_site}}
                                                    </h4>
                                                    <div class="barlow regular" style="font-size: 16px;color: #191919">
                                                        {{sitio.total}} Tickets
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <nav aria-label="pagination" class="pagination" role="navigation">
                                    <vue-pagination :offset="4" :pagination="sitios_tickets" @paginate="get_sitios()">
                                    </vue-pagination>
                                </nav>
                            </div>
                        </div>
                        <div class="row" id="information_site_ticket" style="display: none">
                            <div class="col-lg-2 col-md-4 col-sm-12 ">
                                <a @click.prevent="back_all_list_sites()" href="#">
                                    <div class="card card-statistic-1 box_select_blue " style="border-radius: 6px;box-shadow: 0 0.5em 1em -0.125em rgb(10 10 10 / 10%), 0 0px 0 1px rgb(10 10 10 / 2%);">
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4 class="barlow semi_bold" style="color: #191919;font-size: 16px;">
                                                    {{sitio_information_nem}} - {{sitio_information_nombre}}
                                                </h4>
                                            </div>
                                            <hr/>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row" id="list_tickets" style="display: none">
                            <ul class="list-group" style="border-radius: 6px;box-shadow: 0 0.5em 1em -0.125em rgb(10 10 10 / 10%), 0 0px 0 1px rgb(10 10 10 / 2%);">
                                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="ticket in tickets">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                            <span class="badge blue blanco" style="border-radius: 6px;">
                                                {{ticket.id}}
                                            </span>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-12 barlow regular">
                                            {{ticket.user ? ticket.user.name : '' }} {{ticket.user ? ticket.user.apellido : '' }}
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                            <span class="badge verde blanco" style="border-radius: 6px;">
                                                {{ticket.tipo_motivo? ticket.tipo_motivo.descripcion:''}}
                                            </span>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            {{ticket.descripcion}}
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-12">
                                            <span :style="'color:white;'+'background-color:#2fcbf1;'+'font-size:12px;'+'border-radius:6px;'+'background-color:'+ticket.estado.color+';'" class="badge barlow semi_bold">
                                                {{ticket.estado.descripcion}}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div style="margin-top: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
	import VuePagination from '../VuePagination.vue';
    export default{
    	components: {
            'vue-pagination': VuePagination,
            
          

        },
         data() {
         	 return { 
         	 	sitios_tickets:{'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                },
                sitio_information_nem:'',
                sitio_information_nombre:'',
                tickets:[]
         	 }
         },
         mounted: function() {
           this.get_sitios()
         },
         methods:{
         	get_sitios:function(){
         		axios.get(`/total_sitios_tickets?page=${this.sitios_tickets.current_page}`).then((response=>{
          	      this.sitios_tickets = response.data
               }))
         	},
         	show_information_ticket:function(sitio){
         		this.sitio_information_nem = sitio.site.nem_site
         		this.sitio_information_nombre = sitio.site.nombre
         		document.getElementById("tabs_sitios_tickets").style.display = 'none' 
         		axios.get('/get-ticket-site/'+sitio.site_id).then((response=>{
         			this.tickets = response.data
         			document.getElementById("list_tickets").style.display = 'block' 
         			document.getElementById("information_site_ticket").style.display = 'block' 
         		}))
         		
         	},
         	back_all_list_sites:function(){
         		this.sitio_information_nem = ''
         		this.sitio_information_nombre = ''
         		this.tickets = []
         		document.getElementById("tabs_sitios_tickets").style.display = 'block' 
         	    document.getElementById("list_tickets").style.display = 'none' 
         		document.getElementById("information_site_ticket").style.display = 'none' 
         		
         	}
         }
	}
</script>