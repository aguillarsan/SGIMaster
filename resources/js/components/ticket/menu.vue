<template>
    <div>
        <ul class="sidebar-menu">
            <li class="menu-header barlow bold">
                Menú
            </li>
            <li>
                <a class="nav-link barlow semi_bold" href="/modulos">
                    <i class="fas fa-home">
                    </i>
                    <span>
                        Modulos
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown"  id="Menuticket" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" :style="currentRoute == ('/ticketblade/0') ? 'background-color:#007bff;color:white':(currentRoute == ('/ticketblade/9') ? 'background-color:#007bff;color:white':(currentRoute == ('/ticketblade/10') ? 'background-color:#007bff;color:white':(currentRoute == ('/ticketblade/8') ? 'background-color:#007bff;color:white':(currentRoute == ('/home') ? 'background-color:#007bff;color:white':''))))" href="#">
                    <i class="fas fa-ticket-alt">
                    </i>
                    <span>
                        Tickets
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li v-if="viewDashboard == 1">
                        <a class="nav-link" href="/home">
                            Dashboard tickets
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="/ticketblade/0">
                            Modulo principal
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="/ticketblade/9">
                            Listado general
                        </a>
                    </li>
                   
                    <li v-if="viewMicrm == 1">
                        <a class="nav-link" href="/ticketblade/10">
                            Mi crm
                        </a>
                    </li>
                    
                    <li v-if="viewOperacion==1">
                        <a class="nav-link" href="/ticketblade/8">
                            En operación
                        </a>
                    </li>
                    <li v-if="viewOperacion==1">
                        <a class="nav-link" href="/ticketblade/11">
                            Gestión de residuos
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="nav-item dropdown" id="MenuControlPep" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" href="#" :style="currentRoute == ('/control-pep') ? 'background-color:#007bff;color:white':''">
                <i class="fas fa-money-check-alt"></i>
                    <span>
                        Control PEP
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li >
                        <a class="nav-link" href="/control-pep" >
                          Peps 
                        </a>
                    </li>
                    
                    
                    
                </ul>
            </li>
              <li  id="aprobar_sgc" style="display:none" >
                <a class="nav-link" href="/sgc/43" target="blank_">
                    <i class="fas fa-dollar-sign">
                    </i>
                    <span class="barlow semi_bold">
                        Por aprobar SGC
                    </span>
                </a>
            </li>
            
             <li class="nav-item dropdown" id="MenuticketMonitoreo" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" href="#">
                    <i class="fas fa-ticket-alt">
                    </i>
                    <span>
                        Tickets
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                  
                    
                    <li>
                        <a class="nav-link" href="/ticketblade/9">
                          Tickets O&M
                        </a>
                    </li>
                  
                    
                    <li>
                        <a class="nav-link" href="/MonitoreoTicketIng">
                              Tickets Ingeniería
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="MenuMantencion" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" href="#" :style="currentRoute == ('/ticketblade/7') ? 'background-color:#007bff;color:white':(currentRoute == ('/ticketblade/12') ? 'background-color:#007bff;color:white':'')">
                    <i class="fas fa-tools"></i>
                    <span>
                        Mantención red core
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li v-if="viewMantencionCore==1">
                        <a class="nav-link" href="/ticketblade/7">
                            Mantención red core 2020
                        </a>
                    </li>
                    <li v-if="viewMantencionCore==1">
                        <a class="nav-link" href="/ticketblade/12">
                            Mantención red core 2021
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="MenuControl" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold"  :style="currentRoute == ('/ticketControl') ? 'background-color:#007bff;color:white':''" href="#">
                    <i class="fas fa-inbox">
                    </i>
                    <span>
                        Control
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li>
                        <a class="nav-link" href="/ticketControl">
                            Tickets
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="MenuCovid" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" href="#">
                    <i class="fas fa-biohazard">
                    </i>
                    <span>
                        Covid-19
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li>
                        <a class="nav-link" href="/exportCovid">
                            Exportar respuestas
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link barlow semi_bold" href="/rechazadaView">
                    <i class="fas fa-times-circle">
                    </i>
                    <span>
                        Tickets Rechazados
                    </span>
                </a>
            </li>
            <li id="Menugraficos" style="display:none">
                <a class="nav-link barlow semi_bold" :style="currentRoute == ('/graficos') ? 'background-color:#007bff;color:white':''" href="/graficos">
                    <i class="fas fa-chart-bar">
                    </i>
                    <span>
                        Estadistica
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown" id="MenuSitesHAlted" style="display:none">
                <a class="nav-link has-dropdown barlow semi_bold" href="#">
                    <i class="fas fa-globe-americas">
                    </i>
                    <span>
                        Sitios halted
                    </span>
                </a>
                <ul class="dropdown-menu barlow regular">
                    <li v-if="viewdeshboarsites ==1">
                        <a class="nav-link" href="/pop">
                            Dashboard
                        </a>
                    </li>
                    <li v-if="viewlistadosSiteHalted==1">
                        <a class="nav-link" href="/lista">
                            Listado de sitios
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</template>
<script>
import EventBus from "./event-bus";
import axios from 'axios';
import moment from 'moment';

export default {
  
    props:['Arr_all_get'],
    data(){
        return{
            
        permisos:[],
        menuticket:'',
        viewMicrm:'',
        viewMantencionCore:'',
        viewOperacion:'',
        viewCovid19:'',
        viewGraficos:'',
        viewdeshboarsites:'',
        viewlistadosSiteHalted:'',
        viewDashboard:'',
        CretaticketOym:'',
        CretaticketIng:'',
        menu_proveedor:0

        }
    },
     mounted: function() { /* Agrega mounted y con el siguiente contenido */
         console.log(this.currentRoute)
    this.getpermisos();
    },

    created:function(){


    

    },

    computed:{
     currentRoute () {
       
       return  this.$route.fullPath
     },
   },
   
    methods:{
        
        
    getpermisos: function() {
      let Arrpermissions = JSON.parse(this.Arr_all_get);
      for (var i = 0; i < Arrpermissions.length; i++) {
          let ObjPermiso = Arrpermissions[i]
          if (ObjPermiso.permission_id == 136) {
              this.menuticket = 1;
              document.getElementById('Menuticket').style.display = 'block'
              document.getElementById('MenuMantencion').style.display = 'block'
          }
          if (ObjPermiso.permission_id == 153) {
              this.viewMicrm = 1;
          }
          if (ObjPermiso.permission_id == 132) {
              this.viewMantencionCore = 1;
          }
          if (ObjPermiso.permission_id == 133) {
              this.viewOperacion = 1;
          }
          if (ObjPermiso.permission_id == 137) {
              this.viewControl = 1;
              document.getElementById('MenuControl').style.display = 'block'
          }
          if (ObjPermiso.permission_id == 138) {
              this.viewCovid19 = 1;
              document.getElementById('MenuCovid').style.display = 'block'
          }
          if (ObjPermiso.permission_id == 162) {
              this.viewGraficos = 1;
              document.getElementById('Menugraficos').style.display = 'block'
          }
          if (ObjPermiso.permission_id == 127) {
              document.getElementById('MenuSitesHAlted').style.display = 'block'
          }
          if (ObjPermiso.permission_id == 128) {
              this.viewdeshboarsites = 1;
          }
          if (ObjPermiso.permission_id == 129) {
              this.viewlistadosSiteHalted = 1;
          }
          if (ObjPermiso.permission_id == 167) {
              this.viewDashboard = 1;
          }
          if(ObjPermiso.permission_id == 177){
            this.CretaticketOym = 1;
            document.getElementById('MenuticketMonitoreo').style.display = 'block'
          }
          if(ObjPermiso.permission_id == 194){
            document.getElementById('MenuControlPep').style.display = 'block'
            document.getElementById('aprobar_sgc').style.display = 'block'
            
          }
      }
  },
 
    
    
    }
}
</script>
