<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="MasiveUploadSGCData" role="dialog" tabindex="-1">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Subir archivo
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
                                Archivo*
                            </label>
                            <input @change.prevent="ShowFiles" class="form-control"  name="myfile"  type="file">
                            </input>
                        </div>
                        <div class="file-listing " v-if="files_upload.length != 0">
                            <div>
                                <div style="margin-top: 8px;">
                                </div>
                                <span class="badge " style="border-radius: 5px;background-color: #015dff;color: white;">
                                    {{ files_upload.name }}
                                    <a href="#" v-on:click="removeFiles()">
                                        <i class="fas fa-times-circle boxBounce" style="color:white">
                                        </i>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6 col-12" id="DivLoadFiles" style="display: none">
                            <label class="modal-title">
                                Subiendo archivos...
                            </label>
                            <div class="progress mb-3" data-height="25">
                                <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar" role="progressbar">
                                    <div v-if=" getProgress == 'NaN%'">
                                    </div>
                                    <div v-if=" getProgress != 'NaN%'">
                                        {{getProgress}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="UploadFilesRequest" class="btn btn-info " href="#" id="btnUpladFiles" style="color:white">
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
         archivos:[],
      
         files_upload:'',
         
        
         porcentaje:{
                type:Number,
                default:0
          },

            
   

        }
    },

    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
       
       
        EventBus.$on('sgc.ModalUploadShow', function () {
            $('#MasiveUploadSGCData').modal('show');
           


      });
    },
     
       

    created:function(){

 

        

    },
   
    methods:{
        
        
       
      
      
        UploadFilesRequest:function(){
           if(this.files_upload.length != 0){
              let formData = new FormData();
              
              formData.append('file_upload_masive', this.files_upload);
              
              document.getElementById("btnUpladFiles").disabled='true'
              document.getElementById("DivLoadFiles").style.display='block'
              

             axios.post(`/MasiveUploadSGC`,
              formData,
              {
                headers:{
                  'Content-Type': 'multipart/form-data'
                },
                onUploadProgress:e=>{
                    if(e.lengthComputable){
                        this.porcentaje = (e.loaded / e.total)*100

                    }
                }
              }).then((response)=>{
             
                $('#MasiveUploadSGCData').modal('hide');
                   this.loadFunction()
                this.toastfunction()
                $("#archivosUpload").val('');
                this.files_upload  = ''
                EventBus.$emit('sgc.RefreshTable')
                document.getElementById("btnUpladFiles").disabled='false'
                document.getElementById("DivLoadFiles").style.display='none'

             })
           }else{
            
              if(this.files_upload.length == 0){
                   this.$swal({
                  type: 'error',
                  title: 'Debes cargar al menos un archivo.',
                  showCloseButton: true,
                 });
              }
             
           }
        },

        
        ShowFiles:function(event){
         this.files_upload = event.target.files[0];
        
        
        
        },
         removeFiles( key ){
          this.files_upload = ''
             $("#archivosUpload").val('');
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
            title: 'Carga masiva realizada con éxito.'
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
