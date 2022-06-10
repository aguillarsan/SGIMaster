<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" id="Editadminproveedor" role="dialog" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 80px;">
                        <h5 class="modal-title" style="color: white" v-if="modo == 1">
                          Editar Poveedor
                        </h5>
                        <h5 class="modal-title" style="color: white" v-if="modo == 2">
                          Crear Poveedor
                        </h5>
                        <button @click.prevent="cleanthisData" aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input type="text" name="" class="form-control" v-model="nombre">
                        </div>
                         <div class="form-group">
                            <label>
                                Rut
                            </label>
                            <input type="text" name="" class="form-control" v-model="rut">
                        </div>
                         <div class="form-group">
                            <label>
                                Contacto
                            </label>
                            <input type="text" name="" class="form-control" v-model="contacto">
                        </div>
                         
                     
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="update" class="btn btn-info " href="#" style="color:white">
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
         cesta:'',
         proveedor_id:'',
         nombre:'',
         rut:'',
         modo:'',
         contacto:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.AdminModalEditProveedor', function (proveedor,tipo) {
      
           

            self.ShowModal(proveedor,tipo); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        cleanthisData:function(){
          this.cesta = ''
         
        },
        ShowModal:function(proveedor,tipo){
          this.modo = tipo
             if(tipo == 1){
                  this.nombre=proveedor.PROVEEDOR
                  this.rut=proveedor.RUT_PROVEEDOR
                  this.proveedor_id=proveedor.id
                  $('#Editadminproveedor').modal('show');
             }else{
               if(tipo == 2){
                   
                 $('#Editadminproveedor').modal('show');
               }
             }
          
      
        },
      
       
        update:function(){
           if(this.nombre == '' && this.rut == ''){
                  this.$swal({
                    type: 'error',
                    title: 'Debes completar el nombre y el rut.',
                    showCloseButton: true,
                     });
           }else{
            if(this.nombre != '' && this.rut != ''){
               axios.get(`/UpdateDataProveedor?nombre=${this.nombre}&rut=${this.rut}&proveedor_id=${this.proveedor_id}&contacto=${this.contacto}`).then((resposne)=>{
                  $('#Editadminproveedor').modal('hide');
                   this.loadFunction()
                    if(this.modo==1){
                       let mensaje = 'Proveedor actualizado'
                       this.toastFunction(mensaje)
                    }else{
                    if(this.modo == 2){
                      if(resposne.data == 1){
                         this.$swal({
                           type: 'error',
                           title: 'El proveedor ya se encuentra registrado',
                           showCloseButton: true,
                        });
                      }else{
                        this.nombre = ''
                        this.rut = ''
                         let mensaje = 'Proveedor creado'
                       this.toastFunction(mensaje)
                      }
                     
                      }
                    }
                   
             
                   EventBus.$emit('sgc.RefreshTabProveedor')
               })
            }
           }
             
        },
        toastfunction:function(mensaje){
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
            title: mensaje
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
