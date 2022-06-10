<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditUser" role="dialog" tabindex="-1">
            <div class="modal-dialog" style="max-width: 400px;">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header" style="background: -webkit-linear-gradient(#1e5e98 ,#0f0c29); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Editar creador
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
                                Usuario*
                            </label>
                            <div id="usercheck" style="display: none">
                                <div class="input-group">
                                    <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;" type="" v-bind:value="user_full_name"/>
                                    <div class="input-group-append">
                                        <div @click.prevent="changeUser()" class="input-group-text " style="cursor: pointer  ">
                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="userSearchdiv">
                                <div class="input-group ">
                                    <input @keyup.prevent="SearchUser" class="form-control " id="inpuruserseach" placeholder="Buscar usuario" type="text" v-model="nameUser">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="fas fa-search">
                                                </i>
                                            </div>
                                        </div>
                                    </input>
                                </div>
                            </div>
                            <div id="listUsers" style="display:none;">
                                <div class="s_l">
                                    <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                        <div v-for="user in users">
                                            <a @click.prevent="selectUser(user)" href="" id="selectpopvalue" style="color:black">
                                                {{user.name}} {{user.apellido}}
                                                <hr style="margin-top: -1px;"/>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a @click.prevent="updateUserRequest" class="btn btn-info " href="#" style="color:white">
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
         user_id:'',
         users:[],
         nameUser:'',
         solicitud_id:'',
         input_width_form:0,
         user_full_name:''

            
   

        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('sgc.modalEditUser', function (solicitud) {
      
           

            self.ShowModal(solicitud); // ejecutas el metodo que desees
           
        });
       
      
    },
    methods:{
        
        ShowModal:function(solicitud){
            this.solicitud_id=solicitud
            $('#EditUser').modal('show');
        },
        SearchUser:function(){
            if (this.nameUser.length >= 3) {
              this.input_width_form = document.getElementById("inpuruserseach").clientWidth;
              document.getElementById('listUsers').style.display = '';
              axios.get(`/GetUsers?user=${this.nameUser}`).then((response) => {
                this.users = response.data

                
            });
            }else {
               this.users = '';
               document.getElementById('listUsers').style.display = 'none'
           
            }
        },
        selectUser:function(user){
            document.getElementById('listUsers').style.display = 'none'
            document.getElementById('usercheck').style.display = 'block'
            document.getElementById('userSearchdiv').style.display = 'none'
           

            this.user_full_name = user.name + ' ' + user.apellido;
            this.user_id = user.id
            this.nameUser = ''
        },
        changeUser:function(){
          document.getElementById('listUsers').style.display = 'none'
          document.getElementById('usercheck').style.display = 'none'
          document.getElementById('userSearchdiv').style.display = 'block'
          $("#userName").val('');
          this.user_id = ''
        },
        updateUserRequest:function(){
           
           if(this.user_id != ''){
              
                axios.get(`/userUpdatesgc?solicitud_id=${this.solicitud_id}&user_id=${this.user_id}`).then((response)=>{
                    $('#EditUser').modal('hide');
                    this.loadFunction()
                    this.changeUser()
                    EventBus.$emit('sgc.showRefresh')
                    this.toastfunction()
                })
           }else{
              if(this.user_id == ''){
              
                  this.$swal({
                  type: 'error',
                  title: 'Debe seleccionar a un usuario.',
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
            title: 'Usuario editado'
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
