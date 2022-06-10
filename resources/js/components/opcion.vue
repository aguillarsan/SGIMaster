<template>
    <div class="">
        <div>
            <button @click.prevent="showModalSgc" class="btn btn-success btn-block">
                <i class="fas fa-plus">
                </i>
                Crear SGC
            </button>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div>
            <button @click.prevent="showModalPreework" class="btn  btn-block btn-warning " >
                <i class="fas fa-plus">
                </i>
                Datos para ework
            </button>
        </div>
         <div style="margin-top:10px;">
        </div>
        <div>
          <a :href="'/InformeFotografico/'+idticket" target="blank__" style="color:#e3eaef"><button class="btn  btn-light  btn-block" >Informe fotográfico</button></a>
          
        </div>
        <div style="margin-top:10px;">
        </div>
        <div v-if="area == 2 ">
            <div v-if="derivacion == 2 ">
                <button @click.prevent="especialistaClima" class="btn btn-success btn-block" v-if="especialista == '' ">
                    Derivar a especialista de clima
                </button>
            </div>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div v-if="area == 3">
            <div v-if="derivacion == 2 ">
                <button @click.prevent="especialistaOOCC" class="btn btn-warning btn-block" v-if="especialista == '' ">
                    Derivar a especialista de OO.CC
                </button>
            </div>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div>
            <button @click.prevent="ShowTareas" class="btn btn-info btn-block">
                Listado De Tareas
            </button>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div>
            <button @click.prevent="showModalImputacion" class="btn btn-info btn-block">
                <i class="fas fa-plus">
                </i>
                Agregar imputación
            </button>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div>
            <button @click.prevent="showModalTp" class="btn btn-info btn-block">
                <i class="fas fa-plus">
                </i>
                Agregar TP
            </button>
        </div>
        <div style="margin-top:10px;">
        </div>
        <div>
            <button @click.prevent="showModalOficce" class="btn btn-info btn-block">
                <i class="fas fa-plus">
                </i>
                Agregar Tarea Office Track
            </button>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus";


export default {
   props: [ 'idticket' ],
  data(){
    return{
      area:'',
      especialista:'',
      fullPage: false,
      derivacion:2,
      tp:'',
     



    }
  },

  created:function(){

    this.normas();


  },
  methods:{
    normas:function(){
      this.area  = document.getElementById('area').value;
      this.especialista= document.getElementById('esp').value;
    },
        ShowTareas:function(){
           $('#Tareas').modal('show');

       },
       showModalSgc:function(){
          
            EventBus.$emit('sgc.getDatosform');

       },
       showModalPreework:function(){
            EventBus.$emit('preEwork.getDatos');
       },
       showModalImputacion:function(){
           $('#imputaciones').modal('show');

       },
       showModalTp:function(){
           $('#tp').modal('show');
       },
       showModalOficce:function(){
           $('#NroOffice').modal('show');
       },
       especialistaOOCC:function(){
           var id = document.getElementById('number').value;
           var url = '/especialista2/'+id

           let loader = this.$loading.show({
                  // Optional parameters
                  container: this.fullPage ? null : this.$refs.formContainer,
                  canCancel: true,
                  onCancel: this.onCancel,
              });
                // simulate AJAX
                setTimeout(() => {
                  loader.hide()
                },800)                 


                axios.put(url).then(response=>{

                  this.derivacion = 1;
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })

                  Toast.fire({
                    icon: 'success',
                    title: 'Ticket derivado a especialista de OO.CC'
                  })

                  EventBus.$emit('bitacora.getBitacora');
                });
                
            },
            especialistaClima:function(){
              var id = document.getElementById('number').value;
              var url = '/especialista/'+id

              let loader = this.$loading.show({
                  // Optional parameters
                  container: this.fullPage ? null : this.$refs.formContainer,
                  canCancel: true,
                  onCancel: this.onCancel,
              });
                // simulate AJAX
                setTimeout(() => {
                  loader.hide()
                },800)                 


                axios.put(url).then(response=>{

                  this.derivacion = 1;
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })

                  Toast.fire({
                    icon: 'success',
                    title: 'Ticket derivado a especialista de Clima'
                  })

                  EventBus.$emit('bitacora.getBitacora');
                });
                
            }

        }
    }
</script>
