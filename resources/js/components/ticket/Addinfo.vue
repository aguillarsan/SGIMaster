<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="addInfoTicket" role="dialog"
            tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Completar datos del ticket
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true" style="color: white">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="barlow semi_bold">
                                Área *
                            </label>
                            <select  class="form-control select barlow regular" id="areas"
                                name="area" v-model="area_id" v-on:change="tecnica">
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
                        <div class="form-group">
                            <label class="barlow semi_bold" for="fechaInicio">
                                Técnica *
                            </label>
                            <select  class="form-control select barlow regular "
                                id="tecnicas" name="tecnica" v-model="tecnica_id" v-on:change="equipo">
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
                        <div class="form-group" id="equiposId">
                            <label class="barlow semi_bold" for="fechaInicio">
                                Equipos *
                            </label>
                            <select  class="form-control select barlow regular" id="equipo"
                                name="equipo" v-model="equipo_id">
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
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button @click="updateTicket" class="btn btn-secondary btn-grey">
                            Guardar cambios
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
    import EventBus from "../event-bus"


    export default {
        data() {
            return {
                areas: [],
                tecnicas: [],
                equipos:[],
                area_id:'',
                tecnica_id:'',
                equipo_id:'',
                formData: new FormData



            }
        },

        created: function () {
            this.getData()
        },
        mounted: function () {



        },
        methods: {
            updateTicket(){
               if(this.area_id != "" && this.tecnica_id != "" && this.equipo_id != ""){

                 this.formData.append('area_id',this.area_id)
                 this.formData.append('tecnica_id',this.tecnica_id)
                 this.formData.append('equipo_id',this.equipo_id)
                 this.formData.append('ticket_id',this.$route.params.id)

                 axios.post('/udpate/data/ticket/expres',this.formData).then(response =>{
                    $('#addInfoTicket').modal('hide');
                   
                 })
                 EventBus.$emit('ticket.ticketData')
               }
            },

            getData() {
                axios.get('/Getarea').then(response => {
                    this.areas = response.data
                });

            },
            tecnica: function () {
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
            equipo: function () {
                var idtecnica = document.getElementById('tecnicas').value;
                axios({
                    method: 'Get',
                    responseType: 'json',
                    url: '/GetEquipo/' + idtecnica,
                }).then(response => {
                    this.equipos = response.data
                });
            },




        },


    }
</script>