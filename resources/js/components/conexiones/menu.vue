<template>
    <div>
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <img src="/logosEntel/l-2020.png" width="80">
                </img>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <img src="/logosEntel/l-2020.png" width="50">
                </img>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">
                    Modulos
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
                <li >
                    <a class="nav-link" :style="currentRoute == '/ticket-ing'?'background-color:#42E8B4;color:white':''" href="/ticket-ing">
                        <i class="fas fa-ticket-alt">
                        </i>
                        <span >
                           Tickets
                        </span>
                    </a>
                </li>
                <li style="display:none">
                    <a class="nav-link" :style="currentRoute == '/planing-ing'?'background-color:#42E8B4;color:white':''" href="/planing-ing">
                        <i class="fas fa-project-diagram">
                        </i>
                        <span >
                           Planing
                        </span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</template>
<script>


export default {
  
    
    data(){
        return{
            
      

        }
    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
      
    },

    created:function(){

      console.log(this.currentRoute)
    

    },

    computed:{
     currentRoute () {
       
       return  this.$route.fullPath
     },
   },
   
    methods:{
        
  
 
    
    
    }
}
</script>
