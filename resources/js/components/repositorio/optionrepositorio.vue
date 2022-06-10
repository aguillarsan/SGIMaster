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
            <li>
                <a class="nav-link" href="#"@click.prevent="thisModuloMiUnidad">
                    <i class="fas fa-hdd">
                    </i>
                    <span>
                        Mi unidad
                    </span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/officetrack/folders" >
                  <i class="fas fa-archive"></i>
                    <span>
                      Office Track
                    </span>
                </a>
            </li>
             <li v-for="permiso in permisos" v-if="permiso.permission_id ==149">
                <a class="nav-link"  href="#" @click.prevent="foldersAreaUsers">
                    <i class="far fa-user"></i>
                    </i>
                    <span>
                        Administrador
                    </span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#" @click.prevent="folderShared">
                    <i class="fas fa-user-friends">
                    </i>
                    <span>
                        Compartido conmigo
                    </span>
                </a>
            </li>
           
            <li>
                <a @click.prevent="thisModuloTrash" class="nav-link" href="#">
                    <i class="far fa-trash-alt">
                    </i>
                    <span>
                        Papelera
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
	data(){
		return{
			
        permisos:[]

		}
	},

	created:function(){


    this.getpermisos();
	

	},
	mounted: function() { /* Agrega mounted y con el siguiente contenido */
		
	},
	methods:{
		
		thisModuloTrash:function(){
			EventBus.$emit('folder.Delete');
         

		},
		thisModuloMiUnidad:function(){
			EventBus.$emit('folder.unidad');
            
		},
		folderShared:function(){
           EventBus.$emit('folder.shared');
        
		},
        foldersAreaUsers:function(){
          EventBus.$emit('folders.UsersArea');
         

        },
        getpermisos:function(){
          axios.get('/getPermisos').then((response)=>{
            this.permisos = response.data;
          })
        },
      
	
	
	}
}
</script>
