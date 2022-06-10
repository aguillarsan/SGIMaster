<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="EditStite" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-sm">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Ediar sitio
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Sitio*
                            </label>
                            <div id="popcheckSgc" style="display: none">
                                <div class="input-group ">
                                    <input @click.prevent="
                                                      changePop" class="form-control " id="popNameSgc" name="" type="text" value="">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-undo-alt">
                                                </i>
                                            </div>
                                        </div>
                                    </input>
                                </div>
                            </div>
                            <div id="popSearchSgc">
                                <div class="input-group ">
                                    <input class="form-control " id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitioSgc">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-search">
                                                </i>
                                            </div>
                                        </div>
                                    </input>
                                </div>
                                <div class="row" id="listPopsSgc" style="display:none;">
                                    <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                        <div v-for="pop in pops">
                                            <a @click.prevent="selectdpop(pop)" href="" id="selectpopvalue" style="color:black">
                                                {{pop.nem_site}}  {{pop.nombre}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="errorPop" style="display: none">
                                <p style="color: red">
                                    Favor Seleccionar el sitio
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateSiteRequest" class="btn btn-info " href="#" style="color:white">
                            Aceptar
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
import EventBus from "../event-bus"


export default {
    data(){
        return{
         popId:'',
         
         datositio:'',
         solicitud_id:'',
         pops:[]

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditSite', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#EditStite').modal('show');
        },
        BuscarSitioSgc:function(){
            if(this.datositio.length >= 3){
               var url = '/GetPop'
               var box = document.getElementById('listPopsSgc');
               box.style.display='';
               axios.get(`/GetPop?datositio=${this.datositio}`).then((response) =>{

                 this.pops = response.data

               });
             }else{
               this.pops = '';
               var box = document.getElementById('listPopsSgc');
               box.style.display='none';
             }

        },
        selectdpop:function(pop){
 
  
                this.popId = pop.id;
                var box = document.getElementById('listPopsSgc');
                var selectPop = document.getElementById('popcheckSgc');

                var searchPop = document.getElementById('popSearchSgc');
                var divAlertPop = document.getElementById('errorPop');
 

  
                  this.pops='';

                  searchPop.style.display='none'; 
                  selectPop.style.display='';

                  divAlertPop.style.display  = 'none';
              
                 
                  $("#popNameSgc").val(pop.nem_site + '-' + pop.nombre);
                  box.style.display='none'; 




        },
        updateSiteRequest:function(){
           if(this.popId != ''){
            console.log(this.popId)
              axios.get(`/updateSiteSgc?solicitud_id=${this.$route.params.id}&site_id=${this.popId}`).then((response)=>{
                $('#EditStite').modal('hide');
                 this.toastfunction()
                 this.loadFunction()
                 EventBus.$emit('sgc.showRefresh')
                 this.changePop()
                
              })
           }else{
            if(this.popId == ''){
                this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar un sitio.',
                  showCloseButton: true,
                 });
            }
           }
        },

        changePop:function(){
                var selectPop = document.getElementById('popcheckSgc');

                var searchPop = document.getElementById('popSearchSgc');
                $('#popNameSgc').val('');
                searchPop.style.display=''; 
                selectPop.style.display='none';
                this.popId='';
                this.dataPop='';
               
        },
      
        toastfunction:function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
           })
           Toast.fire({
            type: 'success',
            title: 'Sitio editado'
           })
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

          
        },
      
        
    }
</script>
