<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="modal_reejcted_job" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Rechazar trabajo
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
                            <textarea class="form-control" style="height: 80px;" v-model="motivo">
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="reject_job_update()" class="btn btn-info " href="#" style="color:white">
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
    import EventBus from "../event-bus";
 

    export default{
        
         data() {
            return {
                
                total_pendiente:0,
                job_id :'',
                motivo:''
            }
              
        },
        created: function() {
       

          
         
        },
        mounted:function(){
           let self = this;
           EventBus.$on('modal.rechazo.trabajo', function(job) {
                self.show_modal(job); // ejecutas el metodo que desees
           });
        },


        methods: {
            show_modal:function(job){
                this.job_id = job
               $("#modal_reejcted_job").modal('show');
            },

            reject_job_update:function(){
               if(this.motivo == ''){
                    this.$swal({
                      type: 'error',
                      title: 'Error',
                      text:'Debe indicar el motivo.',
                      showCloseButton: true,
                    });
               }else{
               	    if(this.motivo != ''){
                         axios.get(`/rejected_job?motivo=${this.motivo}&job_id=${this.job_id}`).then(response=>{
                         	 $("#modal_reejcted_job").modal('hide');
                         	 this.motivo = '';
                             EventBus.$emit('job.created.ticket');
                         })
                	}
               }
            }

           
            
           
          

           
 
        }
    }
</script>