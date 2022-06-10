<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="addmantencion" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Añadir mantención
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
                                Motivo*
                            </label>
                            <select class="form-control select" name="motivo" v-model="motivo_id" >
                              <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateMotivo" class="btn btn-info " href="#" style="color:white">
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
         area_id:'',
         areas:[],
         ticket_id:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('ticket.modalAddMantencionOlt', function (ticket) {
      
           
         
            self.ShowModal(ticket); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(ticket){
            this.ticket_id=ticket
            this.getArea()
            $('#addmantencion').modal('show');
        },
        getArea:function(){
          
            axios.get('/Getarea').then((response)=>{
                    this.areas = response.data
            })
                      
        },
      
      
        updateMotivo:function(){
           if(this.area_id != ''){
             axios.get(`/editMotivoTicket?ticket_id=${this.$route.params.id}&area_id=${this.area_id}`).then((response)=>{
              
                $('#addmantencion').modal('hide');

                this.toastfunction()
                this.loadFunction()
           
            

             })
               EventBus.$emit('ticket.ticketData')
           }else{
             if(this.area_id == ''){
              
                 this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar un motivo.',
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
            title: 'Motivo de trabajo editado.'
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
