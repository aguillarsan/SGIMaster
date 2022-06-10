<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="form_job_provider" role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header verde" style=" height: 70px;">
                        <h5 class="modal-title barlow bold" style="color: white">
                            Formulario
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Sitio
                                    </label>
                                    <div id="pop_select_provider_job" style="display: none">
                                        <div class="input-group">
                                            <input class="form-control" disabled="true" name="" style="background-color:#015dff;color:white;" type="" v-bind:value="site_info_select"/>
                                            <div class="input-group-append">
                                                <div @click.prevent="change_site()" class="input-group-text " style="cursor: pointer  ">
                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="serach_pop_provider">
                                        <div class="input-group">
                                            <input class="form-control" id="input_site_pro" placeholder="Buscar Sitio" style="position: relative;" type="text" v-model="site_search" v-on:keyup="search_site" value=""/>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-search">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="list_site_provider_search" style="display: none">
                                        <div class="s_l">
                                            <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m barlow regular">
                                                <div v-for="site in sites">
                                                    <a @click.prevent="select_site(site)" href="" style="color:black">
                                                        {{site.nem_site}} {{site.nombre}}
                                                        <hr style="margin-top: -1px;"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="barlow regular" id="error_site_provider" style="display: none">
                                        <p style="color: red">
                                            Favor seleccionar el sitio
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Solicitante*
                                    </label>
                                    <div id="user_select_provider_job" style="display: none">
                                        <div class="input-group">
                                            <input class="form-control" disabled="true" name="" style="background-color:#015dff;color:white;" type="" v-bind:value="user_data_select"/>
                                            <div class="input-group-append">
                                                <div @click.prevent="change_user()" class="input-group-text " style="cursor: pointer  ">
                                                    <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="search_user_provider">
                                        <div class="input-group">
                                            <input class="form-control" id="input_user_pro" placeholder="Buscar solicitante" style="position: relative;" type="text" v-model="user_search" v-on:keyup="search_user" value=""/>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fas fa-search">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="list_user_search" style="display: none">
                                        <div class="s_l">
                                            <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                <div class="barlow regular" v-for="user in user_list">
                                                    <a @click.prevent="select_user(user)" href="" style="color:black">
                                                        {{user.name}} {{user.apellido}}
                                                        <hr style="margin-top: -1px;"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="barlow regular" id="error_user_provider" style="display: none">
                                        <p style="color: red">
                                            Favor seleccionar el solicitante del trabajo
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Forma de contacto*
                                    </label>
                                    <select @change.prevent="delete_error_form()" class="form-control select barlow regular" v-model="contact_type_id">
                                        <option v-bind:value="contact.id" v-for="contact in contacts">
                                            {{contact.descripcion}}
                                        </option>
                                    </select>
                                    <div class="barlow regular" id="error_contact_provider" style="display: none">
                                        <p style="color: red">
                                            Favor seleccionar la forma de contacto
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Motivo trabajo*
                                    </label>
                                    <select @change.prevent="check_response_type_job" class="form-control select" v-model="type_job_id">
                                        <option v-bind:value="type_job.id" v-for="type_job in type_jobs">
                                            {{type_job.descripcion}}
                                        </option>
                                    </select>
                                    <div class="barlow regular" id="type_job_error" style="display: none">
                                        <p style="color: red">
                                            Favor indicar el tipo de trabajo
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group" id="visit_after_hours_div" style="display: none">
                                    <label class="barlow semi_bold">
                                        Visita fuera de horario*
                                    </label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input @change.prevent="delete_error_form()" class="selectgroup-input" name="value" type="radio" v-model="visit_after_hours_value" value="1"/>
                                            <span class="selectgroup-button barlow regular">
                                                Si
                                            </span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input @change.prevent="delete_error_form()" class="selectgroup-input" name="value" type="radio" v-model="visit_after_hours_value" value="2"/>
                                            <span class="selectgroup-button barlow regular">
                                                No
                                            </span>
                                        </label>
                                    </div>
                                    <div class="barlow regular" id="error_type_job_visit" style="display: none">
                                        <p style="color: red">
                                            Favor indicar si la visita es fuera de horario
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Trabajo realizado*
                                    </label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input @change.prevent="check_response" class="selectgroup-input" id="job_yes" name="job_execited_input_yes" type="radio" v-model="trabajo_realizado" value="1"/>
                                            <span class="selectgroup-button barlow regular">
                                                Si
                                            </span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input @change.prevent="check_response" class="selectgroup-input" id="job_no" name="job_execited_input_no" type="radio" v-model="trabajo_realizado" value="2"/>
                                            <span class="selectgroup-button barlow regular">
                                                No
                                            </span>
                                        </label>
                                    </div>
                                    <div class="barlow regular" id="error_job_executed" style="display: none">
                                        <p style="color: red">
                                            Favor declarar si el trabajo fue realizado
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group" id="input_date_job" style="display: none">
                                    <label class="barlow semi_bold">
                                        Fecha de la ejecución del trabajo*
                                    </label>
                                    <input @change.prevent="delete_error_form()" class="form-control" name="" type="date" v-model="date_job"/>
                                    <div class="barlow regular" id="error_date_job_executed" style="display: none">
                                        <p style="color: red">
                                            Favor indicar la fecha del trabajo realizado
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Número de cotización
                                    </label>
                                    <input class="form-control" name="" type="" v-model="nro_cotizacion"/>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Tipo de moneda
                                    </label>
                                    <select class="form-control select" v-model="tipo_moneda_id">
                                        <option v-bind:value="1">
                                            CLP
                                        </option>
                                        <option v-bind:value="2">
                                            UF
                                        </option>
                                        <option v-bind:value="3">
                                            USD
                                        </option>
                                        <option v-bind:value="4">
                                            EURO
                                        </option>
                                     
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Activo
                                    </label>
                                    <currency-input class="form-control " currency="USD" locale="de" v-model="activo">
                                    </currency-input>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Servicio
                                    </label>
                                    <currency-input class="form-control " currency="USD" locale="de" v-model="servicio">
                                    </currency-input>
                                </div>
                                <div class="form-group">
                                    <label class="barlow semi_bold">
                                        Descripción del trabajo*
                                    </label>
                                    <textarea @keyup.prevent="delete_error_form()" class="form-control barlow regular" style="height: 100px;" v-model="descripcion">
                                    </textarea>
                                    <div class="barlow regular" id="error_description_provider" style="display: none">
                                        <p style="color: red">
                                            {{error_description_messaje}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="validate_form_crate()" href="#">
                            <span class="badge verde boxBounce barlow regular" style="color: white; border-radius: 3px;font-size: 13px;">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus";
    export default{
        
         data() {
            return {
                contacts:[],
                contact_type_id:'',
                sites:[],
                users:[],
                site_search:'',
                contact_form:'',
                descripcion:'',
                input_width_form:'',
                site_info_select:'',
                site_id:'',
                user_search:'',
                user_list:[],
                user_id:'',
                user_data_select:'',
                nro_cotizacion:'',
                type_jobs:[],
                error_description_messaje:'Favor ingresar una breve descripción del trabajo',
                trabajo_realizado:'',
                date_job:'',
                type_job_id:'',
                visit_after_hours_value:'',
                validate_rules_date:0,
                validate_rules_type_job:0,
                activo:0,
                servicio:0,
                tipo_moneda_id:''

                }
        },
        mounted: function() {
            this.get_type_contact()
        },

        methods: {
        get_type_contact:function(){
          axios.get('/get_type_contact').then((response) => {
                  this.contacts = response.data.contact_type
                  this.type_jobs = response.data.type_job
              });
        },
        search_site: function() { 
          if (this.site_search.length >= 3) {
              this.input_width_form = document.getElementById("input_site_pro").clientWidth;
              document.getElementById('list_site_provider_search').style.display = 'block';
    
              axios.get(`/GetPop?datositio=${this.site_search}`).then((response) => {
                  this.sites = response.data
              });
          } else {
             this.sites = '';
             document.getElementById('list_site_provider_search').style.display = 'none';
          }
        },
        change_site:function(){
            this.site_id = '';
            document.getElementById('pop_select_provider_job').style.display = 'none';
            document.getElementById('serach_pop_provider').style.display = 'block';
            this.site_search='';
        },
        select_site:function(site){
                  
          this.site_id = site.id;
          document.getElementById('list_site_provider_search').style.display = 'none';
          document.getElementById('pop_select_provider_job').style.display = 'block';
          document.getElementById('serach_pop_provider').style.display = 'none';
          document.getElementById('error_site_provider').style.display = 'none';
          
          this.sites = '';
          this.site_info_select = site.nem_site + '-' + site.nombre
          
        },
        validate_form_crate:function(){
             if(this.site_id == ''){
                document.getElementById("error_site_provider").style.display = 'block'
            }
           
            if(this.user_id == ''){
                document.getElementById("error_user_provider").style.display = 'block'
            }
            if(this.contact_type_id == ''){
                document.getElementById("error_contact_provider").style.display = 'block'
            }
            if(this.descripcion == ''){
                this.error_description_messaje='Favor ingresar una breve descripción del trabajo';
                document.getElementById("error_description_provider").style.display = 'block'
            }

            if(this.type_job_id == ''){
                document.getElementById("type_job_error").style.display = 'block'
            }

            if(this.trabajo_realizado == ''){
                 document.getElementById("error_job_executed").style.display = 'block'
                 
            }else{
                if(this.trabajo_realizado == 1){
                   if(this.date_job == ''){
                      document.getElementById("error_date_job_executed").style.display = 'block';
                    }
                }
            }

           

            if(this.type_job_id == 1 || this.type_job_id == 2){
                if(this.visit_after_hours_value == ''){
                    $("#error_type_job_visit").css("display","block")
                }


            }

            if(this.type_job_id == 1 || this.type_job_id == 2){
                if(this.visit_after_hours_value != ''){
                    this.validate_rules_type_job = 1
                }
            }else{
                if(this.type_job_id == 3){
                    this.validate_rules_type_job = 2
                }
            }

            if(this.trabajo_realizado == 1 && this.date_job != ''){
                this.validate_rules_date = 1;
            }else{
                if(this.trabajo_realizado == 2 && this.date_job == ''){
                    this.validate_rules_date = 2;
                }
            }



            if( this.site_id != '' && this.user_id  != '' && this.contact_type_id != '' && this.descripcion != '' && this.type_job_id != ''){
               if(this.validate_rules_type_job == 1 || this.validate_rules_type_job == 2){
                   if(this.validate_rules_date == 1 || this.validate_rules_date == 2){
                         this.create_request()
                   }
               }
              
            }
        },
        search_user:function(){
        
               if(this.user_search.length >=3){
                   axios.get(`/GetUsers?user=${this.user_search}`).then((response) => {
                      this.user_list = response.data
                      document.getElementById("list_user_search").style.display = 'block';
                   });
                }else{
                  this.user_list = []
                   document.getElementById("list_user_search").style.display = 'none';
                }
        
             
        },
        select_user:function(user){
            this.user_id = user.id;
            this.user_list =[];
            this.user_search = '';
            this.user_data_select = user.name +' '+ user.apellido
            document.getElementById("list_user_search").style.display = 'none';
            document.getElementById("search_user_provider").style.display = 'none';
            document.getElementById("user_select_provider_job").style.display = 'block';
            document.getElementById("error_user_provider").style.display = 'none';
            
            

        },
        change_user:function(){
            document.getElementById("search_user_provider").style.display = 'block';
            document.getElementById("user_select_provider_job").style.display = 'none';
            this.user_id = '';
            this.user_data_select = '';
        },
        delete_error_form:function(){
            if(this.contact_type_id != ''){
                document.getElementById("error_contact_provider").style.display = 'none'
            }
            if(this.descripcion.length < 10){
                this.error_description_messaje='La descripción debe tener más de 10 caracteres'
            }else{
                if(this.descripcion.length >= 10){
                    this.error_description_messaje = ''
                    document.getElementById("error_description_provider").style.display = 'none'
                }
            }

            if(this.date_job != ''){
                document.getElementById("error_date_job_executed").style.diplay = 'none'
            }

            if(this.visit_after_hours_value != ''){
                 $("#error_type_job_visit").css("display","none")
                
            }

            if(this.date_job != ''){
                   $("#error_date_job_executed").css("display","none");
                   
            }

             



        },
        create_request:function(){
            let formData = new FormData();
            formData.append('site_id', this.site_id);
            formData.append('user_id', this.user_id);
            formData.append('contact_type_id', this.contact_type_id);
            formData.append('descripcion', this.descripcion);
            formData.append('nro_cotizacion',this.nro_cotizacion);
            formData.append('type_job_id',this.type_job_id);
            formData.append('date_executed',this.date_job);
            formData.append('job_executed',this.trabajo_realizado);
            formData.append('visit_after_hours',this.visit_after_hours_value);
            formData.append('activo',this.activo);
            formData.append('servicio',this.servicio);
            formData.append('tipo_moneda_id',this.tipo_moneda_id);

            $('#form_job_provider').modal('hide');
            axios.post('/create_request_provider',formData).then(response=>{
                
                this.clean_form();
                EventBus.$emit('job.created');
                EventBus.$emit('job.get.total');

            })
        },
        clean_form:function(){
            this.date_job='';
            this.type_job_id='';
            this.trabajo_realizado='';
            this.visit_after_hours_value='';
            this.nro_cotizacion='';
            this.change_site();
            this.change_user();
            this.contact_type_id = '';
            this.descripcion = '';
            $("#visit_after_hours_div").css("display","none");
            $("#input_date_job").css("display","none");
        },

        check_response:function(){
           if(this.trabajo_realizado == 1){
          
              document.getElementById("input_date_job").style.display = 'block';

           }else{
                 if(this.trabajo_realizado == 2){

                    this.date_job = ''
                    document.getElementById("error_date_job_executed").style.display = 'none';
                    document.getElementById("input_date_job").style.display = 'none';
                 }
           }
           document.getElementById("error_job_executed").style.display = 'none';
        },
        check_response_type_job:function(){

            if(this.type_job_id == 1 || this.type_job_id == 2){
                   $("#visit_after_hours_div").css("display","block");
                   $("#type_job_error").css("display","none");
                   
            }else{
                if(this.type_job_id == 3){
                    $("#error_type_job_visit").css("display","none");
                    this.visit_after_hours_value = '';
                    $("#visit_after_hours_div").css("display","none");
                    $("#type_job_error").css("display","none");

                }
            }

           

           
        },

        loadFunction: function() {
          let loader = this.$loading.show({
            // Optional parameters
             container: this.fullPage ? null : this.$refs.formContainer,
             canCancel: true,
             onCancel: this.onCancel,
           });
        // simulate AJAX
           setTimeout(() => {
             loader.hide()
           }, 300)
        },
      }
 
    }
</script>