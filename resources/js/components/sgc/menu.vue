<template>
    <div>
        <ul class="sidebar-menu">
            <li class="menu-header">
                Menú
            </li>
            <li>
                <a class="nav-link" href="/modulos">
                    <i class="fas fa-home">
                    </i>
                    <span>
                        Modulos
                    </span>
                </a>
            </li>
            <li id="menuAdmin" style="display: none">
                <router-link :to="{ path:`/sgc/27`, params: {modulo: `27`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                    <a :href="href" class="nav-link" >
                       <i class="fas fa-user-cog"></i>
                        <span>
                            Administrador
                        </span>
                    </a>
                </router-link>
            </li>
            <li class="nav-item dropdown" id="menuSolicitud" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-edit">
                    </i>
                    <span>
                        Solicitud
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li v-if="misSlcOym != 0">
                        <a href="/sgc/0" class="nav-link" >
                            Mis solicitudes
                        </a>
                    </li>
                    <li v-if="menusolicitudCreateOym != 0">
                        <a @click.prevent="showFormOym()" class="nav-link" href="#">
                            Crear solicitud O&M
                        </a>
                    </li>
                    <li @click.prevent="showFormIng()" v-if="menusolicitudCreateIng != 0">
                        <a class="nav-link" href="#">
                            Crear solicitud ingenieria
                        </a>
                    </li>
                    <li v-if="m_slc_crm != 0">
                        <router-link :to="{ path:`/sgc/42`, params: {modulo: `42`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                           <a :href="href" class="nav-link" >
                               Mi CRM
                           </a>
                        </router-link>
                    </li>
                    <li v-if="historialOym != 0">
                        <router-link :to="{ path:`/sgc/25`, params: {modulo: `25`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                            <a :href="href" class="nav-link" >
                                Historial O&M
                            </a>
                       </router-link>
                    </li>
                    <li v-if="historialIng != 0">
                        <router-link :to="{ path:`/sgc/26`, params: {modulo: `26`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :href="href" class="nav-link" >
                            Historial Ingenieria
                        </a>
                    </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="menuValidador" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-check">
                    </i>
                    <span>
                        Validador O&M
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <router-link :to="{ path:`/sgc/19`, params: {modulo: `19`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                            <a :href="href" class="nav-link" >
                                Solicitudes Pendientes
                            </a>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="menujefe" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-user">
                    </i>
                    <span>
                        Jefe área O&M
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                          <router-link :to="{ path:`/sgc/21`, params: {modulo: `21`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :href="href" class="nav-link" >
                            Solicitudes Pendientes
                        </a>
                    </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="menuControl" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-tasks">
                    </i>
                    <span>
                        Control O&M
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <router-link :to="{ path:`/sgc/5`, params: {modulo: `5`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :href="href" class="nav-link" >
                            Solicitudes
                        </a>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="menuPmo" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-project-diagram">
                    </i>
                    <span>
                        PMO
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <router-link :to="{ path:`/sgc/16`, params: {modulo: `16`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :href="href" class="nav-link" >
                            Solicitudes
                        </a>
                    </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown" id="menucontropmo" style="display: none">
                <a class="nav-link has-dropdown" href="#">
                    <i class="fas fa-network-wired">
                    </i>
                    <span>
                        Control ingeniería
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                         <router-link :to="{ path:`/sgc/13`, params: {modulo: `13`}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                        <a :href="href" class="nav-link" >
                            Solicitudes
                        </a>
                    </router-link>
                    </li>
                </ul>
            </li>
            <li id="menuProv" >
                <a class="nav-link" href="/ProvAdmin">
                    <i class="fas fa-truck-loading">
                    </i>
                    <span>
                        Admin. proveedores
                    </span>
                </a>
            </li>
        </ul>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"


export default {
    props:['permiso'],
    data(){
        return{
        
            permisos:[],
            menusolicitud:0,
            menusolicitudCreateOym:0,
            micrm:0,
            historialOym:0,
            historialIng:0,
            menusolicitudCreateIng:0,
            menuValidador : 0,
            menuJefeOym:0,
            menuControl:0,
            menupmo:0,
            menuControlIng:0,
            menuProveedor:0,
            menuadmin:0,
            misSlcOym:0,
            m_slc_crm:0

        }
    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
          this.getPermisos()
    },

    created:function(){


    
        

    },
  
    methods:{
        formato:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        showFormOym:function(){
               EventBus.$emit('sgc.form')
        },
        showFormIng:function(){
               EventBus.$emit('sgc.formIng')
        },
        HistorialOym:function(modulo){
                EventBus.$emit('sgc.historialOym',modulo);
        },
        MisSolicitudes:function(modulo){
                EventBus.$emit('sgc.misSlcOym',modulo);
        },
        HistorialIng:function(modulo){
            EventBus.$emit('sgc.historialIng',modulo);
        },
        SolicitudesValidador:function(modulo){
                EventBus.$emit('sgc.validador',modulo);
        },
        SolicitudesJefe:function(modulo){
            EventBus.$emit('sgc.jefeoym',modulo);
        },
        SolicitudesControl:function(modulo){
             EventBus.$emit('sgc.controloym',modulo);
        },
        SolicitudesPmo:function(modulo){
             EventBus.$emit('sgc.pmo',modulo);
        },
        SolicitudesControlIng:function(modulo){
             EventBus.$emit('sgc.controlIng',modulo);
        },
        admin:function(modulo){
             EventBus.$emit('sgc.AdminSolicitudes',modulo);
        },
        getPermisos:function(){
            
               

                     for (var i = 0; i < this.permiso.length; i++) {

                             let per = this.permiso[i]

                             if(per.permission_id == 13 ){
                                this.menusolicitud = 1;
                                document.getElementById('menuSolicitud').style.display = 'block'
                             }
                             if(per.permission_id == 14 ){
                                this.menusolicitudCreateOym = 1;
                             }
                        
                              if(per.permission_id == 40 ){
                                this.historialOym = 1;
                             }
                              if(per.permission_id == 52 ){
                                this.historialIng = 1;
                             }
                             if(per.permission_id == 42 ){
                                this.menusolicitudCreateIng = 1;
                             }
                             if(per.permission_id == 101 ){
                                this.menuValidador = 1;
                                document.getElementById('menuValidador').style.display = 'block'
                             }
                              if(per.permission_id == 112  ){
                                this.menuJefeOym = 1;
                                document.getElementById('menujefe').style.display = 'block'
                             }
                              if(per.permission_id == 19  ){
                                this.menuControl = 1;
                                document.getElementById('menuControl').style.display = 'block'
                             }
                             if(per.permission_id == 44  ){
                                this.menupmo = 1;
                                document.getElementById('menuPmo').style.display = 'block'
                             }
                             if(per.permission_id == 158  ){
                                this.menuControlIng = 1;
                                document.getElementById('menucontropmo').style.display = 'block'
                             }
                           
                            if(per.permission_id == 159  ){
                                this.menuadmin = 1;
                                document.getElementById('menuAdmin').style.display = 'block'
                             }
                             if(per.permission_id == 166 ){
                                this.misSlcOym = 1;
                             }
                              if(per.permission_id == 48 ){
                                this.m_slc_crm = 1;
                             }

                            

                     }
                     
            
            },
        
        
        
    }
}
</script>