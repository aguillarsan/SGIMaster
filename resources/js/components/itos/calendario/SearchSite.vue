<template>
    <div class="form-group">
        <label for="project_manager">
            Sitio*
        </label>

        <div id="select_site_sgc" v-if="info_site != '' ">
            <div class="input-group">
                <input class="form-control" disabled="true" name="" style="background-color:#1e5e98;color:white;"
                    type="" v-bind:value="info_site" />
                <div class="input-group-append">
                    <div @click.prevent="changeSite()" class="input-group-text " style="cursor: pointer  ">
                        <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                        </i>
                    </div>
                </div>
            </div>
        </div>
        <div id="site_search_sgc" v-if="info_site == '' ">
            <div class="input-group">
                <input class="form-control " style="width:100%" id="input_site_search" placeholder="Buscar Sitio"
                    type="text" v-model="buscar" v-on:keyup="searchSite" />

            </div>
        </div>
        <div id="listPops" v-if="sites.length != 0">
            <div class="s_l">
                <div :style="'width:'+input_width_form+'px'+';'" class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                    <div v-for="site in sites">
                        <a @click.prevent="select_site_sgc_fun(site)" href="" id="selectpopvalue" style="color:black">
                            {{site.nem_site}} {{site.nombre}}
                            <hr style="margin-top: -1px;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="errorPop" style="display: none">
            <p style="color: red">
                Favor Seleccionar el sitio
            </p>
        </div>

    </div>
</template>
<script>
    import axios from 'axios';
    import EventBus from "../event-bus"

    export default {
        props: ['event_name'],
        data() {
            return {
                buscar: '',
                info_site: '',
                sites: [],
                input_width_form: '',
                site_id: ''
            }
        },
        mounted() {
            let self = this;


            EventBus.$on('clean-site-select', function () {
                self.changeSite()


            });
        },
        methods: {
            alertShow() {
               
            },
            searchSite() {

                if (this.buscar.length >= 3) {
                    this.input_width_form = document.getElementById("input_site_search").clientWidth;

                    axios.get(`/GetPop?datositio=${this.buscar}`).then((response) => {
                        this.sites = response.data
                    });
                } else {
                    this.sites = '';

                }

            },
            select_site_sgc_fun(site) {
                this.sites = '';
                this.info_site = site.nem_site + '-' + site.nombre;
                this.site_id = site.id;
                EventBus.$emit(this.event_name, this.site_id)

            },
            changeSite() {
                this.buscar = '';
                this.info_site = '';
                this.site_id = '';
                this.sites = '';
                EventBus.$emit(this.event_name, this.site_id)
            }
        }
    }
</script>