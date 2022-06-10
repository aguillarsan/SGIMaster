<template>
    <div class="main-content">
        <div class="wrapper wrapper-content">
            <section class="section">
                <div class="section-header shadow-box-ag barlow bold">
                    <div class="breadcrumb-item active">
                        <a @click.prevent="getSgcRequest" href="#" style="font-size: 18px;">
                            Archivos SGC
                        </a>
                    </div>
                    <div class="breadcrumb-item barlow bold" style="font-size: 17px;" v-for="Fold in contenFold">
                        <a @click.prevent="BackFold(Fold.id,Fold.name)" href="" v-if="idContentFold != Fold.id">
                            {{Fold.name}}
                        </a>
                        <a v-else="">
                            {{Fold.name}}
                        </a>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="ibox float-e-margins">
                        <div class="card shadow-box-ag">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="input-group">
                                            <input @keyup.prevent="getSgcRequest" class="form-control" placeholder="Buscar por sitio, codigo solicitud o creador" style="border-radius: 0px;height: 35px; " type="text" v-if="moduloId ==1 && idContentFold == ''" v-model="nombre"/>
                                            <div class="input-group-append" v-if="moduloId ==1 && idContentFold == ''">
                                                <div class="input-group-text" style="height: 35px;">
                                                    <i class="fas fa-search">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="folder in folders.data" v-if="load_data == 2 && sgc_folders_show">
                                        <a @click.prevent="ShowInfoFolder(folder)" @dblclick.prevent="GetContentFolder(folder)" href="#" style="color:#f2f2f2">
                                            <div class="card card-statistic-1 greyHover " style="border-radius: 8px;transition: transform 0.5s;border-color:#e5e7eb;border: 1px solid rgba(0,0,0,.125);" v-bind:style="folder.id == idFolderSelected ? 'background-color: #e0e0e0; ' : '' ">
                                                <div class="card-icon ">
                                                    <i class="far fa-folder" style="color:#191919; font-size: 50px;">
                                                    </i>
                                                </div>
                                                <div class="card-wrap">
                                                    <div class="card-header barlow semi_bold">
                                                        <h4 style="font-size: 14px;color: black;">
                                                            {{folder.id}} {{folder.site ? '/' + folder.site.nem_site : ''}}
                                                        </h4>
                                                    </div>
                                                    <div class="barlow semi_bold " style="color:#191919;font-size: 12px;">
                                                        {{folder.user ? folder.user.name +' '+ folder.user.apellido :''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div style="margin-top: 30px;" v-if="sgc_folders_show">
                                        <nav aria-label="pagination" class="pagination" role="navigation">
                                            <vue-pagination :offset="4" :pagination="folders" @paginate="getSgcRequest()">
                                            </vue-pagination>
                                        </nav>
                                    </div>
                                    <!-- TYPE FILE SGC -->
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="type_file in type_files" v-if="type_files_show && load_data == 2 ">
                                        <a  @dblclick.prevent="getFilesSgc(type_file)"  style="color:#f2f2f2; cursor: pointer;">
                                            <div class="card card-statistic-1 greyHover " style="border-radius: 8px;transition: transform 0.5s;border-color:#e5e7eb;border: 1px solid rgba(0,0,0,.125);" v-bind:style="type_file.id == idFolderSelected ? 'background-color: #e0e0e0; ' : '' ">
                                                <div class="card-icon ">
                                                    <i class="far fa-folder" style="color:#191919; font-size: 50px;">
                                                    </i>
                                                </div>
                                                <div class="card-wrap">
                                                    <div class="card-header barlow semi_bold">
                                                        <h4 style="font-size: 14px;color: black;">
                                                            {{type_file.nombre}}
                                                        </h4>

                                                    </div>
                                                    <div>
                                                        <span class="badge badge-primary" >{{type_file.id == 1 && Total_files.cotizacion != 0 ? Total_files.cotizacion:(type_file.id == 2 && Total_files.informe_final != 0 ? Total_files.informe_final:(type_file.id == 4   && Total_files.guia_despacho != 0  ? Total_files.guia_despacho:(type_file.id == 6   && Total_files.lpu != 0  ? Total_files.lpu  :(type_file.id == 7  && Total_files.mail != 0 ? Total_files.mail : ( type_file.id == 9  && Total_files.informe_parcial != 0  ? Total_files.informe_parcial:(type_file.id == 8  && Total_files.carta_adjudicacion != 0 ? Total_files.carta_adjudicacion:(type_file.id == 5  && Total_files.otros != 0 ?Total_files.otros : '')))))))}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2" v-for="file in files" v-if="files_sgc_show">
                                            <div class="col text-center">
                                                <a  :href="'/archivosSgc/'+file.nombre_archivo" target="blank_">
                                                    <div class="browser boxBounce">
                                                        <i :class="file.class" v-if="file.class" style="font-size:50px;" >
                                                        </i>
                                                          <i class="fas fa-file" v-if="!file.class" style="font-size:50px;" >
                                                        </i>
                                                    </div>
                                                  
                                                </a>
                                                <div class="mt-2 font-weight-bold">
                                                    {{file.nombre_archivo}}
                                                </div>
                                           
                                            </div>
                                        </div>
                                  </div>
                                 <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 1">
                                        <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                            <div class="card-body">
                                                <div class="empty-state" data-height="400">
                                                    <div class="d-flex justify-content-center" v-if="load_data == 1">
                                                        <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: rgba(212, 125, 222)!important;">
                                                            <span class="sr-only" style="color: #191919">
                                                                Cargando...
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import VuePagination from '../VuePagination.vue';
import axios from 'axios'
import moment from 'moment'
import EventBus from "./event-bus"
import pdf from 'vue-pdf'
import WebViewer from '@pdftron/webviewer'
import { ref, onMounted } from 'vue';
let pdfDocument = null;

export default {
    components: {
        pdf
    },
    components: {
          
    'vue-pagination': VuePagination,
            
      
           

    },
     
    data(){
        return{
            folders: {
                'total': 0,
                'current_page': 1,
                'per_page': 10,

                'from': 2,
                'to': 0

            },
            nombre:'',
            vacio:'',
            popId : '',
            dataPop : [],
            pops:[],
            popid : '',
            datositio:'',
            nameFolder:'',
            contenFold:[],
            nombFolder:'',
            idContentFold:'',
            files:[],
            folderUpdateNameId:'',
            DefaultName:'Office track',
            DetailsFolder:[],
            DefaultIcon:'fas fa-hdd',
            activitys:[],
            nameUser:'',
            users:[],
            userSelects:[],
            userShared:[],
            moduloName:'',
            moduloId:1,
            permissions:'',
            folderSharedId:'',
            filesupload: [],
            porcentaje:{
                type:Number,
                default:0
            },
            FilesDuplicates:[],
            folderData:[],
            idFolderSelected:'',
            Folderpermisison:'',
            src:'',
            numPages: 0,
          
            page: 1,
            fileShow:'',
            tipeFile:0,
            comprobacion:0,
            load_data:0,
            type_files:[{'id':1,'nombre':'Cotizaciones'}, {'id':2,'nombre':'Informe Final'}, {'id':4,'nombre':'Guía de despacho'}, {'id':6,'nombre':'LPU'}, {'id':7,'nombre':'Mail'},{'id':9,'nombre':'Informe Parcial'},{'id':8,'nombre':'Carta de adjudicación'},{'id':5,'nombre':'Otros'}],
            sgc_folders_show:true,
            type_files_show:false,
            Total_files:'',
            type_file:null,
            files_sgc_show:false,
            folder_id:""
          


           
          
        


        }
    },
    computed:{
        getProgress(){
            return Math.round(this.porcentaje)+'%'
        }
    },
   

    created:function(){
        this.load_data = 1
         this.getSgcRequest()
    },
  
    methods:{
        
    getSgcRequest(){
        
        axios.get(`/sgc/folders/data?page=${this.folders.current_page}&search=${this.nombre}`).then((response) => {
            this.sgc_folders_show=true
            this.type_files_show=false
            this.folders = response.data;
            this.nombFolder = '';
            if (this.folders.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
            this.contenFold = [];
            this.moduloName = 'SGC';
            this.moduloId = 1;
            this.files = [];
            this.activitys = [];
            this.idContentFold = '';
            this.DetailsFolder = [];
            this.DefaultName = 'SGC';
            this.idFolderSelected = ''
        }).finally(() => this.load_data = 2);
    },
    ShowInfoFolder: function(folder) {
       
        this.DefaultName = folder.nombre;
        this.idFolderSelected = folder.id;
        this.DetailsFolder = folder;
       
        axios.get('/GetActivityFolder/' + folder.id).then((response) => {
            this.activitys = response.data;
            this.DefaultIcon = 'fas fa-folder'
        })
    },
    formato: function(d) {
        return moment(d).format("MMM-DD-YYYY - hh:mm:ss");
    },
   
    Previsualizacion: function(file) {
        let nomFile = file.nombre
        let PdfFileNom = nomFile.substr(nomFile.length - 3)
        let DocxFileNom = nomFile.substr(nomFile.length - 4)
        let ImgFileNom = nomFile.substr(nomFile.length - 3)
        if (PdfFileNom == 'pdf' || PdfFileNom == 'PDF') {
            console.log(PdfFileNom)
            if (file.directorio != null) {
                pdfDocument = pdf.createLoadingTask(file.directorio + '/' + file.nombre)
                this.fileShow = file.directorio + '/' + file.nombre
                this.src = pdfDocument
                this.src.promise.then(pdf => {
                    this.numPages = pdf.numPages
                    this.tipeFile = 1
                });
            } else {
                pdfDocument = pdf.createLoadingTask('/ArchivosRepositorio/' + file.nombre)
                this.fileShow = '/ArchivosRepositorio/' + file.nombre;
                this.src = pdfDocument
                this.src.promise.then(pdf => {
                    this.numPages = pdf.numPages
                    this.tipeFile = 1
                });
            }
            $('#ShowDocument').modal('show');
        } else {
            if (DocxFileNom == 'docx') {
                this.fileShow = file
                this.tipeFile = 2
                $('#ShowDocument').modal('show');
            } else {
                if (ImgFileNom == 'png' || ImgFileNom == 'jpg' || ImgFileNom == 'jpeg') {
                    if (file.directorio != null) {
                        this.fileShow = file.directorio + '/' + file.nombre;
                    } else {
                        this.fileShow = '/ArchivosRepositorio/' + file.nombre;
                    }
                    this.tipeFile = 3
                    $('#ShowDocument').modal('show');
                }
            }
        }
    },
   
 
    
    GetContent: function(id) {
        axios.get(`/GetFiles?folderid=${id}`).then((response) => {
            this.files = response.data;
        })
    },

 
 
   
   
 
   
   
   
  
  
    BackFold: function(id, name) {
        this.set_load();
        this.idContentFold = id;
        this.nombFolder = name;
        this.contenFold.splice(-1, 1);
        this.sgc_folders_show=false;
        this.type_files_show=true;
        this.files_sgc_show=false;
        this.load_data = 2
        
    },
    
    GetContentFolder: function(folder) {
        this.folder_id = folder.id
        this.set_load();
        this.sgc_folders_show = false;
        axios.get('/totalCotizacionesSgc/'+folder.id).then((response)=>{
                this.Total_files = response.data;

        this.type_files_show = true;
        this.nombre = '';
        this.idContentFold = folder.id;
        this.contenFold.push({
            id: folder.id,
            name: folder.id
        });
        this.nombFolder = folder.id;
        this.load_data=2 

        })
       
    },
    getFilesSgc(type_file){
       this.type_file = type_file.id
       this.nombre = '';
       this.idContentFold = type_file.id;

        this.nombFolder = type_file.nombre;
        this.contenFold.push({
            id: type_file.id,
            name: type_file.nombre
        });
       axios.get('/searchArchivoSgc/'+this.folder_id).then((response) => {
            let file = response.data
            console.log(file)
            this.files =   file.filter(obj => obj.tipo_archivo_id == type_file.id); 
            this.sgc_folders_show =false
            this.type_files_show =false
            this.files_sgc_show =true       
        })
    },
    GetContentFolderAction: function() {
        axios.get(`/GetSubFolder?folderid=${this.idContentFold}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        });
    },
    GetContentFolderSearch: function() {
        axios.get(`/officetrack/sub/folders?folderid=${this.idContentFold}&nombre=${this.nombre}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        });
    },
   
    
  
   
   
    messajeError: function(mensaje) {
        this.$swal({
            type: 'error',
            title: 'Error',
            text: mensaje,
            showCloseButton: true,
        });
    },
    
    GetContentFolderSubFolder: function(folder) {
        axios.get(`/GetSubFolder?folderid=${folder}`).then((response) => {
            this.folders = response.data.folder;
            this.files = response.data.files;
        }).finally(() => this.load_data = 2);
    },
   
    loadFunction: function() {
        let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 400)
    },
    toastFunction: function(messaje) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: messaje
        })
    },
    getFileExtension: function(filename) {
        return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
    },
    set_load: function() {
        this.load_data = 1;
    }
         

   
    

    
    }
}
</script>
