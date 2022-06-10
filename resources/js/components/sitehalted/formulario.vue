<template>
    <div>
        <form method="POST">
            <div aria-hidden="true" class="modal inmodal" id="halted" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                                <span class="sr-only">
                                    Close
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container contact-form">
                                <div class="contact-image">
                                </div>
                                <h3>
                                    Crear Sitio Halted
                                </h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p for="fechaInicio">
                                                Tipo de problema *
                                            </p>
                                            <input @keyup.prevent="deleteError()" class="form-control " name="problema" type="text" v-model="problema" value=""/>
                                            <div id="errorProblema" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar el problema
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="motiv">
                                            <p style="color: #999999">
                                                Motivo *
                                            </p>
                                            <select @change.prevent="deleteError" class="form-control" id="motivo" name="motivo" v-model="motivoId">
                                                <option v-bind:value="1">
                                                    Vandalismo menor
                                                </option>
                                                <option v-bind:value="7">
                                                    Vandalismo mayor
                                                </option>
                                                <option v-bind:value="2">
                                                    Falla Mayor
                                                </option>
                                                <option v-bind:value="6">
                                                    Falla menor
                                                </option>
                                                <option v-bind:value="3">
                                                    Mantenimiento
                                                </option>
                                                <option v-bind:value="4">
                                                    Solicitud Stock
                                                </option>
                                                <option v-bind:value="5">
                                                    Solicitud de mejora
                                                </option>
                                            </select>
                                            <div id="errorMotivo" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar el problema
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Sitio *
                                            </label>
                                            <input name="pop" type="hidden" v-bind:value="popid">
                                                <input @click.prevent="
                          changePop" class="form-control" id="popcheck" name="" style="display: none" type="text" value="">
                                                    <div id="popSearch">
                                                        <input class="form-control" id="inputSitio" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitio" value="">
                                                            <div class="row" id="listPops" style="display:none;">
                                                                <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                                                    <div v-for="pop in pops">
                                                                        <a @click.prevent="selectdpop(pop)" href="" id="selectpopvalue" style="color:black">
                                                                            {{pop.nem_site}} {{pop.nombre}}
                                                                            <hr style="margin-top: -1px;"/>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </input>
                                                    </div>
                                                    <div id="errorPop" style="display: none">
                                                        <p style="color: red">
                                                            Favor Seleccionar el sitio
                                                        </p>
                                                    </div>
                                                </input>
                                            </input>
                                        </div>
                                        <div class="form-group" id="motiv">
                                            <p style="color: #999999">
                                                Estado  *
                                            </p>
                                            <select @change.prevent="deleteError()" class="form-control" name="state_pop_halted" style="color: #999999" v-model="state_pop_halted">
                                                <option value="7">
                                                    Halted falla
                                                </option>
                                                <option value="8">
                                                    Operativo
                                                </option>
                                            </select>
                                            <div id="errorEstado" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el estado
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p for="fechaInicio">
                                                Fecha Inicio Halted *
                                            </p>
                                            <input @change.prevent="deleteError()" class="form-control" type="date" v-model="feiniciohalted" value=""/>
                                            <div id="errorfeiniciohalted" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar una fecha
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p for="fechaInicio">
                                                Fecha Estimada de Solución *
                                            </p>
                                            <input @change.prevent="deleteError()" class="form-control" type="date" v-model="fechasolucion" value=""/>
                                            <div id="errorfechasolucion" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar una fecha
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="DivArea">
                                            <label>
                                                Área *
                                            </label>
                                            <select @change.prevent="deleteError" class="form-control " id="areas" name="area" v-model="areaId" v-on:change="tecnica">
                                                <option v-bind:value="area.id" v-for="area in areas">
                                                    {{area.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorArea" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el área
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="DivTecnica">
                                            <label >
                                                Técnica *
                                            </label>
                                            <select @change.prevent="deleteError" class="form-control " id="tecnicas" name="tecnica" v-model="tecnicaId" v-on:change="equipo">
                                                <option v-bind:value="tecnica.id" v-for="tecnica in tecnicas">
                                                    {{tecnica.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorTecnica" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar la Tecnia
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="DivEquipos">
                                            <label >
                                                Equipos *
                                            </label>
                                            <select @change.prevent="deleteError" class="form-control " id="equipo" name="equipo" v-model="equipoId">
                                                <option v-bind:value="equipo.id" v-for="equipo in equipos">
                                                    {{equipo.descripcion}}
                                                </option>
                                            </select>
                                            <div id="errorEquipo" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el equipo
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group" id="divSiniestroEquipo" style="display: none">
                                            <div class="col-lg-12">
                                                <div class="ibox float-e-margins">

                                                    <div class="ibox-content">

                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Equipo</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Descripción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              
                                                                <tr v-for="Equipement in EquiposSiniestro">
                                                                    <td><input type="checkbox"  class="form-control" v-bind:value="Equipement.id" v-model="chek" style="width: 20px;height: 20px;"  ></td>
                                                                    <td>{{Equipement.descripcion}}</td>
                                                                    <td><input type="number" class="form-control" v-model="cantidadEquipo[Equipement.id]"   ></td>
                                                                    <td><input type="text" class="form-control" id="descequipo"  > </td>
                                                                </tr>
                                                              
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                             <label >
                                                Descripción *
                                            </label>
                                            <textarea name="descripcion" class="form-control" @keyup.prevent="deleteError()"  v-model="descripcion"  placeholder="" style="width: 100%; height: 250px;"></textarea>
                                            <div id="errorDescripcion" style="display: none">
                                                <p style="color: red">
                                                    Favor ingresar una descripción 
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p for="fechaInicio">Archivos</p>
                                            <input type="file" name="files" v-on:change="handleFileUploads()" id="files"
ref="files" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button class="ladda-button ladda-button-demo btn btn-success" @click.prevent="CreateSiteHalted()"  id="BtnCrear" data-style="zoom-in" >Crear</button>
                        
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';



export default {
    data(){
        return{
            
           motivoId:'',
           descripcion:'',
           areaId:'',
           tecnicaId:'',
           popid:'',
           datositio:'',
           pops:'',
           state_pop_halted:'',
           problema:'',
           feiniciohalted:'',
           fechasolucion:'',
           areas:[],
           tecnicas:[],
           equipos:[],
           tecnicaId:'',
           equipoId:'',
           descripcion:'',
           EquiposSiniestro:[],
           chek:[],
           cantidadEquipo:[],
           files:[]

        }
    },

    created:function(){

         this.GetArea();
              


    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
    },
    methods:{
        GetArea:function(){
          axios({
                    method: 'Get',
                    responseType: 'json',
                    url: '/Getarea',
                }).then(response => {
                    this.areas = response.data
                });
        },
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
         handleFileUploads: function() {
        let uploadedFiles = this.$refs.files.files;

        /*
          Adds the uploaded file to the files array
        */
        for (var i = 0; i < uploadedFiles.length; i++) {
            this.files.push(uploadedFiles[i]);
        }
        },
        CreateSiteHalted:function(){
        let formData = new FormData();
        formData.append('pop', this.popid);
        formData.append('descripcion', this.descripcion);
        formData.append('cantidad', this.cantidadEquipo);
        formData.append('area', this.areaId);
        formData.append('tecnica', this.tecnicaId);
        formData.append('equipo', this.equipoId);
        formData.append('motivo', this.motivoId);
        formData.append('mantencion', this.mantencionId);
        formData.append('problema', this.problema);
        formData.append('feiniciohalted', this.feiniciohalted);
        formData.append('fechasolucion', this.fechasolucion);
        formData.append('state_pop_halted', this.state_pop_halted);
        formData.append('ck', this.chek);
        for (var i = 0; i < this.files.length; i++) {
            let file = this.files[i];
            formData.append('files[' + i + ']', file);
        }

        axios.post('/halted',formData,
        {
            headers:{
                'Content-Type': 'multipart/form-data'
            }
           }
        ).then((response)=>{
              location.reload();

        })
        

        },
        deleteError: function() {
        if (this.motivoId != '') {
            if(this.motivoId == 1 || this.motivoId == 7){
               document.getElementById("DivArea").style.display = 'none'; 
               document.getElementById("DivTecnica").style.display = 'none'; 
               document.getElementById("DivEquipos").style.display = 'none'; 
               document.getElementById("divSiniestroEquipo").style.display = 'block'; 
               this.areaId=''
               this.tecnicaId=''
               this.equipoId=''
               axios.get('/GetEquipoSiniestro').then((response)=>{
                  this.EquiposSiniestro = response.data
               })

            }else{
               document.getElementById("DivArea").style.display = 'block'; 
               document.getElementById("DivTecnica").style.display = 'block'; 
               document.getElementById("DivEquipos").style.display = 'block'; 
               document.getElementById("divSiniestroEquipo").style.display = 'none';
            }
           document.getElementById('errorMotivo').style.display = 'none';
        
            
        }
        if (this.descripción != '') {
          document.getElementById('errorDescripcion').style.display = 'none';
        }
        
        if (this.state_pop_halted != '') {
          document.getElementById('errorEstado').style.display = 'none';
        }

         if (this.feiniciohalted != '') {
          document.getElementById('errorfeiniciohalted').style.display = 'none';
        }
         if (this.fechasolucion != '') {
          document.getElementById('errorfechasolucion').style.display = 'none';
        }
       
        if (this.descripcion != '') {
           document.getElementById('errorDescripcion').style.display= 'none';
       
        }
        if (this.areaId != '') {
           document.getElementById('errorArea').style.display = 'none';
         
        }
        if (this.tecnicaId != '') {
           document.getElementById('errorTecnica').style.display = 'none';
            
        }
      
    },
     BuscarSitio: function() {
        if (this.datositio.length >= 3) {
            var url = '/GetPop'
            var box = document.getElementById('listPops');
            box.style.display = '';
            axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                this.pops = response.data
            });
        } else {
            this.pops = '';
            var box = document.getElementById('listPops');
            box.style.display = 'none';
        }
    },
     selectdpop: function(pop) {
        this.popid = pop.id;
        var box = document.getElementById('listPops');
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        var divAlertPop = document.getElementById('errorPop');
        this.pops = '';
        searchPop.style.display = 'none';
        selectPop.style.display = '';
        divAlertPop.style.display = 'none';
        box.style.display = 'none';
        $("#popcheck").val(pop.nem_site +' '+ pop.nombre);
    },
      changePop: function() {
        var selectPop = document.getElementById('popcheck');
        var searchPop = document.getElementById('popSearch');
        searchPop.style.display = '';
        selectPop.style.display = 'none';
        this.popId = '';
        this.popid='';
        this.dataPop = '';
        $('#inputSitio').val('');
    },
     tecnica: function() {
        var idaea = document.getElementById('areas').value;
        if (this.motivoId == 4 && this.areaId == 1) {
            axios.get('/GetFilterTecnica').then((response) => {
                this.tecnicas = response.data;
            })
        } else {
            if (this.motivoId == 4 && this.areaId == 2) {
                axios.get('/GetFilterTecnicaClima').then((response) => {
                    this.tecnicas = response.data;
                })
            } else {
                axios({
                    method: 'Get',
                    responseType: 'json',
                    url: '/GetTecnica/' + idaea,
                }).then(response => {
                    this.tecnicas = response.data
                });
            }
        }
    },
    equipo:function() {
        var idtecnica = document.getElementById('tecnicas').value;
        axios({
            method: 'Get',
            responseType: 'json',
            url: '/GetEquipo/' + idtecnica,
        }).then(response => {
            this.equipos = response.data
        });
    },
        
    }
}
</script>
