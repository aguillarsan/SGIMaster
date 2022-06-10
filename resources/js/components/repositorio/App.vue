<template>
    <div>
        <div class="main-wrapper">
            <div class="navbar-bg" style="background: -webkit-linear-gradient(left,#ff8ddb ,#bb73e0)">
            </div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
                                <i class="fas fa-bars">
                                </i>
                            </a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                            <img :src="usuario.avatar" alt="image" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">
                                {{usuario.name }} {{usuario.apellido }}
                            </div>
                            </img>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a @click="logout()" class="dropdown-item has-icon text-danger" style="cursor: pointer">
                                <i class="fas fa-sign-out-alt">
                                </i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="/logosEntel/l-2020.png" width="80">
                        </img>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <img src="/logosEntel/l-2020.png" width="50">
                        </img>
                    </div>
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
                                <router-link
                                    :style="currentRoute == 'myFolder' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    :to="'/repositorio'" class="nav-link" href="#">
                                    <i class="fas fa-hdd">
                                    </i>
                                    <span>
                                        Mi unidad
                                    </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="'/repositorio/OfficeTrackFolders'"
                                    :style="currentRoute == 'OfficeTrackFolders' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    class="nav-link" href="#">
                                    <i class="fas fa-archive">
                                    </i>
                                    <span>
                                        Office Track
                                    </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="'/repositorio/SgcFiles'"
                                    :style="currentRoute == 'SgcFiles' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    class="nav-link" href="#">
                                    <i class="fas fa-dollar-sign">
                                    </i>
                                    <span>
                                        SGC
                                    </span>
                                </router-link>
                            </li>
                            <li v-if="admin">
                                <router-link
                                    :style="currentRoute == 'FoldersAdmin' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    :to="'/repositorio/folderAdmin'" class="nav-link" href="#">
                                    <i class="far fa-user">
                                    </i>
                                    <span>
                                        Administrador
                                    </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :style="currentRoute == 'FoldersShared' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    :to="'/repositorio/FoldersShared'" class="nav-link" href="#">
                                    <i class="fas fa-user-friends">
                                    </i>
                                    <span>
                                        Compartido conmigo
                                    </span>
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :style="currentRoute == 'FoldersTrash' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(187, 115, 224); color: #fff;':''"
                                    :to="'/repositorio/FoldersTrash'" class="nav-link" href="#">
                                    <i class="far fa-trash-alt">
                                    </i>
                                    <span>
                                        Papelera
                                    </span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
        <!-- Main Content -->
        <router-view :usuario="usuario">
        </router-view>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright ©
                <div class="bullet">
                </div>
                Design By
                <a href="http://www.anidalatam.com/" target="blank__">
                    Anida Consultores
                </a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {

                admin: false

            }
        },
        props: ['usuario'],
        mounted() {
            window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent', (e) => {
                window.location.replace("/login");
            });
        },
        created: function () {
            this.getPermisos()
        },
        computed: {
            currentRoute() {
                return this.$route.name;
            },
        },
        methods: {
            logout() {
                axios.get('/logout/user').then(response => {

                    window.location.replace('/login')

                })
            },
            getPermisos: function () {
                axios.get('/getPermisos').then((response) => {
                    this.permisos = response.data;
                    let permission = this.permisos.find((obj => obj.permission_id == 149));

                    if (permission) {
                        this.admin = true;
                    }


                })

            },
        }
    };
</script>