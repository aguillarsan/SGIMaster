<template>
    <div aria-hidden="true" class="modal inmodal" id="modal_message" role="dialog" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header md_h_s">
                    <h5 class="modal-title" style="color: white">
                        Enviar mensaje
                    </h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true" style="color: white">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Mensaje</label>
                        <textarea class="form-control" style="height:150px" v-model="mensaje"></textarea>


                    </div>


                </div>
                <div class="modal-footer">
                    <a class="btn btn-info barlow semi_bold" @click="sendMessage" href="#" style="color:white">
                        Enviar
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        props: ['ticket'],
        data() {
            return {
                mensaje: ''
            }
        },
        methods: {
            sendMessage() {
                $("#modal_message").modal("hide");
                axios.get('/send/message/suport', {
                    params: {
                        'mensaje': this.mensaje,
                        'ticket_id': this.ticket
                    }
                }).then(response => {
                    this.alertFunction('success', 'Mensaje enviado')
                }).catch(
                        error => {
                            
                            this.alertFunction('error', 'Error al enviar mensaje')
                           
                        });
            },
            alertFunction(Type, Title) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    type: Type,
                    title: Title
                })
            }

        }
    }

</script>