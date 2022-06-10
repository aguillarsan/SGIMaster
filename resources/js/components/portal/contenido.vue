<template>
    <div>
        <header class="header-section animated fadeIn">
            <div class="header-warp">
                <div class="header-social d-flex justify-content-end">
                    <p>
                        Síguenos:
                    </p>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-facebook">
                        </i>
                    </a>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a href="#" style="color: #191919">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                </div>
                <div class="header-bar-warp d-flex">
                    <!-- site logo -->
                    <a class="site-logo" href="home.html">
                        <img alt="" src="/imagenesPortal/LogoBlanco.png" style="margin-top: -30px;">
                        </img>
                    </a>
                    <nav class="top-nav-area w-100">
                        <!-- Menu -->
                        <ul class="main-menu primary-menu">
                            <a class="ButtonBounce" href="#">
                                <i class="fas fa-edit " style="font-size:15px; ;color: white">
                                </i>
                            </a>
                            <li>
                                <a href="home.html">
                                    Inicio
                                </a>
                            </li>
                            <a class="ButtonBounce" href="#">
                                <i class="fas fa-edit " style="font-size:15px; ;color: white">
                                </i>
                            </a>
                            <li>
                                <a href="#">
                                    Plataformas
                                    <i class="fas fa-angle-down">
                                    </i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="/sgi" target="__blank">
                                            SGI
                                        </a>
                                        <a href="#" target="__blank">
                                            PGE
                                        </a>
                                        <a href="#" target="__blank">
                                            SAP
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <a class="ButtonBounce" href="#">
                                <i class="fas fa-edit " style="font-size:15px; ;color: white">
                                </i>
                            </a>
                            <li>
                                <a href="contact.html">
                                    Contacto
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="blog-section spad ">
                    <div class="container ">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class=" col-lg-7 ">
                                    <div class="section-title animated fadeIn">
                                        <h2 style="color: #191919">
                                            Texto titulo
                                            <a class="btn boxBounce" href="">
                                                <i class="fas fa-edit " style="font-size: 18px;color: #005cff">
                                                </i>
                                            </a>
                                        </h2>
                                    </div>
                                    <ul class="blog-filter">
                                        <li class="animated fadeIn ButtonBounce">
                                            <a href="#">
                                                Button
                                            </a>
                                        </li>
                                        <li class="animated fadeIn ">
                                            <a href="#">
                                                Button
                                            </a>
                                        </li>
                                        <li class="animated fadeIn ">
                                            <a href="#">
                                                Button
                                            </a>
                                        </li>
                                        <li class="animated fadeIn ">
                                            <a href="#">
                                                Button
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Blog item -->
                                    <div class="card-header" style="background-color: #191919">
                                        <button class="btn btn-light" data-target="#AddNews" data-toggle="modal" style="box-shadow: 0 0px 0px ;background-color:  white">
                                            <i class="fas fa-plus">
                                            </i>
                                            Añadir noticia
                                        </button>
                                    </div>
                                    <div class="blog-item" v-for="Uno in seccionUno">
                                        <div class="blog-thumb animated fadeIn">
                                            <img :src="Uno.imagen" style="height: 250px;width: 600px;">
                                            </img>
                                        </div>
                                        <div class="blog-text text-box text-white">
                                            <div class="top-meta black">
                                                11.11.18 
                                                
                                            </div>
                                            <h3 style="color: #191919">
                                                {{Uno.titulo}}
                                                <a class="btn boxBounce" href="">
                                                    <i class="fas fa-edit " style="font-size: 15px;color: #005cff">
                                                    </i>
                                                </a>
                                            </h3>
                                            <p>
                                                {{Uno.introduccion}}
                                                <a class="btn boxBounce" href="">
                                                    <i class="fas fa-edit " style="font-size: 15px;color: #005cff">
                                                    </i>
                                                </a>
                                            </p>
                                            <a class="read-more" href="#" style="color: #191919">
                                                Leer más
                                                <img alt="#" src="/imagenesPortal/icons/double-arrow.png"/>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Blog item -->
                                    <!-- Blog item -->
                                </div>
                                <div class=" col-lg-3 col-md-5 sidebar">
                                    <div id="stickySidebar">
                                        <div class="widget-item">
                                            <h4 class="widget-title" style="color: #191919">
                                                Texto
                                            </h4>
                                            <div class="trending-widget">
                                                <div class="tw-item">
                                                    <div class="tw-thumb">
                                                        <img alt="#" src="/imagenesPortal/marca/marca5.jpg" style="width: 80px;height: 80px;">
                                                        </img>
                                                    </div>
                                                    <div class="tw-text">
                                                        <div class="tw-meta black">
                                                            11.11.18  /
                                                            <a href="" style="color: #005cff">
                                                                Texto
                                                            </a>
                                                        </div>
                                                        <h5 style="color: #191919">
                                                            Descripción
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="tw-item">
                                                    <div class="tw-thumb">
                                                        <img alt="#" src="/imagenesPortal/marca/marca6.jpg" style="width: 80px;height: 80px;">
                                                        </img>
                                                    </div>
                                                    <div class="tw-text">
                                                        <div class="tw-meta black">
                                                            11.11.18  /
                                                            <a href="" style="color: #005cff">
                                                                Texto
                                                            </a>
                                                        </div>
                                                        <h5 style="color: #191919">
                                                            Descripción
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="tw-item">
                                                    <div class="tw-thumb">
                                                        <img alt="#" src="/imagenesPortal/marca/marca7.jpg" style="width: 80px;height: 80px;">
                                                        </img>
                                                    </div>
                                                    <div class="tw-text">
                                                        <div class="tw-meta black">
                                                            11.11.18  /
                                                            <a href="" style="color: #005cff">
                                                                Texto
                                                            </a>
                                                        </div>
                                                        <h5 style="color: #191919">
                                                            Descripción
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="tw-item">
                                                    <div class="tw-thumb">
                                                        <img alt="#" src="/imagenesPortal/marca/marca8.jpg" style="width: 80px;height: 80px;">
                                                        </img>
                                                    </div>
                                                    <div class="tw-text">
                                                        <div class="tw-meta black">
                                                            11.11.18  /
                                                            <a href="" style="color: #005cff">
                                                                Texto
                                                            </a>
                                                        </div>
                                                        <div class="black">
                                                        </div>
                                                        <h5 style="color: #191919">
                                                            Descripción
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-item">
                                            <div class="categories-widget" style="background-color: #10069f; border-radius: 7px;">
                                                <h4 class="widget-title">
                                                    Texto
                                                </h4>
                                                <ul>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            Texto
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="widget-item">
                                            <a class="add" href="#">
                                                <img alt="" src="/imagenesPortal/add.jpg">
                                                </img>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div aria-hidden="true" class="modal inmodal" data-backdrop="static" id="AddNews" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999;text-align: center;">
                                Añadir noticia
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>
                                            Título *
                                        </label>
                                        <input @keyup.prevent="deleteError()" class="form-control" type="text" v-model="titulo">
                                        </input>
                                        <div id="errorTitulo" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar el titulo
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Introducción *
                                        </label>
                                        <input @keyup.prevent="deleteError()" class="form-control" type="text" v-model="introduccion">
                                        </input>
                                        <div id="errorintroduccion" style="display: none">
                                            <p style="color: red">
                                                Favor ingresar la introducción
                                            </p>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>
                                            Imagen *
                                        </label>
                                        <div class="row">
                                            <div class="file-upload">
                                                <div class="image-upload-wrap" style="height: 100px;">
                                                    <input class="file-upload-input" id="files" ref="files" type="file" v-on:change="handleFile()"/>
                                                    <div class="drag-text">
                                                        <h2 style="font-size: 28px;">
                                                            Arrastre o selecciones sus archivos.
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-lg-4 col-md-3 col-sm-3 col-12" v-for="(file, key) in filesupload ">
                                                <div class="">
                                                    <span class="badge " style="border-radius: 5px;background-color: #005cff;color: white">
                                                        {{ file.name }}
                                                        <a href="#" v-on:click="removeFile( key )">
                                                            <i class="fas fa-times-circle boxBounce" style="color:white">
                                                            </i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="errorImagen" style="display: none">
                                            <p style="color: red">
                                                Debe ingresar una imagen
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            Parrafo *
                                        </label>
                                        <textarea class="form-control" style="height: 160px;" v-model="parrafo">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" @click.prevent="addParrafo()">
                                            <i class="fas fa-plus">
                                            </i>
                                            Añadir
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Parrafo(s)
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="parrafo in parrafos">
                                                            <td>
                                                                {{parrafo.texto}}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click.prevent="CreateNews()" class=" btn ButtonBounce" style="border-radius: 5px;background-color: #005cff;color: white" type="button">
                                Crear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';



export default {
    data(){
        return{
            seccionUno:[],
            files:[],
            filesupload:[],
            titulo:'',
            descripcion:'',
            introduccion:'',
            parrafo:'',
            parrafos:[]


        }
    },

    created:function(){


        this.GetFirstSeccion();
      


    },
    mounted: function() { 
       
    },
    methods:{
        addParrafo:function(){
                this.parrafos.push({texto:this.parrafo});
                this.parrafo = ''
        },
        validate:function(){
            if(this.titulo == ''){
                document.getElementById("errorTitulo").style.display='block'
            }
         
             if(this.introduccion == ''){
                document.getElementById("errorintroduccion").style.display='block'
            }
            if(this.filesupload.length == 0){
                document.getElementById("errorImagen").style.display='block'
            }
        },
        deleteError:function(){
           if(this.titulo != ''){
                document.getElementById("errorTitulo").style.display='none'
            }
           
            if(this.introduccion != ''){
                document.getElementById("errorintroduccion").style.display='none'
            }
           
        },
        CreateNews:function(){
          this.validate();

          let formData = new FormData();
          formData.append('titulo', this.titulo);
          formData.append('descripcion', this.descripcion);
          formData.append('introduccion', this.introduccion);
      
       
            
          
          for (var i = 0; i < this.filesupload.length; i++) {
            let files = this.filesupload[i];
            formData.append('file[' + i + ']', files);
           }
      
          if(this.titulo != '' && this.filesupload.length != 0){
           
            axios.post('/createNews',formData,
                {
                    headers:{
                         'Content-Type': 'multipart/form-data'
                    }
                }).then((response)=>{
                 this.GetFirstSeccion();
                  let Messaje = 'Noticia creada'
                  console.log(response)
                     for (var i = 0; i < this.parrafos.length; i++) {
                         let parrafo = this.parrafos[i]
                             let NewformData = new FormData()
                             NewformData.append('parrafo', parrafo.texto) 
                             NewformData.append('noticia_id', response.data) 
                            
                              axios.post('/setParrafosNoticia',NewformData).then((response)=>{
                             
                                 
                              })
                     }
                    $('#AddNews').modal('hide') 
                })
          }
        },
       
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        GetFirstSeccion:function(){
          axios.get('/GetFirstSeccion').then((response)=>{
            this.seccionUno = response.data
          })
        },
         removeFile( key ){
          this.filesupload.splice( key, 1 );
         },
        handleFile:function(){
          let uploadedFiles = this.$refs.files.files;
          for( var i = 0; i < uploadedFiles.length; i++ ){
              this.filesupload.push( uploadedFiles[i] );
          }
          for( var i = 0; i < this.filesupload.length; i++ ){
          let file = this.filesupload[i];
           }

            if(this.filesupload.length != 0){
                document.getElementById("errorImagen").style.display='none'
            }
        }
       
  
    },
   
}
</script>