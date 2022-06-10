<template>
    <div>
        <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="EditMotivoTicket" role="dialog"
            tabindex="-1">
            <div class="modal-dialog modal-sm ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header"
                        style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                        <h5 class="modal-title" style="color: white">
                            Ediar motivo
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
                            <select class="form-control select" name="motivo" v-model="motivo_id">
                                <option :value="tipo_motivo.id" v-for="tipo_motivo in tipo_motivos">
                                    {{tipo_motivo.nombre}}
                                </option>
                       
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <button @click.prevent="updateMotivo" class="btn btn-secondary btn-grey">
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
    import EventBus from "../event-bus"


    export default {
        data() {
            return {
                motivo_id: '',

                ticket_id: '',
                tipo_motivos: [
                    { id: 12, nombre: 'Ticket exprés' },
                    { id: 1, nombre: 'Vandalismo menor' },
                    { id: 7, nombre: 'Vandalismo mayor' },
                    { id: 2, nombre: 'Falla Mayor' },
                    { id: 6, nombre: 'Falla menor' },
                    { id: 3, nombre: 'Mantenimiento' },
                    { id: 9, nombre: 'Degradación' },
                    { id: 4, nombre: 'Solicitud Stock' },
                    { id: 5, nombre: 'Solicitud de mejora' },
                    { id: 10, nombre: 'Gastos Reembolsables' },
                    { id: 11, nombre: 'Recurrente anual' },
                    { id: 8, nombre: 'Gestión de residuo' }
                ],




            }
        },

        created: function () {





        },
        mounted: function () { /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('ticket.modalEditMotivo', function (ticket) {



                self.ShowModal(ticket); // ejecutas el metodo que desees

            });


        },
        methods: {

            ShowModal: function (ticket) {
                this.ticket_id = ticket

                $('#EditMotivoTicket').modal('show');
            },


            updateMotivo: function () {
                if (this.motivo_id != '') {
                    axios.get(`/editMotivoTicket?ticket_id=${this.$route.params.id}&motivo_id=${this.motivo_id}`).then((response) => {

                        $('#EditMotivoTicket').modal('hide');

                        this.toastfunction()
                        this.loadFunction()



                    })
                    EventBus.$emit('ticket.ticketData')
                } else {
                    if (this.motivo_id == '') {

                        this.$swal({
                            type: 'error',
                            title: 'Debe seleccionar un motivo.',
                            showCloseButton: true,
                        });
                    }
                }
            },

            toastfunction: function () {
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

            loadFunction: function () {
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