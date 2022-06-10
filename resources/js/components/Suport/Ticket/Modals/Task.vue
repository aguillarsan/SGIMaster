<template>
    <div aria-hidden="true" class="modal inmodal" id="modal_task" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header md_h_s">
                    <h5 class="modal-title" style="color: white">
                        Listado de tareas
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true" style="color: white">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-10">
                                <label class="barlow semi_bold">Nombre tarea</label>
                                <input class="form-control" type="text" v-model="tarea">
                            </div>
                            <div class="col-lg-2">

                                <button class="btn btn-success " @click="addTask" style="margin-top:2rem"><i
                                        class="fa fa-plus"></i></button>

                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center"
                                v-for="(task,key) in tasks">
                                {{task.name}}
                                <a @click="deleteTast(key)" style="cursor:pointer;color:red" class="badge-pill"><i
                                        class="fas fa-times-circle" style="font-size:18px"></i></a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-info barlow semi_bold" @click="saveList" href="#" style="color:white">
                        Guardar listado
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
        props: ['ticket'],
        data() {
            return {
                tasks: [],
                tarea: '',
                formData: new FormData,
                success: ''

            }
        },

        created: function () {

        },
        methods: {
            addTask() {
                this.tasks.push({ name: this.tarea })
                this.tarea = ''
            },
            deleteTast(key) {
                this.tasks.splice(key, 1)
            },
            saveList() {
                if (this.tasks.length != 0) {
                    for (let index = 0; index < this.tasks.length; index++) {
                        let element = this.tasks[index];
                        let formData = new FormData
                        formData.append('name_task', element.name)
                        formData.append('ticket_support_id', this.ticket.id)
                        axios.post('/ticket/suport/create/task', formData).then(response => {
                           

                        }).catch(
                            error => {

                               

                            });
                    }
                    this.alertFunction('success', 'Éxito', 'Su listado de tareas fue creado')
                    this.tasks = []
                    $("#modal_task").modal('hide')
                    EventBus.$emit('update.task.ticket.support',this.ticket)
                  
                }


            },
            alertFunction(Type, Title, Text) {
                Swal.fire({
                    type: Type,
                    title: Title,
                    text: Text,
                })
            }
        },
    }
</script>