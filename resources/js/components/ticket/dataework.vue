<template>
    <div>
        <div class="row" style="margin-top: ;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="PreWorkTkc" style="display:none">
                <div class="card card-hero shadow-box-ag">
                    <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                        <div class="card-icon">
                            <i class="fas fa-pencil-alt" style="color: #42E8B4">
                            </i>
                        </div>
                        <h4 class="barlow bold">
                            Formulario Ework
                        </h4>
                        <div class="card-description barlow semi_bold">
                            Ingrese la cantidad de elementos
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tickets-list">
                            <div class="ticket-item">
                                <div class="row" style="margin-top: 7px">
                                    <div class="col-lg-3" v-for="elemento in elementos" v-if="elemento.id==1">
                                        <div class="owl-carousel owl-theme " id="products-carousel">
                                            <div>
                                                <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                    <div class="product-image" style="margin-top: 15px;">
                                                        <i class="fas fa-car-battery" style="font-size: 50px;color: #fea858;">
                                                        </i>
                                                    </div>
                                                    <div class="product-details">
                                                        <div class="product-name barlow semi_bold">
                                                            {{elemento.descripcion}}
                                                        </div>
                                                        <div class="text-muted barlow regular">
                                                            ${{elemento.valor | currency}}
                                                        </div>
                                                        <div class="product-cta">
                                                            <a class="btn">
                                                                <p>
                                                                    Total
                                                                </p>
                                                                <input @change.prevent="totalActivo(elemento)" @keyup.prevent="totalActivo(elemento)" class="form-control" min="1" name="bateria" style="margin-top: -20px; text-align: center;" type="number" v-model="bateriaPreEworktkc">
                                                                </input>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input name="MontoTotalBateria" type="hidden" v-model="TotalMontoBateria">
                                        <input name="MontoTotalGgEe" type="hidden" v-model="TotalMontoGGEE">
                                            <input name="MontoTotalAire" type="hidden" v-model="TotalMontoAire">
                                                <input name="MontoTotalFuente" type="hidden" v-model="TotalMontoFuente">
                                                    <div class="col-lg-3" v-for="elemento in elementos" v-if="elemento.id==2">
                                                        <div class="owl-carousel owl-theme " id="products-carousel">
                                                            <div>
                                                                <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                                    <div class="product-image" style="margin-top: 15px;">
                                                                        <i class="fas fa-lightbulb" style="font-size: 50px;color: #f9d466">
                                                                        </i>
                                                                    </div>
                                                                    <div class="product-details">
                                                                        <div class="product-name barlow semi_bold">
                                                                            {{elemento.descripcion}}
                                                                        </div>
                                                                        <div class="text-muted barlow regular">
                                                                            ${{elemento.valor | currency}}
                                                                        </div>
                                                                        <div class="product-cta">
                                                                            <a class="btn">
                                                                                <p>
                                                                                    Total
                                                                                </p>
                                                                                <input @change.prevent="totalActivo2(elemento)" @keyup.prevent="totalActivo2(elemento)" class="form-control" min="1" name="GGEE" style="margin-top: -20px;text-align: center;" type="number" v-model="ggeePreEworktkc">
                                                                                </input>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3" v-for="elemento in elementos" v-if="elemento.id==4">
                                                        <div class="owl-carousel owl-theme " id="products-carousel">
                                                            <div>
                                                                <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                                    <div class="product-image" style="margin-top: 15px;">
                                                                        <i class="fas fa-wind" style="font-size: 50px;color: #64aefe">
                                                                        </i>
                                                                    </div>
                                                                    <div class="product-details">
                                                                        <div class="product-name barlow semi_bold">
                                                                            {{elemento.descripcion}}
                                                                        </div>
                                                                        <div class="text-muted barlow regular">
                                                                            ${{elemento.valor | currency}}
                                                                        </div>
                                                                        <div class="product-cta">
                                                                            <a class="btn">
                                                                                <p>
                                                                                    Total
                                                                                </p>
                                                                                <input @change.prevent="totalActivo3(elemento)" @keyup.prevent="totalActivo3(elemento)" class="form-control" min="1" name="aireAcondicionado" style="margin-top: -20px;text-align: center;" type="number" v-model="inputAire ">
                                                                                </input>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3" v-for="elemento in elementos" v-if="elemento.id==5">
                                                        <div class="owl-carousel owl-theme " id="products-carousel">
                                                            <div>
                                                                <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                                    <div class="product-image" style="margin-top: 15px;">
                                                                        <i class="fas fa-bolt" style="font-size: 50px;color:#0560ff ">
                                                                        </i>
                                                                    </div>
                                                                    <div class="product-details">
                                                                        <div class="product-name barlow semi_bold">
                                                                            {{elemento.descripcion}}
                                                                        </div>
                                                                        <div class="text-muted barlow regular">
                                                                            ${{elemento.valor | currency}}
                                                                        </div>
                                                                        <div class="product-cta">
                                                                            <a class="btn">
                                                                                <p>
                                                                                    Total
                                                                                </p>
                                                                                <input @change.prevent="totalActivo4(elemento)" @keyup.prevent="totalActivo4(elemento)" class="form-control" min="1" name="fuenteRectificadora" style="margin-top: -20px;text-align: center;" type="number" v-model="inputFuente">
                                                                                </input>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="owl-carousel owl-theme " id="products-carousel">
                                                            <div>
                                                                <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                                    <div class="product-image" style="margin-top: 15px;">
                                                                        <i class="fas fa-hard-hat" style="font-size: 50px;color: #ffc107;">
                                                                        </i>
                                                                    </div>
                                                                    <div class="product-details">
                                                                        <div class="product-name barlow semi_bold">
                                                                            Impacto OO.CC
                                                                        </div>
                                                                        <div class="product-cta">
                                                                            <a class="btn">
                                                                                <select @change.prevent="SelectImpacto()" class="form-control select barlow regular" name="SelecImpacto" style="width: 80px;" v-model="preEworkImpacto">
                                                                                    <option v-bind:value="1">
                                                                                        SI
                                                                                    </option>
                                                                                    <option v-bind:value="2">
                                                                                        NO
                                                                                    </option>
                                                                                </select>
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-cta" id="tipoImpacto" style="display: none">
                                                                            <a class="btn">
                                                                                <p class="barlow semi_bold" style="color: #191d21">
                                                                                    Tipo de impacto
                                                                                </p>
                                                                                <select @change.prevent="tipoImpaco()" class="form-control select barlow regular" name="MontoSelecImpacto" v-model="preEworkTipoImpacto">
                                                                                    <option v-bind:value="400000">
                                                                                        BAJO
                                                                                    </option>
                                                                                    <option v-bind:value="1000000">
                                                                                        MEDIO
                                                                                    </option>
                                                                                    <option v-bind:value="3000000">
                                                                                        ALTO
                                                                                    </option>
                                                                                </select>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input name="valorTotal" type="hidden" v-bind:value="TotalPqxSolicitado">
                                                        <div class="col-lg-3">
                                                            <div class="owl-carousel owl-theme " id="products-carousel">
                                                                <div>
                                                                    <div class="product-item pb-3 shadow-box-ag border-rounded-e">
                                                                        <div class="product-image" style="margin-top: 15px;">
                                                                            <i class="fas fa-question" style="font-size: 50px;color:grey">
                                                                            </i>
                                                                        </div>
                                                                        <div class="product-details">
                                                                            <div class="product-name barlow semi_bold">
                                                                                Otros
                                                                            </div>
                                                                            <div class="product-cta">
                                                                                <a class="btn">
                                                                                    <select @change.prevent="OtroSelect()" class="form-control select barlow regular" name="SelectOtroInput" style="width: 80px;" v-model="preEworkOtro">
                                                                                        <option v-bind:value="1">
                                                                                            SI
                                                                                        </option>
                                                                                        <option v-bind:value="2">
                                                                                            NO
                                                                                        </option>
                                                                                    </select>
                                                                                </a>
                                                                            </div>
                                                                            <div class="product-cta" id="valorOtro" style="display: none">
                                                                                <a class="btn">
                                                                                    <p class="barlow semi_bold" style="color: #191d21">
                                                                                        Monto
                                                                                    </p>
                                                                                    <select @change.prevent="getValuesOtro()" class="form-control select barlow regular" name="ValorOtroMontoSelect" style="width: 190px;" v-model="valorOtro">
                                                                                        <option v-bind:value="Monto.id" v-for="Monto in Montosotro">
                                                                                            ${{Monto.descripcion | currency}}
                                                                                        </option>
                                                                                    </select>
                                                                                    <div class="barlow semi_bold">
                                                                                        Descripción
                                                                                    </div>
                                                                                    <input @keyup.prevent="getValuesOtro()" class="form-control" name="Descripcionotro" type="text" v-model="nombreOtro">
                                                                                    </input>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card shadow-box-ag border-rounded-e">
                                                                        <div class="card-body p-0">
                                                                            <div class="table-responsive table-hover">
                                                                                <table class="table table-striped">
                                                                                    <thead>
                                                                                        <tr class="barlow semi_bold">
                                                                                            <th>
                                                                                                Activo
                                                                                            </th>
                                                                                            <th>
                                                                                                Cantidad
                                                                                            </th>
                                                                                            <th>
                                                                                                Total
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr v-if="bateriaPreEworktkc != ''">
                                                                                            <td>
                                                                                                {{arrayBateria['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayBateria['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                ${{arrayBateria['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr v-if="ggeePreEworktkc != ''">
                                                                                            <td>
                                                                                                {{arrayGGEE['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayGGEE['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayGGEE['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr v-if="inputAire != ''">
                                                                                            <td>
                                                                                                {{arrayAire['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayAire['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayAire['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr v-if="inputFuente != ''">
                                                                                            <td>
                                                                                                {{arrayFuente['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayFuente['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayFuente['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr v-if="preEworkTipoImpacto != ''">
                                                                                            <td>
                                                                                                {{arrayImpacto['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayImpacto['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayImpacto['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr v-if="valorOtro != ''">
                                                                                            <td>
                                                                                                {{arrayOtro['0']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{arrayOtro['1']}}
                                                                                            </td>
                                                                                            <td>
                                                                                                ${{arrayOtro['2'] | currency}}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                            </td>
                                                                                            <td>
                                                                                            </td>
                                                                                            <td>
                                                                                                <div class="barlow semi_bold">
                                                                                                    <strong>
                                                                                                        Monto Total
                                                                                                    </strong>
                                                                                                </div>
                                                                                                <div class="barlow regular">
                                                                                                    ${{TotalPqxSolicitado | currency}}
                                                                                                </div>
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
                                                    </input>
                                                </input>
                                            </input>
                                        </input>
                                    </input>
                                </div>
                                <hr>
                                    <div class="row">
                                        <div class="tickets-list">
                                            <div class="ticket-item">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="barlow semi_bold" style="font-size:15px;">
                                                            Imágenes del sitio   (PNJ, JPG, JPEG)
                                                        </label>
                                                        <input @change.prevent="MostrarDatosImagenes" accept="image/*" class="form-control" id="imagenes" multiple="true" ref="iamgenesSitio" type="file"/>
                                                     
                                                    </div>
                                                    <div class="card" style="border-radius: 5px;" v-if="files.length != 0">
                                                        <div class="card-body">
                                                            <p class="barlow semi_bold" style="text-align: center">
                                                                {{files.length == 1 ? files.length+' '+'Archivo seleccionado' :(files.length > 1 ? files.length +' '+ 'Archivos seleccionados':'')}}
                                                            </p>
                                                            <ul class="list-unstyled">
                                                                <li class="media" style="margin-top: 10px;" v-for="(file, key) in files">
                                                                    <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;">
                                                                    </i>
                                                                    <div class="media-body">
                                                                        <p class="barlow regular">
                                                                            {{file.name}}
                                                                        </p>
                                                                    </div>
                                                                    <button @click.prevent="removeFile( key )" class="btn btn-danger mr-3" style="margin-top: 18px; ">
                                                                        <i class="fas fa-window-close blanco">
                                                                        </i>
                                                                    </button>
                                                                </li>
                                                               
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket-item">
                                                <button @click.prevent="validacionPreEwork" class="btn btn-info">
                                                    Aceptar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </hr>
                            </div>
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
import EventBus from "../event-bus"


export default {
    data(){
        return{
            elementos:[],
            bateriaPreEworktkc:'',
            TotalMontoBateria:0,
            TotalMontoGGEE:0,
            TotalMontoAire:0,
            TotalMontoFuente:0,
            preEworkOtro:'',
            preEworkImpacto:'',
            preEworkOtro:'',
            Montosotro:[],
            valorOtro:'',
            preEworkTipoImpacto:'',

        
            arrayBateria:[],
            
            ggeePreEworktkc:'',
            arrayGGEE:[],
            arrayAire:[],
            inputAire:'',
           
            inputFuente:'',
            arrayFuente:[],
            montoImpacto:0,
            arrayImpacto:[],
            valorOtro:'',
            arrayOtro:[],
            nombreOtro:'',
            ValorTotalOtro:0,
            TotalPqxSolicitado:0,
            NombreImagen:[],
            files:[]
        


        }
    },

    created:function(){



        this.Getelementos();

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        let self = this;
        EventBus.$on('bitacora.getBitacora', function () {
            self.getBitacora(); // ejecutas el metodo que desees
        });
    },
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        Getelementos:function(){
             axios.get('/GetElementosPxqTkcPreEwork').then((response)=>{
                this.elementos = response.data;
            })


        },
        MostrarDatosImagenes: function(e) {
            
            let uploadedFiles = this.$refs.iamgenesSitio.files;

           for( var i = 0; i < uploadedFiles.length; i++ ){
             this.files.push( uploadedFiles[i] );
            }
           
        },
          totales:function(){
        this.TotalPqxSolicitado = this.TotalMontoBateria+ this.TotalMontoGGEE +this.TotalMontoAire+ this.TotalMontoFuente+ this.ValorTotalOtro + parseInt(this.montoImpacto) ;
        },
        totalActivo:function(elemento){
          
            if(elemento.id = 1 ){
               this.TotalMontoBateria = this.bateriaPreEworktkc*elemento.valor;
               this.arrayBateria = [elemento.descripcion,this.bateriaPreEworktkc,this.TotalMontoBateria]
              
            }else{
                this.arrayBateria=[]

            }
            if(this.bateriaPreEworktkc == ''){
                 this.TotalMontoBateria=0
              
            }
             this.totales();
           
        },
        getValuesOtro:function(){
            if(this.valorOtro ==1){
                this.ValorTotalOtro = 500000;
            }else{
                if(this.valorOtro ==2){
                      this.ValorTotalOtro = 1000000;
                  }else{
                    if(this.valorOtro ==3){
                         this.ValorTotalOtro = 5000000;
                    }else{
                        if(this.valorOtro ==4){
                            this.ValorTotalOtro = 10000000;
                        }
                    }
                  }
            }
             this.totales();

           this.arrayOtro=['Otro',this.nombreOtro,this.ValorTotalOtro]
        },
        tipoImpaco:function(){
           if(this.preEworkImpacto==1){
                this.montoImpacto = this.preEworkTipoImpacto;
                if(this.preEworkTipoImpacto ==400000){
                      var tipo = 'Bajo';
                }
                if(this.preEworkTipoImpacto ==1000000){
                      var tipo = 'Medio';
                }
                if(this.preEworkTipoImpacto ==3000000){
                      var tipo = 'Alto';
                }
                this.arrayImpacto =['Impacto OO.CC',tipo,this.montoImpacto]
                this.totales();
           }else{
            if(this.preEworkImpacto==2){
               this.arrayImpacto =[];
               this.preEworkTipoImpacto='';
               this.montoImpacto=0;
               this.totales();
            }
           }
           
        },
        SelectImpacto:function(){
             if(this.preEworkImpacto == 1){
              document.getElementById("tipoImpacto").style.display = "";

             }else{
                if(this.preEworkImpacto ==2){
                    document.getElementById("tipoImpacto").style.display = "none";
                  
                       this.arrayImpacto =[];
                       this.preEworkTipoImpacto='';
                       this.montoImpacto=0;
                        this.totales();
            
                }
             }

        },
       
      
        validacionPreEwork:function(){
            
            if(this.TotalPqxSolicitado == 0){
                   this.$swal({
                                type: 'error',
                                title: 'Error',
                                text:'Debes al menos ingresar un elemento de la lista',
                                showCloseButton: true,
                            });
            }
            var imagenes = document.getElementById('imagenes');
            if( this.files.length == 0  &&   document.getElementById("valorTicektElemeto").value == 0){
                  this.$swal({
                            type: 'error',
                            title: 'Error',
                            text:'Debes subir al menos un archivo',
                            showCloseButton: true,
                    });
            }
             
          
            if(this.files.length !=0  && this.TotalPqxSolicitado != 0){
                   this.createPreEwork()
            }


          
                
        },

        createPreEwork:function(){
             let formData = new FormData();
            formData.append('bateria', this.bateriaPreEworktkc);
            formData.append('MontoTotalBateria', this.TotalMontoBateria);

            formData.append('GGEE', this.ggeePreEworktkc);
            formData.append('MontoTotalGgEe', this.TotalMontoGGEE);

            formData.append('aireAcondicionado', this.inputAire);
            formData.append('MontoTotalAire', this.TotalMontoAire);

            formData.append('fuenteRectificadora', this.inputFuente);
            formData.append('MontoTotalFuente', this.TotalMontoFuente);

            formData.append('SelecImpacto', this.preEworkImpacto);
            formData.append('MontoSelecImpacto', this.preEworkTipoImpacto);

            formData.append('SelectOtroInput', this.preEworkOtro);

            formData.append('ValorOtroMontoSelect', this.valorOtro);

            formData.append('Descripcionotro', this.nombreOtro);

            formData.append('valorTotal', this.TotalPqxSolicitado);


            for (var i = 0; i < this.NombreImagen.length; i++) {
                let imagenes = this.NombreImagen[i];
                formData.append('archivosElementoEwork[' + i + ']', imagenes);
            }
            axios.post('/DatosEwork/'+this.$route.params.id,formData,
            {
                headres:{'Content-Type': 'multipart/form-data'}
            }).then((response=>{
                
                
                this.cleanData();
                this.loadFunction();
               EventBus.$emit('sgc.CloseFormTicket'); 
                 this.$swal({
                            type: 'success',
                            title: 'Éxito',
                            text:'Elementos ingresados.',
                            showCloseButton: true,
                    });
                
            }))

            


            


            

        },
        cleanData:function(){
           this.bateriaPreEworktkc=''
           this.MontoTotalBateria=''
           this.ggeePreEworktkc=''
        
           this.inputAire=''
       
           this.inputFuente=''
       
           this.preEworkImpacto=''
           this.preEworkTipoImpacto=''
           this.preEworkOtro=''
           this.valorOtro=''
           this.nombreOtro=''
           this.arrayBateria=[]
           this.arrayGGE=[]
           this.arrayAire=[]
           this.arrayFuente=[]
           this.arrayImpacto=[]
           this.arrayOtro=[]
           this.files = [];
           $("#imagenes").val('')
          
       
            this.TotalMontoBateria=0
            this.TotalMontoGGEE=0
            this.TotalMontoAire=0
            this.TotalMontoFuente=0
            this.montoImpacto=0
           this.ValorTotalOtro=0
            this.TotalPqxSolicitado=0
          this.NombreImagen=[]
        },
         loadFunction:function(){
          let loader = this.$loading.show({
                                            // Optional parameters
              container: this.fullPage ? null : this.$refs.formContainer,
              canCancel: true,
              onCancel: this.onCancel,
          });
                                        // simulate AJAX
          setTimeout(() => {
              loader.hide()
          }, 900)
        },
         
          totalActivo2:function(elemento){
            if(elemento.id = 2 ){
               this.TotalMontoGGEE = this.ggeePreEworktkc*elemento.valor;
               this.arrayGGEE = [elemento.descripcion,this.ggeePreEworktkc,this.TotalMontoGGEE]
                this.TotalPqxSolicitado = this.TotalMontoGGEE;
            }else{
                this.arrayGGEE=[]

            }
            if(this.ggeePreEworktkc == ''){
                 this.TotalMontoGGEE=0
                
            }
             this.totales();
         },
         totalActivo3:function(elemento){
            if(elemento.id = 4 ){
               this.TotalMontoAire = this.inputAire*elemento.valor;
               this.arrayAire = [elemento.descripcion,this.inputAire,this.TotalMontoAire]
            }else{
                this.arrayAire=[]

            }
              if(this.inputAire == ''){
                 this.TotalMontoAire=0
            }
              this.totales();
         },
           totalActivo4:function(elemento){
            if(elemento.id = 5 ){
               this.TotalMontoFuente = this.inputFuente*elemento.valor;
               this.arrayFuente = [elemento.descripcion,this.inputFuente,this.TotalMontoFuente]
            }else{
                this.arrayFuente=[]

            }
              if(this.inputFuente == ''){
                 this.TotalMontoFuente=0
            }
              this.totales();
         },
        OtroSelect:function(){
             if(this.preEworkOtro == 1){
              document.getElementById("valorOtro").style.display = "";
              axios.get('/montosOtroPreEwork').then((response)=>{
                this.Montosotro = response.data;
             
              })

             }else{
                if(this.preEworkOtro ==2){
                    document.getElementById("valorOtro").style.display = "none";
                    this.Montosotro = [];

                     this.arrayOtro=[]
                     this.nombreOtro = '';
                    this.valorOtro = '';
                     this.ValorTotalOtro = 0;
                     this.totales();
                }
             }
        },
        getFileExtension: function(filename) {
          return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
        },
        removeFile(key) {
        this.files.splice(key, 1);
        },

        
    }
}
</script>
