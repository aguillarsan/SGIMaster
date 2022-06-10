<template>
    <div>
        <div class="main-wrapper">
            <div class="navbar-bg" style="background: -webkit-linear-gradient(left,#4776E6,#8E54E9)"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a class="nav-link nav-link-lg" data-toggle="sidebar" href="#">
                                <i class="fas fa-bars"> </i>
                            </a>
                        </li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                            <img :src="usuario.avatar" alt="image" class="rounded-circle mr-1" />
                            <div class="d-sm-none d-lg-inline-block">
                                {{ usuario.name }} {{ usuario.apellido }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a @click="logout()" class="dropdown-item has-icon text-danger" style="cursor: pointer">
                                <i class="fas fa-sign-out-alt"> </i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar" id="main_sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="/logosEntel/l-2020.png" width="80" />
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <img src="/logosEntel/l-2020.png" width="50" />
                    </div>
                    <div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Menú</li>
                            <li>
                                <a class="nav-link" href="/modulos">
                                    <i class="fas fa-home"> </i>
                                    <span> Modulos </span>
                                </a>
                            </li>
                            <li v-if="usuario.rol == 1 || usuario.rol == 8">
                                <router-link class="nav-link" :to="'/itos'" href="#"
                                    :style="currentRoute == 'calendarioItos' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(71, 118, 230);color: #fff;':''">
                                    <i class="fas fa-calendar"> </i>
                                    <span> Itos </span>
                                </router-link>
                            </li>
                            <li v-if=" usuario.rol == 35 || usuario.rol == 1  || usuario.rol == 8 ">
                                <router-link :to="'/itos/task'" class="nav-link" href="#"
                                    :style="currentRoute == 'TaskItos' ? 'box-shadow: 0 4px 8px #acb5f6;background-color: rgb(71, 118, 230); color: #fff;':''">
                                    <i class="fas fa-tasks"></i>
                                    <span> Tareas </span>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <!-- Main Content -->
                <router-view :usuario="usuario"> </router-view>


            </div>
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Copyright ©
                <div class="bullet"></div>
                Design By
                <a href="http://www.anidalatam.com/" target="blank__">
                    Anida Consultores
                </a>
            </div>
            <div class="footer-right"></div>
        </footer>
    </div>
</template>

<script>
    import axios from 'axios';
    import EventBus from "./event-bus"
    export default {
        props: ["usuario"],
        data() {
            return {};
        },
        computed: {
            currentRoute() {
                return this.$route.name;
            },
        },
        mounted() {
            window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent', (e) => {
                window.location.replace("/login");
            });
        },
        created: function () {
            if (this.usuario.rol == 8 || this.usuario.rol == 1) {
                this.$router.push('/itos')
            } else if (this.usuario.rol == 35) {
                this.$router.push('/itos/task')
            }
        },
        methods: {
            logout() {
                axios.get("/logout/user").then((response) => {
                    window.location.replace("/login");
                });
            },

        },
    };
</script>