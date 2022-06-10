<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditProveedor" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title barlow semi-bold" style="color: white">
                            Editar Proveedor
                        </h5>
                        <button @click.prevent="searchNewProveedor" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" style="margin-top:10px;">
                            <label class="barlow semi-bold">
                                Proveedor*
                            </label>
                            <div id="searchProveedorDiv">
                                <div class="input-group ">
                                    <input @keyup.prevent="buscarProveedor" class="form-control" id="inputSearchProveedor" name="" placeholder="Buscar proveedor" type="text" v-model="proveedorSearch">
                                    </input>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-search">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ProveedorSelectDiv" style="display: none">
                                <div class="input-group">
                                    <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="proveedor_info_select"/>
                                    <div class="input-group-append">
                                        <div @click.prevent="searchNewProveedor()" class="input-group-text " style="cursor: pointer  ">
                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="s_l" id="listProveedorSgcShow" style="display: none">
                                <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                    <div v-for="proveedor in proveedores">
                                        <a @click.prevent="SelectProveedor(proveedor)" class="changeColor" href="" id="selectProveedorvalue" style="color: black">
                                            {{proveedor.PROVEEDOR.toLowerCase()}} - {{proveedor.RUT_PROVEEDOR}}
                                            <hr style="margin-top: -1px;"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateProveedorRequest" class="btn btn-info " href="#" style="color:white">
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
         proveedor_id:'',
         proveedores:[],
         proveedorSearch:'',
         solicitud_id:'',
         proveedor_info_select:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditProveedor', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#EditProveedor').modal('show');
        },
        buscarProveedor:function(){
            if (this.proveedorSearch.length >= 3) {
                axios.get(`/GetProveedor?proveedor=${this.proveedorSearch}`).then((response) => {
                    this.proveedores = response.data;
                })
                var box = document.getElementById('listProveedorSgcShow');
                box.style.display = '';
            } else {
                this.proveedores = '';
                var box = document.getElementById('listProveedorSgcShow');
                box.style.display = 'none';
            }
        },
        SelectProveedor:function(proveedor){
             this.proveedor_id = proveedor.id
       
            document.getElementById('searchProveedorDiv').style.display = 'none'
            document.getElementById('ProveedorSelectDiv').style.display = ''
            document.getElementById('listProveedorSgcShow').style.display = 'none'
            $('#inputSearchProveedor').val('')
            this.proveedor_info_select = proveedor.PROVEEDOR.toLowerCase()
          
          
      
        },
        searchNewProveedor:function(){
          document.getElementById('searchProveedorDiv').style.display = 'block'
            document.getElementById('ProveedorSelectDiv').style.display = 'none'
            document.getElementById('listProveedorSgcShow').style.display = 'none'
            this.proveedor_id = '';
            this.proveedorSearch='';
            $("#SearchNewProveedor").val('');
        },
        updateProveedorRequest:function(){
           
           if(this.proveedor_id != ''){
              
                axios.get(`/proveedorUpdatesgc?solicitud_id=${this.solicitud_id}&proveedor_id=${this.proveedor_id}`).then((response)=>{
                    $('#EditProveedor').modal('hide');
                    this.loadFunction()
                    this.searchNewProveedor()
                    EventBus.$emit('sgc.showRefresh')
                    this.toastfunction()
                })
           }else{
              if(this.proveedor_id == ''){
              
                  this.$swal({
                  type: 'error',
                  text:'Debe seleccionar un proveedor.',
                  title: 'Error',
                  showCloseButton: true,
                 });
           
             }
           }   
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
            title: 'Proveedor editado'
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
