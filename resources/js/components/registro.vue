<template>
    <div>
        <form class="needs-validation" method="POST" @submit.prevent="sendRequest()" novalidate="">
            <div class="form-divider">
                Datos personales
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="frist_name">
                        Nombre
                    </label>
                    <input autofocus="" class="form-control" minlength="3" placeholder="min 3 caracteres" id="frist_name" v-model="nombre" name="frist_name" required="" type="text">
                    </input>
                </div>
                <div class="form-group col-4">
                    <label for="last_name">
                        Apellido
                    </label>
                    <input class="form-control" id="last_name"  minlength="3" placeholder="min 3 caracteres"  name="last_name" v-model="apellido" required="" type="text">
                    </input>
                </div>
                <div class="form-group col-4">
                    <label for="email">
                        Email
                    </label>
                    <input class="form-control" id="email" name="email" @change.prevent="verificacionemail()" required="" type="email" v-model="email">
                        <div class="invalid-feedback">
                        </div>
                    </input>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label class="d-block" for="password">
                        Contraseña
                    </label>
                    <input class="form-control pwstrength" minlength="" data-indicator="pwindicator" v-model="contraseña" id="password" name="password" required="" type="password">
                        <div class="pwindicator" id="pwindicator">
                            <div class="bar">
                            </div>
                            <div class="label">
                            </div>
                        </div>
                    </input>
                </div>
                <div class="form-group col-6">
                    <label class="d-block" for="password2">
                        Confirmación contraseña
                    </label>
                    <input class="form-control" id="password2" v-model="contraseñaConfrm" @change.prevent="comparacionpassword()" name="password-confirm" required="" type="password">
                    </input>
                </div>
            </div>
            <div class="form-divider">
                Datos del cargo
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label>
                        Cargo
                    </label>
                    <select class="form-control" v-model="cargoid" @change.prevent="desblockSelect()"  required="">
                       <option selected="true" value="" disabled="true">Seleccione</option> 
                       <option value="1">Subgerente crm</option>
                       <option value="2">Ingeniero O&M</option>
                       <option value="3">Electrico</option>
                       <option value="4">Lider Zonal</option>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label>
                        Crm
                    </label>
                    <select class="form-control " id="selectCrm" disabled="" v-model="crmid">
                        <option selected="true" value="" disabled="true">Seleccione</option>   
                        <option value="1">
                            Norte
                        </option>
                        <option value="2">
                            Centro norte
                        </option>
                        <option value="3">
                            Metropolitano
                        </option>
                        <option value="4">
                            Centro sur
                        </option>
                        <option value="5">
                            Sur
                        </option>
                        <option value="6">
                            Austral
                        </option>
                      
                    </select>
                </div>
                <div class="form-group col-4">
                    <label>
                        Zona
                    </label>
                    <select class="form-control " id="selectZona" disabled="" v-model="zonaid">
                             <option selected="true" value="" disabled="true">Seleccione</option> 
                             <option v-for="zona in zonas" v-bind:value="zona.id"> {{zona.cod_zona}} {{zona.nombre_zona}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-block box shadow-box-ag boxBounce2" id="buttonRequest" style="background-color: #005bff;color: white;" type="submit">
                    Aceptar
                </button>
            </div>
        </form>
    </div>
</template>
<script>

import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
    data(){
        return{
            cargoid:'',
            nombre:'',
            apellido:'',
            email:'',
            contraseña:'',
            contraseñaConfrm:'',
            zonaid:'',
            crmid:'',
            zonas:[]


        }
    },

    created:function(){



        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
    },
    methods:{
        
        verificacionemail:function(){
            axios.get(`/confirmacionEmail?email=${this.email}`).then((response)=>{
                if(response.data == 1){
                  let message ='Ya existe una cuenta asociada a este correo.'
                
                  this.AlertFunction(message)
                  document.getElementById("buttonRequest").disabled=true;
                }
            })
        },
        AlertFunction:function(messaje) {
          alert(messaje)
        },
        comparacionpassword:function(){
            if(this.contraseña != this.contraseñaConfrm){
                alert('Las contraseñas deben ser iguales')
                document.getElementById("buttonRequest").disabled=true;
            }
            if(this.contraseña == this.contraseñaConfrm){
            
                document.getElementById("buttonRequest").disabled=false;
            }
        },
        desblockSelect:function(){
            if(this.cargoid == 1 || this.cargoid == 2 || this.cargoid == 3){
                document.getElementById("selectCrm").disabled=false
                document.getElementById("selectCrm").required=true
                document.getElementById("selectZona").disabled=true
                document.getElementById("selectZona").required=false
                this.zonas=[]
                this.zonaid=''
            }else{
                if(this.cargoid == 4){
                    axios.get('/GetZonas').then((response)=>{
                        this.zonas = response.data;
                    })
                    this.crmid=''
                    document.getElementById("selectCrm").disabled=true
                    document.getElementById("selectCrm").required=false
                    document.getElementById("selectZona").disabled=false
                    document.getElementById("selectZona").required=true
                }
            }
        },
        sendRequest:function(){
           if(this.cargoid == 1 || this.cargoid == 2 || this.cargoid == 3){
              if(this.nombre != '' && this.apellido != '' && this.contraseña!='' && this.contraseñaConfrm!='' && this.crmid!=''){
                axios.get(`/GetRequestCreateAccountUser?name=${this.nombre}&lastName=${this.apellido}&password=${this.contraseña}&crm=${this.crmid}&cargo=${this.cargoid}&email=${this.email}&zona=${this.zonaid}`).then((response)=>{

           
                location.reload()
                alert('Su solicitud de cuenta se envío con éxito')

                })
              }
           }else{
               if(this.cargoid == 4){
                  if(this.nombre != '' && this.apellido != '' && this.contraseña!='' && this.contraseñaConfrm!='' && this.zonaid!=''){
                   axios.get(`/GetRequestCreateAccountUser?name=${this.nombre}&lastName=${this.apellido}&password=${this.contraseña}&zona=${this.zonaid}&cargo=${this.cargoid}&email=${this.email}&crm=${this.crmid}`).then((response)=>{
                      location.reload()
                      alert('Su solicitud de cuenta se envío con éxito')

                   })
                  }
               }
           }
        }
    
    }
}
</script>