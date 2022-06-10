<template>
    <div aria-hidden="true" class="modal inmodal" id="form_ticket" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header md_h_s">
                    <h5 class="modal-title" style="color: white">
                        Formulario
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true" style="color: white">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="barlow semi_bold">*Plataforma</label>
                        <select class="form-control select barlow regular" v-model="input.plataforma_id">
                            <option class="barlow regular" :value="plataforma.id" v-for="plataforma in plataformas">
                                {{plataforma.descripcion}}
                            </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="barlow semi_bold">*Motivo</label>
                        <select class="form-control select" v-model="input.motivo_id">
                            <option class="barlow regular" :value="motivo.id" v-for="motivo in motivos">
                                {{motivo.descripcion}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="barlow semi_bold">*Descripción</label>
                        
                        <textarea class="form-control" style="height:150px" maxlength="1000"
                            v-model="input.descripcion"></textarea>
                        <div class="barlow regular">
                            {{input.descripcion.length}}/1000
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="barlow semi_bold">Archivos (opcional)</label>
                        <input class="form-control" ref="inpFile" @change="getFiles" type="file" multiple="true">
                    </div>
                    <div class="row tck_suport" v-if="input.files.length != 0">
                        <div class="col-lg-3 text-center" v-for="(file,key) in input.files">
                            <div class="browser " :title="file.name"> <i style="font-size:55px"
                                    :class="typeFile(file.name)"></i></div>
                            <div class="mt-2 barlow regular">{{shortName(file.name)}}</div>
                            <div class="text-muted text-small">
                                <a href="#" @click="deleteFile(key)"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-info barlow semi_bold" @click="createTicket" href="#" style="color:white">
                        Generar ticket
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import EventBus from "../event-bus"
    export default {
        props: ['usuario'],
        data() {
            return {
                plataformas: [],
                motivos: [],
                input: {
                    plataforma_id: "",
                    motivo_id: "",
                    descripcion: "",
                    files: []
                },
                formData: new FormData,
                priorityValue: 0,
                priority_id: '',
                responsable_id: ''
            }
        },
        created: function () {
            this.getData();

        },
        computed: {


        },
        methods: {
            getData() {
                axios.get('/tickets/form/data').then((response) => {
                    this.plataformas = response.data.plataformas
                    this.motivos = response.data.motivo
                })
            },
            getFiles(e) {
                let files = this.$refs.inpFile.files;
                for (var i = 0; i < files.length; i++) {
                    this.input.files.push(files[i]);
                }
            },
            shortName(name) {
                if (name.length > 14) {
                    let short_name = name.substr(0, 12) + '...';
                    return short_name;
                } else {
                    let short_name = name;
                    return short_name;
                }
            },
            typeFile(file) {
                let type = file.split(".").pop()
                if (type == "xlsx" || type == "xls" || type == "xlm") {
                    return "fas fa-file-excel"

                } else if (type == "png" || type == "jpg" || type == "jpeg") {
                    return "fas fa-file-image"
                } else if (type == "pdf" || type == "PDF") {
                    return "fas fa-file-pdf"
                } else {
                    return "fas fa-file"
                }
            },
            deleteFile(key) {
                this.input.files.splice(key, 1);
            },
            createTicket() {
                if (this.input.descripcion != "" && this.input.plataforma_id != "" && this.input.motivo_id != "") {

                    this.calculatePriority()

                    this.formData.append('plataforma_id', this.input.plataforma_id);
                    this.formData.append('descripcion', this.input.descripcion);
                    this.formData.append('tipo_requisito_id', this.input.motivo_id);
                    this.formData.append('prioridad_id', this.priority_id);
                    this.formData.append('responsable_id', this.responsable_id);
                


                    for (var i = 0; i < this.input.files.length; i++) {
                        let archivo = this.input.files[i];
                        this.formData.append('files[' + i + ']', archivo);
                    }
                    

                    axios.post('/ticket/suport/create', this.formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                    }).then(response => {
                       
                        $("#form_ticket").modal("hide")
                        this.alertFunction('success', 'Ticket creado', 'Su ticket fue creado exitosamente, una vez este avance de estado sera notificado por correo eléctronico')
                        EventBus.$emit('update.ticket.support')
                        this.cleanForm()
                        this.sendMail(response.data)
                    }).catch(
                        error => {
                            this.alertFunction('error', 'Error', 'Se produjo un error al crear el ticket, favor contactar con soporte')
                           
                        });

                }
            },
            calculatePriority() {

                if (this.usuario.rol == 1 || this.usuario.rol == 16 || this.usuario.rol == 6 || this.usuario.rol == 7 || this.usuario.rol == 17) {

                    this.priorityValue = 5
                } else if (this.usuario.rol == 8  || this.usuario.rol == 11) {
                    this.priorityValue = 3
                } else if (this.usuario.rol == 12 || this.usuario.rol == 10 || this.usuario.rol == 14) {
                    this.priorityValue = 1
                }


                if (this.input.plataforma_id == 5) {
                    this.priorityValue += 3
                    this.responsable_id = 1;
                } else {
                    this.priorityValue += 2
                    this.responsable_id = 2;
                }


                if (this.input.motivo_id == 1 || this.input.motivo_id == 2 || this.input.motivo_id == 8 || this.input.motivo_id == 7) {
                    this.priorityValue += 1
                } else if (this.input.motivo_id == 3 || this.input.motivo_id == 4 || this.input.motivo_id == 5 || this.input.motivo_id == 6) {
                    this.priorityValue += 3
                }


                if (this.priorityValue <= 4) {
                    this.priority_id = 1
                } else if (this.priorityValue >= 5 && this.priorityValue <= 8) {
                    this.priority_id = 2
                } else if (this.priorityValue > 8) {
                    this.priority_id = 3
                }

            },
            alertFunction(Type, Title, Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,
                })
            },
            cleanForm() {
                this.input.plataforma_id = ""
                this.input.motivo_id = ""
                this.input.descripcion = ""
                this.input.files = []
            },
            sendMail(ticket){
                axios.get('/send/mail/developer',{
                    params:{
                        'ticket_id':ticket
                    }
                }).then(response=>{

                })
            }
        },
    }
</script>