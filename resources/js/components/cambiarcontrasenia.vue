<template>
    <div>
        <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal_change_password" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 25px;">
                            Cambiar contraseña
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" v-for="(input, key) in inputs">
                            <label>
                                {{input.label}} 
                            </label>
                            <div class="input-group mb-3">
                                <input :id="'input'+key" @keyup="verifyPass(key)" class="form-control" name="" type="password"/>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                        <a @click="showPassWord(key)" href="#" style="color:grey">
                                            <i class="fas fa-eye" :id="'eye'+key">
                                            </i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <p style="color:red;margin-top: -10px;" v-if="!actual_pass_correct && key  == 0 || pass_distinct && key == 2 ">
                                
                                {{!actual_pass_correct && key  == 0 ? 'La contraseña ingresada es incorrecta':( pass_distinct == false && key == 2 ? 'Las contraseñas no coinciden':'')}}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            
                            <p :style="large == false ? 'color:grey':(large == true ? 'color:#28a745':(large==''? 'color:grey':''))">
                                * La contraseña dene tener al menos 14 caracteres
                            </p>
                            <p :style="has_lowercase == false ? 'color:grey':(has_lowercase == true ? 'color:#28a745':'')">
                                * La contraseña dene tener al menos 1 letra en minúscula
                            </p>
                            <p :style="has_uppercase == false ? 'color:grey':(has_uppercase == true ? 'color:#28a745':'')">
                                * La contraseña dene tener al menos 1 letra en Mayúscula
                            </p>
                            <p :style="has_number == false ? 'color:grey':(has_number == true ? 'color:#28a745':'')">
                                * La contraseña dene tener al menos 1 caracterer númerico
                            </p>
                            <p :style="has_special == false ? 'color:grey':(has_special == true ? 'color:#28a745':'')">
                                * La contraseña dene tener al menos 1 caracterer especial
                            </p>
                            <p :style="new_pass != actual_pass ? 'color:#28a745':''" style="color: grey">
                                * La contraseña no puede ser igual a la anterior
                            </p>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" style="color:white" type="button">
                            Cerrar
                        </button>
                        <button class="btn btn-primary" @click.prevnt="changePassword()" style="color: white" type="button">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus";
import VueSweetalert2 from 'vue-sweetalert2';




Vue.use(VueSweetalert2);

		



export default {
	data(){
		return{

			new_pass:'',
			new_pass_confirm:'',
			actual_pass:'',
			actual_pass_correct:true,
			inputs:[{'label':' Contraseña actual *','model':'actual_pass'},{'label':'   Nueva contraseña *','model':'new_pass'},{'label':'Repetir Contraseña *','model':'new_pass_confirm'}],
			has_number:false,
			large:false,
			has_lowercase:false,
			has_uppercase:false,
			has_special:false,
			pass_distinct:false,



		}
	},


	created:function(){
        $("input").bind('paste', function(e){
        	e.preventDefault()
        })
		
        

	},
	
	methods:{
		verifyPass(key){
			  
			let pass = document.getElementById("input"+key).value
			if(key == 0){
              
               axios.get(`/verify-pass?password=${pass}`).then(response=>{
                  this.actual_pass_correct = response.data
                  this.actual_pass = pass;
               })
			}else{
				if(key == 1){

					this.new_pass = pass;

				   this.has_lowercase = /[a-z]/.test(pass);
                   this.has_uppercase = /[A-Z]/.test(pass);
                   this.has_number = /\d/.test(pass);
                   this.large = (pass.length > 14);
                   this.has_special   = /[!@#\$%\^\&*\)\(+=._-]/.test(pass);
                   if(this.new_pass_confirm != ''){
                   	   if(this.new_pass_confirm != this.new_pass){
                       	 this.pass_distinct = false
                       }else{
                       	 if(this.new_pass_confirm == this.new_pass){
                       	 	 this.pass_distinct = true
                       	 }
                       }
                   }
                }else{
                	if(key == 2){
                	   this.new_pass_confirm = pass
                       if(this.new_pass_confirm != this.new_pass){
                       	 this.pass_distinct = false
                       }else{
                       	 if(this.new_pass_confirm == this.new_pass){
                       	 	 this.pass_distinct = true
                       	 }
                       }
                	}
                }
			}
			
		},
		showPassWord(key){
			let pass = document.getElementById("input"+key)
			let icon = document.getElementById("eye"+key)

			if (pass.type == 'password') {
                pass.type = 'text';
                icon.style="color:#007bff";
            }else{
            	if(pass.type == 'text'){
                    pass.type = 'password';
                      icon.style="color:grey";
            	} 
            }

		},
		changePassword:function(){
			if(this.actual_pass != ''){
				if(this.actual_pass_correct){
                   if(this.new_pass != '' && this.new_pass_confirm != ''){
                   	 if(this.has_lowercase && this.has_uppercase && this.has_number && this.large && this.has_special && this.pass_distinct){
                         let formData = new FormData
                         formData.append('new_pass',this.new_pass)
                         	$("#modal_change_password").modal("hide");
                         axios.post('/change-pass',formData).then(response=>{

                         
                         	alert("Su contraseña fue modificada con éxito");

                         })
			         }
                   }
				}
			}
			
		}
		
	
		
		

       


	}
}
</script>
