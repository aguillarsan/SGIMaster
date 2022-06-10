/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));



require('./bootstrap');


var rechazo = require('./components/rechazo.vue').default;
var grafico = require('./components/grafico.vue').default;
var halted = require('./components/halted.vue').default;

var indexing = require('./components/conexiones/indexing.vue').default;
var showing = require('./components/conexiones/showing.vue').default;
var formularioing = require('./components/conexiones/formularioing.vue').default;
var menuIngTicket = require('./components/conexiones/menu.vue').default;

var notification = require('./components/notificacion.vue').default;
var mantencionline = require('./components/mantencion.vue').default;

var control = require('./components/control.vue').default;
var sgcticket = require('./components/sgcticket.vue').default;
var elementos = require('./components/elementos.vue').default;
var denuncia = require('./components/denuncia.vue').default;
var fileticket = require('./components/fileticket.vue').default;

var plataforma = require('./components/plataforma.vue').default;
var folder = require('./components/repositorio/carpetas.vue').default;
var repositoriooptions = require('./components/repositorio/optionrepositorio.vue').default;
var modulo = require('./components/menuprincipal/modulos.vue').default;
var modaleditsite = require('./components/modaleditpop.vue').default;
var registro = require('./components/registro.vue').default;
var requestaccoutn = require('./components/Administracion/requestaccount.vue').default;

var contenido = require('./components/portal/contenido.vue').default;
var menusgc = require('./components/sgc/menu.vue').default;
var reaccion = require('./components/portal/reaccion.vue').default;
var indexsgi = require('./components/sgi/modulos.vue').default;
var showsgc = require('./components/sgc/show.vue').default;
var psasolicitud = require('./components/psa/tablesolicitud.vue').default;
var psashow = require('./components/psa/show.vue').default;
var stockbateria = require('./components/psa/stock.vue').default;
var formoym =require('./components/sgc/formOym.vue').default;
var indexcontrolcambio =require('./components/controlCambios/index.vue').default;
var menuticket = require('./components/ticket/menu.vue').default;
var formhalted = require('./components/sitehalted/formulario.vue').default;
var showgc = require('./components/sgc/show.vue').default;

var adminproveedor = require('./components/sgc/proveedor.vue').default;
var sitiosdashboard = require('./components/dashboard/sitios.vue').default;

var index_control_pep = require('./components/control_pep/index.vue').default;
var show_control_pep = require('./components/control_pep/show.vue').default;

Vue.component('apprepositorio', require('./components/repositorio/App.vue').default);
Vue.component('appreports', require('./components/reports/App.vue').default);
Vue.component('appsuport', require('./components/Suport/App.vue').default);
Vue.component('appacreditation', require('./components/Acreditacion/App.vue').default);
Vue.component('appitos', require('./components/itos/App.vue').default);

Vue.component('adminuser', require('./components/Administracion/App.vue').default);
Vue.component('apprendicion', require('./components/Rendicion/App.vue').default);

Vue.component('changepass', require('./components/Auth/changePassword.vue').default);




Vue.prototype.$eventBus = new Vue()
import Vue from 'vue' 
import VueSweetalert2 from 'vue-sweetalert2';
import Vuetify from 'vuetify/lib'
import EventBus from "./components/event-bus"

import axios from 'axios';
import Loading from 'vue-loading-overlay';
import VueClipboard from 'vue-clipboard2';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';
import VueCurrencyFilter from 'vue-currency-filter'
import VueRouter from 'vue-router'
import routes from './routes'

import VueCurrencyInput from 'vue-currency-input'

Vue.use(VueCurrencyInput)
Vue.use(VueClipboard);

Vue.use(VueCurrencyFilter)
// Init plugin 
Vue.use(Loading);

Vue.use(VueSweetalert2);
Vue.use(Vuetify)
Vue.use(VueRouter)
const app = new Vue({
    router: new VueRouter(routes),
    el: '#app',
    vuetify: new Vuetify(),
    components: {
         baglog: () => import( /* webpackChunkName: "chunks/baglog"*/ './components/baglog.vue'),
         ticketshow: () => import( /* webpackChunkName: "chunks/ticket/ticketshow"*/ './components/ticket/show.vue'),
         cambiarcontrasenia:()=>import( /* webpackChunkName: "chunks/cambiarcontrasenia"*/ './components/cambiarcontrasenia.vue'),
        'rechazo': rechazo,
        'grafico': grafico,
        'halted': halted,
        'indexing': indexing,
        'formularioing': formularioing,
        'mantencion': mantencionline,
        'showing': showing,
    
        'control':control,
        'sgcticket':sgcticket,
        'elementos':elementos,
        'denuncia':denuncia,
        'fileticket':fileticket,
       
        'plataforma':plataforma,
        'folder':folder,
        'repositoriooptions':repositoriooptions,
        'modulo':modulo,
        'modal-edit-site':modaleditsite,
        'notification':notification,
        'registro':registro,
        'requestaccoutn':requestaccoutn,
         tablerequest: () => import( /* webpackChunkName: "chunks/sgc/tablerequest"*/ './components/sgc/tablesrequest.vue'),
       
        'contenido':contenido,
        'menusgc':menusgc,
        'reaccion':reaccion,
        'indexsgi':indexsgi,
        'showsgc':showsgc,
        'psa-solicitud':psasolicitud,
        'psa-show':psashow,
        'stock-bateria':stockbateria,
        'index-control-cambio':indexcontrolcambio,
        'menuticket':menuticket,
        'formhalted':formhalted,
        'sgc-detail-request':showgc,
        'proveedor-list':adminproveedor,
        'sitios-dashboard':sitiosdashboard,
        'index-control-pep':index_control_pep,
        'show-control-pep':show_control_pep,
        'menu-ing-ticket':menuIngTicket,
      
        
       
        



        //'notificacion':notificaciones
    },
    data() {
        return {
          
            attachment: null,
         
         
            
            
           
            
            fullPage: false
        }
    },

    created: function() {
        this.GetmodeLayout();
        
       
          
      },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
       
        
        Vue.use(VueCurrencyFilter,
        {
         symbol : '$',
         thousandsSeparator: '.',
         fractionCount: 2,
         fractionSeparator: ',',
         symbolPosition: 'front',
         symbolSpacing: true,
         avoidEmptyDecimals: undefined
       })
     
        

    },
      
    methods: {
        
      
        GetmodeLayout:function(){
            axios.get('/getMode').then((response)=>{
                this.modeLayout = response.data;
                
            })
        },
        changeMode:function(){
            axios.get('/updateModeuser').then((response)=>{
                this.GetmodeLayout();
            })
        },
 
      
       
     
      
       
       
       
      
      
       
      
   
  
      
      
      
    }
});