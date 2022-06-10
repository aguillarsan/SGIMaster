<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="card-stats-title">
                            <h1 class="barlow bold">
                                Plataforma proveedores
                            </h1>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" module==1 ? 'background-color: rgb(67, 232, 180); border: 2px solid white;' : '' ">
                            <a href="" style="color: #2FCBF1" v-on:click.prevent="change_module_data(1)">
                                <div class="card-icon shadow-box-ag azul" v-bind:style=" module==1 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-plus-circle" style="font-size: 28px;color: white" v-bind:style=" module==1 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow regular">
                                        <h4 style="font-size: ;" v-bind:style=" module==1 ? 'color: white; ' : '' ">
                                            {{rol == 30 ? 'TRABAJOS EN ESPERA DE CREACIÓN':'TRABAJOS CREADOS POR EL PROVEEDOR'}}
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" module==1 ? 'color: white; ' : '' ">
                                        {{total_job}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" module==2 ? 'background-color: rgb(67, 232, 180); border: 2px solid white;' : '' ">
                            <a href="" style="color: #2FCBF1" v-on:click.prevent="
                            change_module_data(2)">
                                <div class="card-icon shadow-box-ag verde" v-bind:style=" module==2 ? 'background-color: white; ' : '' ">
                                    <i class="fas fa-network-wired" style="font-size: 28px;color: white" v-bind:style=" module==2 ? 'color: #6c757d; ' : '' ">
                                    </i>
                                </div>
                                <div class="card-wrap ">
                                    <div class="card-header barlow regular">
                                        <h4 style="font-size: ;" v-bind:style=" module==2 ? 'color: white; ' : '' ">
                                           
                                            {{rol == 30 ? ' TRABAJOS ASOCIADOS':'SOLICITUDES SGC'}}
                                        </h4>
                                    </div>
                                    <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" module==2 ? 'color: white; ' : '' ">
                                        {{total_job_sgc}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="barlow semi_bold" style="color: #191919">
                                    {{name_table}}
                                </h4> 
                                <div class="card-header-form" v-if="module == 1">
                                    <a class=" " data-toggle="modal" href="#form_job_provider">
                                        <span class="badge verde boxBounce barlow regular" style="color: white; border-radius: 5px;">
                                            <i class="fas fa-edit">
                                            </i>
                                            Declarar trabajo
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive project-list project-table">
                                    <lis-jobs-providers v-if="module == 1" :request="jobs">
                                    </lis-jobs-providers>
                                    <list-job-sgc v-if="module == 2" ></list-job-sgc>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form_provider_job>
            </form_provider_job>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus";
    import listjobsSgc from './list-job-sgc.vue';
    import formProVider from'./formprovider.vue';
    import listjobs from './list-jobs.vue';
    export default{
        props:['rol'],
    	components: {
            'form_provider_job': formProVider,
           
            'lis-jobs-providers':listjobs,
            'list-job-sgc':listjobsSgc
            
         
           

        },
         data() {
            return {
          
            	total_job:'',
            	total_job_sgc:'',
                module:1,
                name_table:'Trabajos en espera',
              
                jobs:{
                	'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0
                }
            }
              
        },
        created: function() {

           this.get_jobs_total()
          
        },
        mounted:function(){
           let self = this;
           EventBus.$on('job.get.total', function() {
                self.get_jobs_total(); // ejecutas el metodo que desees
           });
        },

        methods: {
        	get_jobs_total:function(){

               axios.get('/get_job_created').then(response=>{
                 
                   this.total_job = response.data.total_job;
                   this.total_job_sgc = response.data.total_sgc;
               
               })
        	},
        	change_module_data:function(module_id){
                this.module = module_id
                if(module_id == 1){
                	   this.loadFunction();
                       this.name_table='Trabajos en espera';
                       
                }else{
                	if(module_id==2){
                       this.name_table='Trabajos asociados';
                	}
                }
        	},
        

            date_format:function(d){
              return moment(d).format("DD/MM/YYYY");
            },
          

            loadFunction: function() {
              let loader = this.$loading.show({
          
                 container: this.fullPage ? null : this.$refs.formContainer,
                 canCancel: true,
                 onCancel: this.onCancel,
               });
     
               setTimeout(() => {
                 loader.hide()
               }, 300)
            },
 
        }
	}
</script>