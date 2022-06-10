<template>
    <div class="wrapper wrapper-content">
        <section class="section">
            <div class="section-header shadow-box-ag" style="

  
    border-bottom-right-radius: 50% 40%;">
                <div class="row">
                    <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                        <div class="card-stats-title">
                            <h1 class="barlow bold">
                                Tickets {{crmNombre}} {{NombreModuloMotivo}}
                            </h1>
                            <br>
                                <div v-if="crm == 0">
                                    <div v-if="  UserId == 21">
                                        <a class="barlow regular" href="/ticketExcelObrasCiviles">
                                            <i class="fas fa-download">
                                            </i>
                                            Descargar Reporte General
                                        </a>
                                    </div>
                                   
                                    <div v-if="UserId == 14">
                                        <a class="barlow regular" href="/ticketExcelClima">
                                            <i class="fas fa-download">
                                            </i>
                                            Descargar  Reporte General
                                        </a>
                                    </div>
                                    <div v-if="UserId != 21 && UserId != 14">
                                        
                                        <a :href="`/TkcfilterExcel?codigo=${this.codigo}&modulo=${this.modulo}&area=${this.area}&sitio=${sitio_tech_search_input}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&motivoSelectIng=${this.selectmotivo}&vista=${this.selectmotivo}`" class=" barlow regular" v-if="rol_id == 12 || rol_id == 1 || rol_id == 8 || rol_id ==9 || rol_id == 5 ">
                                            <i class="fas fa-download">
                                            </i>
                                            Descargar  Reporte General
                                        </a>
                                    </div>
                                    <div v-if="selectmotivo == 11">
                                        <div>
                                            <a class="barlow regular" href="/ticketExcelResago">
                                                <i class="fas fa-download">
                                                </i>
                                                Descargar Reporte General
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown d-inline" v-if="crm != 0">
                                    <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">
                                        Opciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-sm" style="z-index: 1;position:absolute;">
                                        <li class="dropdown-title">
                                            Selecione una opción
                                        </li>
                                        <li>
                                            <a :href="'/ticketExcelCrm/'+crm">
                                                <i class="fas fa-download">
                                                </i>
                                                Reporte {{crmNombre}}
                                            </a>
                                        </li>
                                       
                                       
                                      
                                    </ul>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12" v-if="selectmotivo== 9">
                <div class="row">
                    <div class="col-12 ">
                        <div class=" mb-0 ">
                            <div class="card-body">
                                <h4 class="barlow semi_bold" style="color: #191919">
                                </h4>
                                <ul class="nav nav-pills">
                                    <div class="col-lg-3">
                                        <li class="nav-item">
                                            <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #2FCBF1;">
                                                <div class="card-icon " style="float: left; background-color:rgb(47, 203, 241);color:white;border-radius: 2px;">
                                                    <i class=" fas fa-columns" style=" color:white;font-size: 25px;">
                                                    </i>
                                                </div>
                                                En espera
                                                <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                    <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load_data == 1">
                                                    </div>
                                                    {{backlog.backlog}}
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="col-lg-3">
                                        <li class="nav-item">
                                            <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #42E8B4;">
                                                <div class="card-icon" style="float: left; background-color:#42E8B4;border-radius: 2px;">
                                                    <i class="fas fa-edit" style=" color:white;font-size: 25px;">
                                                    </i>
                                                </div>
                                                En curso
                                                <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                    <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load_data == 1">
                                                    </div>
                                                    {{backlog.curso}}
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="col-lg-3">
                                        <li class="nav-item">
                                            <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #005cff;">
                                                <div class="card-icon" style="float: left; background-color: #005cff;border-radius: 2px;">
                                                    <i class="fas fa-check" style=" color:white;font-size: 25px;">
                                                    </i>
                                                </div>
                                                Validación
                                                <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                    <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load_data == 1">
                                                    </div>
                                                    {{backlog.validacion}}
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="col-lg-3">
                                        <li class="nav-item">
                                            <a class="nav-link active barlow semi_bold" style="font-size: 21px; text-align: center;background-color: #FD6C98;">
                                                <div class="card-icon" style="float: left; background-color: #FD6C98;border-radius: 2px;">
                                                    <i class="fab fa-font-awesome-alt" style=" color:white;font-size: 25px;">
                                                    </i>
                                                </div>
                                                Finalizadas
                                                <span class="badge badge-white barlow regular" style="float: right; font-size: 20px;border-radius: 4px;">
                                                    <div class="spinner-border text-primary" role="status" style="width: 1.5rem;height: 1.5rem;color: #007bff!important;" v-if="load_data == 1">
                                                    </div>
                                                    {{backlog.finalizada}}
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="selectmotivo== 10">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==1 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                    <div class="card-icon shadow-box-ag azul" v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                        <i class="fas fa-globe-americas" style="font-size: 28px;color: white" v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                        </i>
                    </div>
                    <div class="card-wrap ">
                        <div class="card-header">
                            <h4  v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                TOTAL MI CRM
                            </h4>
                        </div>
                        <div class="card-body animated fadeIn" style="font-size: 35px;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                            {{TotalMiCrm}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="selectmotivo!= 9 && selectmotivo!=10 ">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn " v-bind:style=" modulo==1 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                    <a href="" style="color: #2FCBF1" v-on:click.prevent="ClearAllData">
                        <div class=" card-icon shadow-box-ag azul " style="border-bottom-right-radius: 50% 40%;" v-bind:style=" modulo==1 ? 'background-color: white; ' : '' ">
                            <i class="fas fa-columns" style="font-size: 25px;color: white" v-bind:style=" modulo==1 ? 'color: #6c757d; ' : '' ">
                            </i>
                        </div>
                        <div class="card-wrap ">
                            <div class="card-header">
                                <h4 class="barlow bold" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                    EN ESPERA
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==1 ? 'color: white; ' : '' ">
                                <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                </div>
                                {{backlog.backlog}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="selectmotivo!= 9 && selectmotivo!=10 ">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==2 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                    <a href="" style="color: #2d88ff" v-on:click.prevent="ClearAllData(2)">
                        <div class="card-icon shadow-box-ag verde" style="border-bottom-right-radius: 50% 40%;" v-bind:style=" modulo==2 ? 'background-color: white; ' : '' ">
                            <i class="fa fa-edit" style="font-size: 23px;color: white" v-bind:style=" modulo==2 ? 'color: #6c757d; ' : '' ">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                    EN CURSO
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==2 ? 'color: white; ' : '' ">
                                <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                </div>
                                {{backlog.curso}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="selectmotivo!= 9 && selectmotivo!=10 ">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==3 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                    <a href="" style="color: #005cff" v-on:click.prevent="ClearAllData(3)">
                        <div class="card-icon shadow-box-ag blue" style="border-bottom-right-radius: 50% 40%;" v-bind:style=" modulo==3 ? 'background-color: white; ' : '' ">
                            <i class="fa fa-check" style="font-size: 23px;color: white" v-bind:style=" modulo==3 ? 'color: #6c757d; ' : '' ">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                    VALIDACIÓN
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==3 ? 'color: white; ' : '' ">
                                <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                </div>
                                {{backlog.validacion}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-if="selectmotivo!= 9 && selectmotivo!=10 ">
                <div class="card card-statistic-1 shadow-box-ag boxBounce animated fadeIn" v-bind:style=" modulo==4 ? 'background-color: #005cff; border: 2px solid white;' : '' ">
                    <a href="" style="color: #FD6C98" v-on:click.prevent="ClearAllData(4)">
                        <div class="card-icon shadow-box-ag rosa" style="border-bottom-right-radius: 50% 40%;" v-bind:style=" modulo==4 ? 'background-color: white; ' : '' ">
                            <i class="fab fa-font-awesome-alt" style="font-size: 35px;color: white" v-bind:style=" modulo==4 ? 'color: #6c757d; ' : '' ">
                            </i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 class="barlow bold" v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                    FINALIZADAS
                                </h4>
                            </div>
                            <div class="card-body animated fadeIn barlow semi_bold" style="font-size: 35px;" v-bind:style=" modulo==4 ? 'color: white; ' : '' ">
                                <div class="spinner-border text-primary" role="status" style="width: 2.5rem;height: 2.5rem;color: #007bff!important;" v-if="load_data == 1">
                                </div>
                                {{backlog.finalizada}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;" v-if="screen_width <= 1024">
            <div class="col-lg-12 ">
                <div class="card card-statistic-1 shadow-box-ag animated fadeIn" style="border-radius: 5px;">
                    <div class="col-lg-12 ">
                        <button v-if="rol_id != 34" class="btn btn-info boxBounce barlow semi_bold btn-block" style="border-radius: 5px; font-size:15px;"  @click="ModalCrear">
                            Crear Ticket
                        </button>
                        <button v-if="rol_id == 34" class="btn btn-info boxBounce barlow semi_bold btn-block" style="border-radius: 5px; font-size:15px;"  @click="ModalCrearTicketCnt">
                            Crear Ticket
                        </button>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="ticket-item ">
                            <div class="ticket-title">
                                <h4 class="barlow bold" style="font-size: 16px;">
                                    Nro° Ticket
                                </h4>
                                <input class="form-control" name="codigo" placeholder="" type="" v-model="codigo" v-on:keyup="SearchTicket(modulo)">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="ticket-item ">
                            <div class="ticket-title">
                                <h4 class="barlow bold" style="font-size: 16px;">
                                    Sitio
                                </h4>
                                <input class="form-control" id="inputSitioSearchPop" name="datositio" placeholder="Buscar Sitio" type="text" v-model="datositio" v-on:keyup="BuscarSitioTab" value="">
                                    <div class="row" id="listPopsTab" style="display:none;">
                                        <div class="col-lg-12 col-md-4 col-sm-4 col-10 shadow-box-ag full-height-scroll " style="max-height:120px;overflow-y:auto">
                                            <div v-for="pop in pops">
                                                <a @click.prevent="selectdpopSearch(pop)" href="" id="selectpopvalue" style="color:black">
                                                    {{pop.nem_site}} {{pop.nombre}}
                                                    <hr style="margin-top: -1px;"/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="selectedSitio" style="display:none">
                                        <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                            {{datapopSelec}}
                                            <a @click.prevent="Clearsitio" href="" style="color:white ">
                                                <i class="fas fa-times-circle">
                                                </i>
                                            </a>
                                        </span>
                                    </div>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="ticket-item">
                            <div class="ticket-title">
                                <h4 class="barlow bold" style="font-size: 16px;">
                                    Motivo
                                </h4>
                            </div>
                            <div id="selectMotivo">
                                <select class="form-control select" name="motivo" v-model="motivo" v-on:change="BoxSearch(modulo)">
                                    <option v-bind:value="1">
                                        Vandalismo menor
                                    </option>
                                    <option v-bind:value="7">
                                        Vandalismo mayor
                                    </option>
                                    <option v-bind:value="2">
                                        Falla Mayor
                                    </option>
                                    <option v-bind:value="6">
                                        Falla menor
                                    </option>
                                    <option v-bind:value="3">
                                        Mantenimiento
                                    </option>
                                    <option v-bind:value="4">
                                        Solicitud Stock
                                    </option>
                                    <option v-bind:value="5">
                                        Solicitud de mejora
                                    </option>
                                </select>
                            </div>
                            <div id="selectedMotivoInfo" style="display:none">
                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                    {{SelectMotivo}}
                                    <a @click.prevent="ClearMotivo" href="" style="color:white ">
                                        <i class="fas fa-times-circle">
                                        </i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 " v-if="selectmotivo == 9">
                        <div class="ticket-item ">
                            <div class="ticket-title">
                                <h4 class="barlow bold" style="font-size: 16px;">
                                    Estado
                                </h4>
                            </div>
                            <div id="selectEstado">
                                <select class="form-control select" v-if="selectmotivo == 9" v-model="estadoValue" v-on:change="SearchTicket(modulo)">
                                    <option v-bind:value="8">
                                        Aprobación ing oym
                                    </option>
                                    <option v-bind:value="1">
                                        En espera
                                    </option>
                                    <option v-bind:value="2">
                                        En curso
                                    </option>
                                    <option v-bind:value="3">
                                        Validación
                                    </option>
                                    <option v-bind:value="4">
                                        Finalizada
                                    </option>
                                </select>
                            </div>
                            <div id="selectedEstadoInfo" style="display:none">
                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                    {{SelectEstado}}
                                    <a @click.prevent="ClearEestado" href="" style="color:white ">
                                        <i class="fas fa-times-circle">
                                        </i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;" v-if="screen_width <= 1024">
            <div class="col-lg-12 col-md-6 col-sm-6 col-12" v-for="ticket in tickets.data">
                <div class="card card-statistic-1 shadow-box-ag animated fadeIn" style="border-radius: 5px;">
                    <div class="tickets">
                        <div class="ticket-items" style="width: 100%; ">
                            <div class="ticket-item " style="background-color: white ;border-radius: 5px;">
                                <div class="ticket-title">
                                    <h4 class="barlow bold" style="font-size: 16px;">
                                        Nro° Ticket
                                    </h4>
                                </div>
                                <div class="ticket-desc barlow regular" style="font-size: 15px;margin-top: -5px;">
                                    <router-link :to="{ path:`/showTicket/`+ticket.id, params: {id: ticket.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                        <a :href="href">
                                            {{ticket.id}}
                                        </a>
                                    </router-link>
                                </div>
                                <div class="ticket-title" style="margin-top:8px ">
                                    <h4 class="barlow bold" style="font-size: 16px;">
                                        Sitio
                                    </h4>
                                </div>
                                <div class="ticket-desc barlow regular" style="font-size: 15px;margin-top: -5px;">
                                    {{ticket.site? ticket.site.nem_site : ''}} {{ticket.site ? ticket.site.nombre :''}}
                                </div>
                                <div class="ticket-title" style="margin-top:8px ">
                                    <h4 class="barlow bold" style="font-size: 16px;">
                                        Motivo
                                    </h4>
                                </div>
                                <div class="ticket-desc barlow regular" style="font-size: 15px;margin-top: -5px;">
                                    {{ticket.tipo_motivo? ticket.tipo_motivo.descripcion : ''}} {{ticket.trimestre == 1 ? 'Primera mantención':(ticket.trimestre == 2 ? 'Segunda mantención':(ticket.trimestre == 3 ? 'Tercera mantención':(ticket.trimestre == 4? 'Cuarta mantención':(ticket.trimestre == 5? 'Quinta mantención':''))))}}
                                </div>
                                <div class="ticket-title" style="margin-top:8px ">
                                    <h4 class="barlow bold" style="font-size: 16px;">
                                        Estado
                                    </h4>
                                </div>
                                <div class="ticket-desc barlow regular" style="font-size: 15px;margin-top: -5px;">
                                    {{ticket.estado? ticket.estado.descripcion : ''}}
                                </div>
                                <div class="ticket-title" style="margin-top:8px ">
                                    <h4 class="barlow bold" style="font-size: 16px;">
                                        Opciones
                                    </h4>
                                </div>
                                <div v-if=" ticket.estado_id == 1 ">
                                    <button class="btn btn-success" v-if=" rol_id == 1 || rol_id == 16 || rol_id == 12 ||  rol_id == 5  " v-on:click.prevent="Aprobartck(ticket)">
                                        <i class="fa fa-check">
                                        </i>
                                    </button>
                                    <button class="btn btn-secondary" v-if=" rol_id == 1 || rol_id == 16 || rol_id == 12 ||  rol_id == 5  " v-on:click.prevent="retroceso(ticket,modulo)">
                                        <i class="fas fa-cog">
                                        </i>
                                    </button>
                                </div>
                                <div v-if=" ticket.estado_id == 2 ">
                                    <button class="btn btn-success" v-if="  ticket.mantencion_data==1 && rol_id == 1 || ticket.mantencion_data==1  && rol_id == 16 ||ticket.mantencion_data==1  && rol_id == 12 || ticket.mantencion_data==1  && rol_id == 5 " v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                        <i class="fa fa-check">
                                        </i>
                                    </button>
                                    <button class="btn btn-success" v-if="ticket.tipo_mantencion_id==null && rol_id == 1 || ticket.tipo_mantencion_id==null &&rol_id == 16 || ticket.tipo_mantencion_id==null && rol_id == 12 || ticket.tipo_mantencion_id==null && rol_id == 5 " v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                        <i class="fa fa-check">
                                        </i>
                                    </button>
                                    <button class="btn btn-secondary" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-if="rol_id == 1 || rol_id == 16 || rol_id == 8" v-on:click.prevent="retroceso(ticket,modulo)">
                                        <i class="fas fa-cog">
                                        </i>
                                    </button>
                                </div>
                                <div v-if=" ticket.estado_id == 3 ">
                                    <button class="btn btn-success" v-if="rol_id == 1 || rol_id == 16" v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                        <i class="fa fa-check">
                                        </i>
                                    </button>
                                    <button class="btn btn-secondary" v-if="rol_id == 1 || rol_id == 16 || rol_id == 8" v-on:click.prevent="retroceso(ticket,modulo)">
                                        <i class="fas fa-cog">
                                        </i>
                                    </button>
                                </div>
                                <div v-if=" ticket.estado_id == 4 ">
                                    <button class="btn btn-secondary" v-if="rol_id == 1 || rol_id == 16 || rol_id == 8" v-on:click.prevent="retroceso(ticket,modulo)">
                                        <i class="fas fa-cog">
                                        </i>
                                    </button>
                                </div>
                                <button class="btn btn-success" v-if="ticket.estado_id == 8 && rol_id == 12 || ticket.estado_id == 8 && rol_id == 1 " v-on:click.prevent="Aprobartck3(ticket)">
                                    <i class="fas fa-check">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="pagination" class="pagination" role="navigation">
                <vue-pagination :offset="4" :pagination="tickets" @paginate="SearchTicket(modulo)">
                </vue-pagination>
            </nav>
        </div>
        <div class="row" v-if="screen_width > 1024">
            <div class="col-lg-12 ">
                <div class="ibox float-e-margins">
                    <div class="card shadow-box-ag" v-bind:style="config==2 ? 'background-color: #35363a; ' : '' ">
                        <div class="card-header">
                            <div class="col-lg-11">
                                <h4 class="barlow semi_bold" style="color: #666" v-if="selectmotivo!= 9 &&  selectmotivo!= 10">
                                    {{nombre}} {{NombreCrm}}
                                </h4>
                                <h4 class="barlow semi_bold" style="color: #666" v-if="selectmotivo== 9 || selectmotivo== 10 ">
                                    TICKETS
                                </h4>
                                <div class="dropdown d-inline" v-if="selectmotivo != 11">
                                    <a class="font-weight-600 dropdown-toggle barlow regular" data-toggle="dropdown" href="#" id="orders-month">
                                        Opciones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-sm">
                                        <li class="dropdown-title barlow semi_bold">
                                            Selecione una opcion
                                        </li>
                                        <li>
                                            <a :href="`/TkcfilterExcel?codigo=${this.codigo}&modulo=${this.modulo}&area=${this.area}&sitio=${sitio_tech_search_input}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&motivoSelectIng=${this.selectmotivo}`" class="dropdown-item barlow regular">
                                                <i class="fas fa-download">
                                                </i>
                                                Descargar  Reporte
                                            </a>
                                        </li>
                                        <li>
                                            <a @click.prevent="listLast" class="dropdown-item barlow regular" href="#">
                                                <i class="fas fa-list">
                                                </i>
                                                Últimos tickets creados
                                            </a>
                                        </li>
                                        <li v-if="rol_id == 32">
                                            <a href="/sgcObrasCiviles" class="dropdown-item barlow regular">
                                                <i class="fas fa-download">
                                                </i>
                                                 Reporte SGC
                                            </a>
                                        </li>
                                        <li v-if=" rol_id == 1 ">
                                            <a class="dropdown-item barlow regular" data-toggle="modal" href="#upload_masive_tickets_red_core">
                                                <i class="fas fa-upload">
                                                </i>
                                                Carga masiva
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-1" v-if="modulo==1">
                                <button  v-if="rol_id != 34" class="btn btn-info boxBounce barlow semi_bold" style="border-radius: 5px; font-size:15px;" v-on:click.prevent="ModalCrear">
                                    Crear Ticket
                                </button>
                                <button v-if="rol_id == 34" class="btn btn-info boxBounce barlow semi_bold btn-block" style="border-radius: 5px; font-size:15px;"  @click="ModalCrearTicketCnt">
                                    Crear Ticket
                                </button>
                            </div>
                        </div>
                        <div class="ibox">
                            <div class=" table-responsive project-list project-table">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                #
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Área
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Sitio/Tecnología
                                            </th>
                                            <th v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Crm
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Categoría
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Motivo
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Fecha Inicio
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Fecha Termino
                                            </th>
                                            <th class=" barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Descripción
                                            </th>
                                            <th class="centrado barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Estado / SLA
                                            </th>
                                            <th class="barlow bold" v-bind:style="config==2 ? 'color: white; ' : '' ">
                                                Opciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th>
                                            <input class="form-control" name="codigo" placeholder="" style="width:80px; " type="" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="codigo" v-on:keyup="SearchTicket(modulo)">
                                            </input>
                                        </th>
                                        <th>
                                            <div id="divSelecArea">
                                                <select class="form-control select" name="area" style="width:80px;" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="area" v-on:change="BoxSearch(modulo)">
                                                    <option v-bind:value="1">
                                                        Energia
                                                    </option>
                                                    <option v-bind:value="2">
                                                        Clima
                                                    </option>
                                                    <option v-bind:value="3">
                                                        Obras Civiles
                                                    </option>
                                                    <option v-bind:value="4">
                                                        Medio Ambiente
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="selectedAreaDivInfo" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                    {{SelectAreaName}}
                                                    <a @click.prevent="clearArea" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <input class="form-control" placeholder="Buscar Sitio o Tecnología" type="text" v-model="sitio_tech_search_input" v-on:keyup="busqueda_ticket_sitio_tecno()" value="">
                                            </input>
                                        </th>
                                        <th>
                                            <div id="crmSelect">
                                                <select class="form-control select" style="width:80px;" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="crmId" v-on:change="BoxSearch(modulo)">
                                                    <option v-bind:value="1">
                                                        Norte
                                                    </option>
                                                    <option v-bind:value="2">
                                                        Centro Norte
                                                    </option>
                                                    <option v-bind:value="3">
                                                        Metropolitano
                                                    </option>
                                                    <option v-bind:value="4">
                                                        Centro Sur
                                                    </option>
                                                    <option v-bind:value="5">
                                                        Sur
                                                    </option>
                                                    <option v-bind:value="6">
                                                        Austral
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="selectedCrm" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white; font-size:10px;margin-left:-25px;border-radius:3px;">
                                                    {{crmName}}
                                                    <a @click.prevent="clearCrm" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <div id="selectCategoria">
                                                <select class="form-control select" name="categoria" style="width:50px;" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="categoria" v-on:change="BoxSearch(modulo)">
                                                    <option v-bind:value="1">
                                                        A
                                                    </option>
                                                    <option v-bind:value="2">
                                                        B
                                                    </option>
                                                    <option v-bind:value="3">
                                                        C
                                                    </option>
                                                    <option v-bind:value="4">
                                                        D
                                                    </option>
                                                    <option v-bind:value="5">
                                                        E
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="selectedCateInfo" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                    {{SelectCategoryLeter}}
                                                    <a @click.prevent="ClearCate" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <div id="selectMotivo">
                                                <select class="form-control select" name="motivo" style="width:60px;" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="motivo" v-on:change="BoxSearch(modulo)">
                                                    <option v-for="tipo_motivo in tipo_motivos" :value="tipo_motivo.id">
                                                       {{tipo_motivo.nombre}}
                                                    </option>
                                                   
                                                   
                                                   
                                                </select>
                                            </div>
                                            <div id="selectedMotivoInfo" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;" v-for="motivo_name in SelectMotivo">
                                                    {{motivo_name.nombre}}
                                                    <a @click.prevent="ClearMotivo" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <div id="InputFecha1">
                                                <input class="form-control" name="fecha1" style="width:80px" type="date" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="fecha1" v-on:change="BoxSearch(modulo)">
                                                </input>
                                            </div>
                                            <div id="selectedFecha1" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                    {{formato(fecha1)}}
                                                    <a @click.prevent="ClearFecha1" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <div id="InputFecha2">
                                                <input class="form-control" name="fecha2" style="width:80px" type="date" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="fecha2" v-on:change="BoxSearch(modulo)">
                                                </input>
                                            </div>
                                            <div id="selectedFecha2" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                    {{formato(fecha2)}}
                                                    <a @click.prevent="ClearFecha2" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <input class="form-control" name="descripcion" style="width:150px;" type="text" v-bind:style="config==2 ? 'background-color: #85888b;border:1px solid #85888b;color:white; ' : '' " v-model="searchDescripcion" v-on:keyup="SearchTicket(modulo)">
                                            </input>
                                        </th>
                                        <th>
                                            <div id="selectEstado">
                                                <select class="form-control select" v-if="selectmotivo == 9" v-model="estadoValue" v-on:change="SearchTicket(modulo)">
                                                    <option v-bind:value="8">
                                                        Aprobación ing oym
                                                    </option>
                                                    <option v-bind:value="1">
                                                        En espera
                                                    </option>
                                                    <option v-bind:value="2">
                                                        En curso
                                                    </option>
                                                    <option v-bind:value="3">
                                                        Validación
                                                    </option>
                                                    <option v-bind:value="4">
                                                        Finalizada
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="selectedEstadoInfo" style="display:none">
                                                <span class="badge " style="background-color:#015dff;color:white;border-radius:3px;">
                                                    {{SelectEstado}}
                                                    <a @click.prevent="ClearEestado" href="" style="color:white ">
                                                        <i class="fas fa-times-circle">
                                                        </i>
                                                    </a>
                                                </span>
                                            </div>
                                        </th>
                                        <th>
                                            <button class="btn btn-info" data-target="#modal_filters" data-toggle="modal" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' ">
                                                <i class="fas fa-filter">
                                                </i>
                                            </button>
                                        </th>
                                        <tr class="animated fadeIn" style="height: 150px; " v-for="ticket in tickets.data">
                                            <td class="">
                                                <router-link :to="{ path:`/showTicket/`+ticket.id, params: {id: ticket.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                    <a :href="href" target="_blank">
                                                        <span class="badge badge-info boxBounce barlow regular" style="font-size:15px;border-radius:5px;" v-bind:style="config==2 ? 'color:white;background-color: #2d87fe ' : '' " v-text="ticket.id">
                                                        </span>
                                                    </a>
                                                </router-link>
                                                <div style="margin-top:10px" v-if="ticket.pep_available">
                                                    <span class="badge blue blanco" style="border-radius:5px;" v-text="ticket.pep_available ?  ticket.pep_available.pep:'' ">
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="centrado">
                                                <div class="barlow semi_bold" style="font-size:13.5" v-if="ticket.area_id != null">
                                                    <span :class="ticket.area_id == 2 ? 'badge-info' :(ticket.area_id == 3 ? 'badge-warning':(ticket.area_id == 4? 'badge-success':'')) " :style="ticket.area_id == 1 ? 'background-color: #005cff;color: white;':''" class="badge">
                                                        {{ticket.area.descripcion}}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="" style="font-size: 13.5px;">
                                                <div v-if="ticket.site">
                                                    <div class="barlow semi_bold">
                                                        {{ticket.site ? ticket.site.nem_site :''}} {{ticket.technologie ? "-"+" "+ ticket.technologie.nem_tech :''}}
                                                    </div>
                                                    <div class="barlow semi_bold">
                                                        {{ticket.site ? ticket.site.nombre :''}}
                                                    </div>
                                                    <div class="barlow regular" v-if="ticket.site.site_type_id==1">
                                                        <span class="badge" style="background-color: #42e8b4;color: white" v-bind:style="config==2 ? 'color:white;background-color: #16af7f ' : '' ">
                                                            FIJO
                                                        </span>
                                                    </div>
                                                    <div class="barlow regular" v-if="ticket.site.site_type_id==2">
                                                        <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                            MOVIL
                                                        </span>
                                                    </div>
                                                    <div class="barlow regular" v-if="ticket.site.site_type_id==3">
                                                        <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                            SWITCH
                                                        </span>
                                                    </div>
                                                    <div class="barlow regular" v-if="ticket.site.site_type_id==4">
                                                        <span class="badge" style="background-color: #005cff;color: white; font-size: ">
                                                            PHONE
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div v-if="ticket.site">
                                                    <p class="barlow semi_bold" style="font-size:13.5px;">
                                                        {{ticket.site.pop.comuna.zona.crm ? ticket.site.pop.comuna.zona.crm.nombre_crm :''}}
                                                    </p>
                                                    <div class="barlow regular">
                                                        {{ticket.site.pop.comuna.zona.cod_zona}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="centrado">
                                                <div v-if="ticket.site">
                                                    <div class="barlow semi_bold" style="font-size:13.5" v-if="ticket.site.classification_type_id != null">
                                                        <span class="badge " style="background-color:#43e8b4;color: white " v-bind:style="config==2 ? 'color:white;background-color: #16af7f ' : '' " v-if="ticket.clasificacion_id == 1 ">
                                                            A
                                                        </span>
                                                        <span class="badge " style="background-color:#005cff;color: white " v-if="ticket.clasificacion_id == 2 ">
                                                            B
                                                        </span>
                                                        <span class="badge badge-warning" v-if="ticket.clasificacion_id == 3 ">
                                                            C
                                                        </span>
                                                        <span class="badge " style="background-color:#6c757d;color: white " v-if="ticket.clasificacion_id == 4 ">
                                                            D
                                                        </span>
                                                        <span class="badge " style="background-color:#6c757d;color: white " v-if="ticket.clasificacion_id == 5 ">
                                                            E
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="centrado barlow semi_bold">
                                                <div v-if="ticket.tipo_motivo_id != null">
                                                    <div>
                                                        {{ticket.tipo_motivo ? ticket.tipo_motivo .descripcion : ''}}  {{ticket.tipo_mantencion ? ticket.tipo_mantencion.descripcion :''}}
                                                    </div>
                                                </div>
                                                <div v-if="ticket.trimestre == 1">
                                                    <span class="badge badge-success" v-bind:style="config==2 ? 'color:white; ' : '' ">
                                                        Primera mantención
                                                    </span>
                                                </div>
                                                <div v-if="ticket.trimestre == 2">
                                                    <span class="badge badge-info" v-bind:style="config==2 ? 'color:white; ' : '' ">
                                                        Segunda mantención
                                                    </span>
                                                </div>
                                                <div v-if="ticket.trimestre == 3">
                                                    <span class="badge badge-warning">
                                                        Tercera mantención
                                                    </span>
                                                </div>
                                                <div v-if="ticket.trimestre == 4">
                                                    <span class="badge badge-primary">
                                                        Cuarta mantención
                                                    </span>
                                                </div>
                                                <div v-if="ticket.trimestre == 5">
                                                    <span class="badge badge-secondary">
                                                        Quinta mantención
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="centrado barlow regular">
                                                <div v-bind:style="config==2 ? 'color:white; ' : '' " v-if="ticket.created_at != null">
                                                    {{formato(ticket.created_at)}}
                                                    <div v-if="rol_id== 1 || rol_id==16 ">
                                                        <a @click.prevent="OpenModalUpdateDate1(ticket,1)" href="">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="centrado barlow regular">
                                                <div v-bind:style="config==2 ? 'color:white; ' : '' " v-if="ticket.fecha_compromiso != null">
                                                    {{formato(ticket.fecha_compromiso)}}
                                                    <div v-if="rol_id== 1 || rol_id==16">
                                                        <a @click.prevent="OpenModalUpdateDate1(ticket,2)" href="">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="barlow regular">
                                                <div style="width:200px;" v-bind:style="config==2 ? 'color:white; ' : '' ">
                                                    {{ticket.descripcion}}
                                                </div>
                                            </td>
                                            <td>
                                                <span :style="'color:white;'+'background-color:#2fcbf1;'+'font-size:12px;'+'background-color:'+ticket.estado.color+';'" class="badge barlow semi_bold">
                                                    {{ticket.estado.descripcion}}
                                                </span>
                                                <div class="badge barlow semi_bold" style="margin-top:5px;" v-if="ticket.denuncia_id == 1">
                                                    <span class="badge " style="background-color:#ed5666;color:white">
                                                        SIN DENUNCIAR
                                                    </span>
                                                </div>
                                                <div class="badge barlow semi_bold" style="margin-top:5px;" v-if="ticket.denuncia_id == 2">
                                                    <span class="badge badge-success">
                                                        DENUNCIADO
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div v-if="ticket.estado_id == 1">
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 12 ||  rol_id == 5 ">
                                                        <button class="btn btn-success" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="Aprobartck(ticket)">
                                                            <i class="fa fa-check">
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <div style="margin-top: 4px;">
                                                    </div>
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 8  ">
                                                        <button class="btn btn-secondary" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="retroceso(ticket,modulo)">
                                                            <i class="fas fa-cog">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ticket.estado_id == 2 ">
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 12 || rol_id == 5 ">
                                                        <div v-if="  ticket.tipo_mantencion_id==1">
                                                            <button class="btn btn-success" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-if="ticket.mantencion_data == 1" v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                                                <i class="fa fa-check">
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 12 || rol_id == 5 ">
                                                        <div v-if="  ticket.tipo_mantencion_id==null ||  ticket.tipo_mantencion_id !=1 ">
                                                            <button class="btn btn-success" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                                                <i class="fa fa-check">
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div style="margin-top: 4px;">
                                                    </div>
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 8">
                                                        <button class="btn btn-secondary" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="retroceso(ticket,modulo)">
                                                            <i class="fas fa-cog">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if=" ticket.estado_id == 3">
                                                    <div v-if="rol_id == 1 || rol_id == 16">
                                                        <button class="btn btn-success" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="Aprobartck2(ticket,modulo)">
                                                            <i class="fa fa-check">
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <div style="margin-top: 4px;">
                                                    </div>
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 8">
                                                        <button class="btn btn-secondary" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="retroceso(ticket,modulo)">
                                                            <i class="fas fa-cog">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ticket.estado_id == 4">
                                                    <div v-if="rol_id == 1 || rol_id == 16  || rol_id == 8">
                                                        <button class="btn btn-secondary" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="retroceso(ticket,modulo)">
                                                            <i class="fas fa-cog">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 4px;">
                                                </div>
                                                <div v-if="ticket.estado_id == 1">
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 12 || rol_id == 5 ">
                                                        <button class="btn btn-danger" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="ModalRechazo(ticket)">
                                                            <i class="fas fa-times-circle">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ticket.estado_id == 2">
                                                    <div v-if="rol_id == 1 || rol_id == 16 || rol_id == 12 || rol_id == 5">
                                                        <button class="btn btn-danger" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="ModalRechazo(ticket)">
                                                            <i class="fas fa-times-circle">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ticket.estado_id == 3">
                                                    <div v-if="rol_id == 1 || rol_id == 16">
                                                        <button class="btn btn-danger" v-bind:style="config==2 ? 'box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.1);' : '' " v-on:click.prevent="ModalRechazo(ticket)">
                                                            <i class="fas fa-times-circle">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div v-if="ticket.estado_id == 8">
                                                    <div v-if="rol_id == 12 || rol_id == 1">
                                                        <button class="btn btn-success" v-on:click.prevent="Aprobartck3(ticket)">
                                                            <i class="fas fa-check">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div style="margin-top:5px" v-if="ticket.pep_new_checked == 1">
                                                    <div v-if="rol_id == 12 || rol_id == 1">
                                                        <button class="btn btn-secondary" v-on:click.prevent="see_pep(ticket)">
                                                            <i class="fas fa-eye blanco">
                                                            </i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 col-md-12 col-sm-12" v-if="vacio == 1">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="empty-state-icon" style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                                    <i class="fas fa-question">
                                                    </i>
                                                </div>
                                                <h2>
                                                    No se ha encontrado ningún ticket en la busqueda.
                                                </h2>
                                                <p class="lead">
                                                    Verifique los datos de busqueda o el estado de este.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-sm-12" v-if="load_data == 1">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="d-flex justify-content-center" v-if="load_data == 1">
                                                    <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                        <span class="sr-only" style="color: #191919">
                                                            Cargando...
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="pagination" class="pagination" role="navigation">
                                    <vue-pagination :offset="4" :pagination="tickets" @paginate="SearchTicket(modulo)">
                                    </vue-pagination>
                                </nav>
                                <div class="card-footer text-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div aria-hidden="true" class="modal inmodal" id="listaLastTickets" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: #999999;text-align: center;">
                            Ultimos tickets Creados
                        </h4>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12" v-for="ListTickets in ListTicket.data">
                                <a :href="'/Tkc/'+ListTickets.id" target="blank__">
                                    <span class="badge badge-info boxBounce" style="">
                                        {{ListTickets.id}}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-white" data-dismiss="modal" type="button">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <form @submit.prevent="UploadExcelTickets">
            <div aria-hidden="true" class="modal inmodal" id="upload_masive_tickets_red_core" role="dialog" tabindex="-1">
                <div class="modal-dialog ">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 70px;">
                            <h5 class="modal-title" style="color: white">
                                Carga masiva de tickets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Seleccione o arraste el archivo
                                </p>
                                <input @change="uploadFileTicketsMasive" class="form-control" name="myfile" type="file">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" style="background-color: #007bff99;color: white" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <formulario :rol="rol_id">
        </formulario>
        <FormCnt :rol="rol_id"></FormCnt>
        <form method="PUT" v-on:submit.prevent="AprobarTicket(datosTicket.id)">
            <div aria-hidden="true" class="modal inmodal" id="fecha" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 80px;">
                            <h5 class="modal-title" style="color:white">
                                Ingreso de fecha de termino
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color:white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Ingrese Fecha de termino
                                </p>
                                <input class="form-control " id="fechaInput" name="fechaCompromiso" required="" style="color:#999999" type="date" v-model="datosTicket.fechaCompromiso">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" style="color:white" type="submit">
                                Aprobar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="PUT" v-on:submit.prevent="UpdateFechaCreacion(IdUpdateFecha)">
            <div aria-hidden="true" class="modal inmodal" id="fecha1Update" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999">
                                Actualizar Fecha
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Ingrese La nueva fecha
                                </p>
                                <input class="form-control " id="fechaInput" name="fecha1Update" required="" style="color:#999999" type="date" v-model="fecha1Update">
                                </input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="PUT" v-on:submit.prevent="RechazarTicket(datosLog.id,modulo)">
            <div aria-hidden="true" class="modal inmodal" id="rechazo" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 80px;">
                            <h5 class="modal-title" style="color: white">
                                Rechazo de ticket
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Motivo Rechazo
                                </p>
                                <textarea class="form-control " id="desc" name="descripcion" required="" style="color:#999999 ; height: 200px;" type="text-area" v-model="datosLog.descripcion">
                                </textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" style="color: white" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form>
            <div aria-hidden="true" class="modal inmodal" id="modal_filters" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header" style="background: -webkit-linear-gradient(rgb(0, 92, 255), #007bff99); height: 80px;">
                            <h5 class="modal-title" style="color: white">
                                Filtros tickets
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true" style="color: white">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                    <div class="form-inline">
                                        <p style="">
                                            <strong>
                                                PEPS RECIENTES
                                            </strong>
                                        </p>
                                        <div style="margin-top:-8px; ">
                                            <input style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="pep_av" v-on:change="setvalue_pep_search"/>
                                        </div>
                                        <p style="margin-left: 40px;">
                                            <strong>
                                                MANTENCIÓN RED CORE 2020
                                            </strong>
                                        </p>
                                        <div style="margin-top:-8px; ">
                                            <input style="margin-left: 6px;width: 20px;height: 20px;" type="checkbox" v-model="man_red_core_2020_check" v-on:change="setvalue_r_c_2020">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-info" style="color: white" type="submit">
                                Limpiar filtros
                            </button>
                            <button class="btn btn-success" style="color: white" type="submit">
                                Aplicar filtros
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="PUT" v-on:submit.prevent="RedirectionTicket()">
            <div aria-hidden="true" class="modal inmodal" id="NuevoRumbo" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <h4 class="modal-title" style="color: #999999">
                                Seleccione el estado
                            </h4>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group" id="textInpu">
                                <p style="color: #999999">
                                    Estados
                                </p>
                                <select class="form-control" v-model="nuevoEstado">
                                    <option v-bind:value="1" v-if="modulo == 2 || modulo==3 || modulo == 4">
                                        EN ESPERA
                                    </option>
                                    <option v-bind:value="2" v-if="modulo == 1 || modulo==3 || modulo == 4">
                                        EN CURSO
                                    </option>
                                    <option v-bind:value="3" v-if="modulo == 2 || modulo==1 || modulo == 4">
                                        VALIDACIÓN
                                    </option>
                                    <option v-bind:value="4" v-if="modulo == 2 || modulo==3 || modulo == 1">
                                        FINALIZADA
                                    </option>
                                    <option v-bind:value="7">
                                        ELIMINADA
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">
                                Aceptar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';

   
    import Formulario from './ticket/formulario.vue';
    import EventBus from "./event-bus";
    import VuePagination from './VuePagination.vue';

    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
    // Init plugin
    Vue.use(Loading);

    export default {
        props: [ 'config','selectmotivo','crm_select','rol_id' ],
        components: {
            'vue-pagination': VuePagination,
            
            'formulario': Formulario,
             FormCnt: () => import(/* webpackChunkName: "chunks/ticket/FormCnt"*/'./ticket/FormCnt'),

        },
        data() {
            return { 

                tickets: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                crmId: '',
                fecha1Update: '',
                newIdea: '',
                backlog: '',
                curso: '',
                nombre: '',
                SelectFecha1: '',
                validacion: '',
                finalizada: '',
                sitio: '',
                motivos: [],
                areas: [],
                fullPage: false,
                opcion: '',
                codigo: '',
                area: '',
                crm: this.crm_select,
                NombreCrm: '',
                crmNombre: '',
                nuevoEstado: '',
                IdUpdateFecha: '',
                modulo: '',
                datosTicket: {
                    'id': '',
                    'fechaCompromiso': ''
                },
                datos: {
                    'codigo': ''
                },
                datosLog: {
                    'id': '',
                    'descripcion': ''
                },
                categoria: '',
                motivo: '',
                fecha1: '',
                fecha2: '',
                searchDescripcion: '',
                
                UserId: '',
                TipoFecha: '',
                OldIdTicket: '',
                SelectAreaName: '',
                SelectCategoryLeter: '',
                SelectMotivo: '',
                user: '',
                SelectCrm: '',
                crmName: '',
                zona: '',
                ListTicket:[],
                NombreModuloMotivo:'',
                load_data:1,
                vacio:'',
                TotalTicektsUser:'',
                TotalMiCrm:'',
                estadoValue:'',
                SelectEstado:'',
                pops:[],
                datapopSelec:'',
                datositio:'',
                fechaActual:'',
                files_masive:'',
                screen_width:0,
                sitio_tech_search_input:'',
                pep_av:'',
                pep_val:0,
                man_red_core_2020_check:'',
                man_red_core_2020_val:0,
                espera:0,
                tipo_motivos: [
                    { id: 12, nombre: 'Ticket exprés' },
                    { id: 1, nombre: 'Vandalismo menor' },
                    { id: 7, nombre: 'Vandalismo mayor' },
                    { id: 2, nombre: 'Falla Mayor' },
                    { id: 6, nombre: 'Falla menor' },
                    { id: 3, nombre: 'Mantenimiento' },
                    { id: 9, nombre: 'Degradación' },
                    { id: 4, nombre: 'Solicitud Stock' },
                    { id: 5, nombre: 'Solicitud de mejora' },
                    { id: 10, nombre: 'Gastos Reembolsables' },
                    { id: 11, nombre: 'Recurrente anual' },
                    { id: 8, nombre: 'Gestión de residuo' }]

            }
        },
        mounted: function() {
            this.screen_width = screen.width
            setInterval(() => this.screen_width = screen.width, 1 * 400)
            this.getBacklog();
            this.SearchTicket();
        
         /* Agrega mounted y con el siguiente contenido */
            let self = this;
            EventBus.$on('ticket.created', function() {
                self.getTickets(); // ejecutas el metodo que desees
            });
            EventBus.$on('GetTotalTicekts.getBacklog', function() {
                self.getBacklog(); // ejecutas el metodo que desees
            });
            EventBus.$on('ticket.sendMail', function(ticket_id) {
                self.sendMail(ticket_id); // ejecutas el metodo que desees
            });
          
            
          

         


        },
         filters: {
         uppercase: function(v) {
         return v.toUpperCase();
         }
        },


methods: {
    getBacklog: function() {
       
        this.UserId = document.getElementById('userid').value;
        
        if(this.crm_select == 0){
            if(this.selectmotivo != 10){
             axios.get(`/totalBacklog?&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&motivoSelectIng=${this.selectmotivo}&estado=${this.estadoValue}&pep_val=${this.pep_val}&m_rc_2020=${this.man_red_core_2020_val}`).then((response) => {
                    this.backlog = response.data
                }).finally(() => this.load_data = 2);
            }else{
               if(this.selectmotivo == 10){
                 axios.get(`/TotalTicketsCrm?&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&motivoSelectIng=${this.selectmotivo}&estado=${this.estadoValue}&pep_val=${this.pep_val}&m_rc_2020=${this.man_red_core_2020_val}`).then((response) => {
                        this.TotalMiCrm = response.data
                    }).finally(() => this.load_data = 2);
               }
            }
        }
        if(this.crm_select != 0){
              
            axios.get('/totalBacklogCrm/'+this.crm_select).then((response)=>{
                this.backlog = response.data
            }).finally(() => this.load_data = 2)
           
           
          
        }
         
        
        
       
    },
    SearchTicket: function(id) {

        this.fechaActual = moment();
       
        let state = ''
        if (id == 2) {
            state = 2
            this.modulo = 2
            this.nombre = ' TICKETS EN CURSO';
            
        } else {
            if (id == 3) {
                state = 3
                this.modulo = 3
                this.nombre = 'TICKETS VALIDACIÓN';
              
            } else {
                if (id == 4) {
                    state = 4
                    this.modulo = 4
                    this.nombre = ' TICKETS FINALIZADOS'
                 
                } else {
                    state = 1;
                    this.nombre = 'TICKETS EN ESPERA';
                    this.modulo = 1
                }
            }
        }

         axios.get(`/tikectList?page=${this.tickets.current_page}&state=${state}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio_tech_search_input}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crmId}&user=${this.user}&crmSelect=${this.crm}&zona=${this.zona}&motivoSelectIng=${this.selectmotivo}&estado=${this.estadoValue}&pep_val=${this.pep_val}&m_rc_2020=${this.man_red_core_2020_val}`).then((response) => {
            this.tickets = response.data;
            if (this.tickets.data.length == 0) {
                this.vacio = 1;
            } else {
                this.vacio = '';
            }
           
            this.getBacklog()
            
        })
        
        if (this.crm == 1) {
            this.NombreCrm = 'CRM NORTE';
            this.crmNombre = 'Crm Norte';
        }
        if (this.crm == 2) {
            this.NombreCrm = 'CRM CENTRO NORTE';
            this.crmNombre = 'Crm Centro Norte';
        }
        if (this.crm == 3) {
            this.NombreCrm = 'CRM METROPOLITANO';
            this.crmNombre = 'Crm Metropolitano';
        }
        if (this.crm == 4) {
            this.NombreCrm = 'CRM CENTRO SUR';
            this.crmNombre = 'Crm Centro Sur';
        }
        if (this.crm == 5) {
            this.NombreCrm = 'CRM SUR';
            this.crmNombre = 'Crm Sur';
        }
        if (this.crm == 6) {
            this.NombreCrm = 'CRM AUSTRAL';
            this.crmNombre = 'Crm Austral';
        }
        if (this.selectmotivo != 0) {
         
            if (this.selectmotivo == 7) {
                this.NombreModuloMotivo = 'mantención red core 2020'
            } else {
                if (this.selectmotivo == 8) {
                    this.NombreModuloMotivo = 'en operación'
                } else {
                    if (this.selectmotivo == 9) {
                        this.NombreModuloMotivo = 'totales'
                    } else {
                        if (this.selectmotivo == 11) {
                            this.NombreModuloMotivo = 'en Gestión de residuos'
                        }else{
                            if(this.selectmotivo == 12){
                                  this.NombreModuloMotivo = 'mantención red core 2021'
                            }
                        }
                    }
                }
            }
        } else {
            this.NombreModuloMotivo = ''
        }
        
      
    },

    BoxSearch:function(modulo){
        if (this.area != '') {
            var selectArea = document.getElementById('divSelecArea');
            selectArea.style.display = 'none';
            var selectedArea = document.getElementById('selectedAreaDivInfo');
            selectedArea.style.display = '';
            this.setNameArea();
            this.SearchTicket(modulo)
            this.loadFunction()
        }
        if (this.categoria != '') {
            var selectCategoria = document.getElementById('selectCategoria');
            selectCategoria.style.display = 'none';
            var selectCategoriaInfo = document.getElementById('selectedCateInfo');
            selectCategoriaInfo.style.display = '';
            this.setLeterCategory();
             this.SearchTicket(modulo)
               this.loadFunction()
        }
        if (this.motivo != '') {
            var selectMotivo = document.getElementById('selectMotivo');
            selectMotivo.style.display = 'none';
            var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
            selectedMotivoInfo.style.display = '';
            this.selectedMotivoInfoSet();
            this.SearchTicket(modulo)
               this.loadFunction()
        }
        if (this.fecha1 != '') {
            var selectfecha1 = document.getElementById('InputFecha1');
            selectfecha1.style.display = 'none';
            var selectedFecha1 = document.getElementById('selectedFecha1');
            selectedFecha1.style.display = '';
             this.SearchTicket(modulo)
               this.loadFunction()
        }
        if (this.fecha2 != '') {
            var selectfecha2 = document.getElementById('InputFecha2');
            selectfecha2.style.display = 'none';
            var selectedFecha2 = document.getElementById('selectedFecha2');
            selectedFecha2.style.display = '';
             this.SearchTicket(modulo)
               this.loadFunction()
        }
        if (this.crmId != '') {
            var crmSelect = document.getElementById('crmSelect');
            crmSelect.style.display = 'none';
            var selectedCrm = document.getElementById('selectedCrm');
            selectedCrm.style.display = '';
            this.selectedCrmSet();
             this.SearchTicket(modulo)
               this.loadFunction()
        }
        if (this.estadoValue != '') {
            var selectEstado = document.getElementById('selectEstado');
            selectEstado.style.display = 'none';
            var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
            selectedEstadoInfo.style.display = '';
            this.setEestado();
            this.SearchTicket(modulo)
            this.loadFunction()
        }
    },
    
    listLast: function() {
        $('#listaLastTickets').modal('show');
        axios.get('/LastTicketsCreated').then((response) => {
            this.ListTicket = response.data;
        })
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
        }, 300)
    },
    UploadExcelTickets:function(){
         $('#upload_masive_tickets_red_core').modal('hide');
        let formData = new FormData();
       
        formData.append('file_masive', this.files_masive);
        
        axios.post('/UploadTickets',  
            formData,
            {
                headers: {
                        'Content-Type': 'multipart/form-data'
                },

            } 

            ).then((response)=>{
           

            this.loadFunction();
            Swal.fire({
               type: 'success',
               title: 'Tickets creados',
               text: 'Su carga masiva fue todo un exito',
              
                })
            this.SearchTicket();
            this.files_masive = ''
        })
    },
    uploadFileTicketsMasive:function(event){
        this.files_masive = event.target.files[0];
        
        /*
          Adds the uploaded file to the files array
        */
        
    },
    BuscarSitioTab: function() {
        if (this.datositio.length >= 3) {
            var url = '/GetPop'
            var box = document.getElementById('listPopsTab');
            box.style.display = '';
            axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                this.pops = response.data
            });
        } else {
            this.pops = '';
            var box = document.getElementById('listPopsTab');
            box.style.display = 'none';
        }
    },
    selectdpopSearch: function(pop) {
        this.sitio = pop.id;
        this.datapopSelec = pop.nem_site + ' ' + pop.nombre
        document.getElementById('listPopsTab').style.display = 'none';
        document.getElementById('inputSitioSearchPop').style.display = 'none';
        document.getElementById('selectedSitio').style.display = 'block';
        this.SearchTicket();
         this.loadFunction()
    },
    Clearsitio: function() {
        this.sitio = '';
        this.datapopSelec = ''
        document.getElementById('inputSitioSearchPop').style.display = 'block';
        document.getElementById('listPopsTab').style.display = 'none';
        document.getElementById('popSearch').style.display = 'block';
        document.getElementById('selectedSitio').style.display = 'none';
        this.datositio = ''
        this.SearchTicket();
          this.loadFunction()
    },
    ClearMotivo: function() {
        this.motivo = '';
        var selectMotivo = document.getElementById('selectMotivo');
        selectMotivo.style.display = '';
        var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
        selectedMotivoInfo.style.display = 'none';
        this.SearchTicket(this.modulo);
          this.loadFunction()
    },
    ClearFecha1: function() {
        this.fecha1 = '';
        var selectfecha1 = document.getElementById('InputFecha1');
        selectfecha1.style.display = '';
        var selectedFecha1 = document.getElementById('selectedFecha1');
        selectedFecha1.style.display = 'none';
        this.SearchTicket(this.modulo);
          this.loadFunction()
    },
    ClearFecha2: function() {
        this.fecha2 = '';
        var selectfecha2 = document.getElementById('InputFecha2');
        selectfecha2.style.display = '';
        var selectedFecha2 = document.getElementById('selectedFecha2');
        selectedFecha2.style.display = 'none';
        this.SearchTicket(this.modulo);
          this.loadFunction()
    },
    clearCrm: function() {
        if (this.crmId != '') {
            this.crmId = '';
            var crmSelect = document.getElementById('crmSelect');
            crmSelect.style.display = '';
        }
        var selectedCrm = document.getElementById('selectedCrm');
        selectedCrm.style.display = 'none';
        this.SearchTicket(this.modulo);
        this.loadFunction()
    },
    clearCrm2: function() {
        if (this.crmId != '') {
            this.crmId = '';
            var crmSelect = document.getElementById('crmSelect');
            crmSelect.style.display = '';
        }
        var selectedCrm = document.getElementById('selectedCrm');
        selectedCrm.style.display = 'none';
        this.SearchTicket(this.modulo);
     
    },
    ClearMotivo2: function() {
        this.motivo = '';
        var selectMotivo = document.getElementById('selectMotivo');
        selectMotivo.style.display = '';
        var selectedMotivoInfo = document.getElementById('selectedMotivoInfo');
        selectedMotivoInfo.style.display = 'none';
    },
    clearArea: function() {
        this.area = '';
        var selectArea = document.getElementById('divSelecArea');
        selectArea.style.display = '';
        var selectedArea = document.getElementById('selectedAreaDivInfo');
        selectedArea.style.display = 'none';
        this.SearchTicket(this.modulo);
        this.loadFunction()
    },
    clearArea2: function() {
        this.area = '';
        var selectArea = document.getElementById('divSelecArea');
        selectArea.style.display = '';
        var selectedArea = document.getElementById('selectedAreaDivInfo');
        selectedArea.style.display = 'none';
    },
    ClearCate: function() {
        this.categoria = '';
        var selectCategoria = document.getElementById('selectCategoria');
        selectCategoria.style.display = '';
        var selectCategoriaInfo = document.getElementById('selectedCateInfo');
        selectCategoriaInfo.style.display = 'none';
        this.SearchTicket(this.modulo);
          this.loadFunction()
    },
    ClearCate2: function() {
        this.categoria = '';
        var selectCategoria = document.getElementById('selectCategoria');
        selectCategoria.style.display = '';
        var selectCategoriaInfo = document.getElementById('selectedCateInfo');
        selectCategoriaInfo.style.display = 'none';
    },
    selectedMotivoInfoSet: function() {

        this.SelectMotivo = this.tipo_motivos.filter((obj => obj.id == this.motivo));
     
    },
    selectedCrmSet: function() {
        if (this.crmId == 1) {
            this.crmName = 'NORTE'
        }
        if (this.crmId == 2) {
            this.crmName = 'CENTRO NORTE'
        }
        if (this.crmId == 3) {
            this.crmName = 'METROPOLITANO'
        }
        if (this.crmId == 4) {
            this.crmName = 'CENTRO SUR'
        }
        if (this.crmId == 5) {
            this.crmName = 'SUR'
        }
        if (this.crmId == 6) {
            this.crmName = 'AUSTRAL'
        }
    },
    setNameArea: function() {
        if (this.area == 1) {
            this.SelectAreaName = 'Energía';
        }
        if (this.area == 2) {
            this.SelectAreaName = 'Clima';
        }
        if (this.area == 3) {
            this.SelectAreaName = 'Obras civiles';
        }
        if (this.area == 4) {
            this.SelectAreaName = 'Medio ambiente';
        }
    },
    setLeterCategory: function() {
        if (this.categoria == 1) {
            this.SelectCategoryLeter = 'A';
        }
        if (this.categoria == 2) {
            this.SelectCategoryLeter = 'B';
        }
        if (this.categoria == 3) {
            this.SelectCategoryLeter = 'C';
        }
        if (this.categoria == 4) {
            this.SelectCategoryLeter = 'D';
        }
        if (this.categoria == 5) {
            this.SelectCategoryLeter = 'E';
        }
    },
    RedirectionTicket: function() {
        $('#NuevoRumbo').modal('hide');
        if (this.nuevoEstado == 4) {
            var estado = 'Finalizada'
        }
        if (this.nuevoEstado == 3) {
            var estado = 'Validación'
        }
        if (this.nuevoEstado == 2) {
            var estado = 'En curso'
        }
        if (this.nuevoEstado == 1) {
            var estado = 'En Espera'
        }
        if (this.nuevoEstado == 7) {
            var estado = 'Eliminada'
        }
        if (this.nuevoEstado == 5) {
            var estado = 'Ingeniero OYM Rechazada'
        }
        if (this.nuevoEstado == 6) {
            var estado = 'Ingeniero  Rechazada'
        }
        let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 1300)
        axios.post(`/RedirectTicket?id=${this.OldIdTicket}&estado=${this.nuevoEstado}`).then((response) => {
            this.SearchTicket(this.modulo);
            this.getBacklog();
            this.nuevoEstado = '';
            this.$swal({
                type: 'success',
                title: 'Ticket Numero ' + this.OldIdTicket + ' ' + 'Cambio de estado a' + ' ' + estado,
                showCloseButton: true,
            });
        })
    },
    ClearAllData: function(id) {
        if (id == 2) {
            var state = 2;
            this.nombre = ' TICKETS EN CURSO';
            this.modulo = 2;
        } else {
            if (id == 3) {
                var state = 3;
                this.nombre = 'TICKETS VALIDACIÓN';
                this.modulo = 3;
            } else {
                if (id == 4) {
                    var state = 4;
                    this.nombre = ' TICKETS FINALIZADOS'
                    this.modulo = 4;
                } else {
                    var state = 1;
                    this.nombre = 'TICKETS EN ESPERA';
                    this.modulo = 1;
                }
            }
        }
        if (this.codigo != null) {
            this.codigo = '';
        }
        if (this.area != null) {
            this.area = '';
        }
        if (this.zona != null) {
            this.zona = '';
        }
        if (this.categoria != null) {
            this.categoria = '';
        }
        if (this.sitio != null) {
            this.sitio = '';
        }
        if (this.motivo != null) {
            this.motivo = '';
        }
        if (this.fecha1 != null) {
            this.fecha1 = '';
        }
        if (this.fecha2 != null) {
            this.fecha2 = '';
        }
        if (this.searchDescripcion != null) {
            this.searchDescripcion = '';
        }
        if (this.user != null) {
            this.user = '';
        }
        if (this.zona != null) {
            this.zona = '';
        }
        if (this.sitio_tech_search_input != null) {
            this.sitio_tech_search_input = '';
        }
    
    
        if (this.crm == 1) {
            this.NombreCrm = 'CRM NORTE';
            this.crmNombre = 'Crm Norte';
        }
        if (this.crm == 2) {
            this.NombreCrm = 'CRM CENTRO NORTE';
            this.crmNombre = 'Crm Centro Norte';
        }
        if (this.crm == 3) {
            this.NombreCrm = 'CRM METROPOLITANO';
            this.crmNombre = 'Crm Metropolitano';
        }
        if (this.crm == 4) {
            this.NombreCrm = 'CRM CENTRO SUR';
            this.crmNombre = 'Crm Centro Sur';
        }
        if (this.crm == 5) {
            this.NombreCrm = 'CRM SUR';
            this.crmNombre = 'Crm Sur';
        }
        if (this.crm == 6) {
            this.NombreCrm = 'CRM AUSTRAL';
            this.crmNombre = 'Crm Austral';
        }
    
        if (this.selectmotivo != 0) {
            
            if (this.selectmotivo == 7) {
                this.NombreModuloMotivo = 'mantención red core'
            } else {
                if (this.selectmotivo == 8) {
                    this.NombreModuloMotivo = 'en operación'
                }
            }
        } else {
            this.NombreModuloMotivo = ''
        }
        if(this.screen_width >1024){
           this.clearArea2();
           this.ClearCate2();
           this.ClearMotivo2();
           this.clearCrm2();
       }
        
        
        
        this.tickets.current_page = 1;
        var page = 1;
        this.LoadData()
       
        axios.get(`/tikectList?page=${page}&state=${state}&codigo=${this.codigo}&area=${this.area}&sitio=${this.sitio}&categoria=${this.categoria}&motivo=${this.motivo}&fecha1=${this.fecha1}&fecha2=${this.fecha2}&descripcion=${this.searchDescripcion}&crm=${this.crm}&motivoSelectIng=${this.selectmotivo}`).then((response) => {
           
            this.getBacklog();
            this.tickets = response.data;
            this.tickets.current_page = 1;
        })
    },
    filtroCrm: function() {
        this.crm = document.getElementById('crmId').value;
        this.SearchTicket(this.modulo);
    },
    UpdateFechaCreacion: function(id) {
        $('#fecha1Update').modal('hide');
        let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 200)
        axios.post(`/UpdateFecha1?id=${this.IdUpdateFecha}&Fechanueva=${this.fecha1Update}&tipoFecha=${this.TipoFecha}`).then((response) => {
            this.getTickets(this.modulo);
        })
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3200,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: 'Fecha Actualizada '
        })
    },
    OpenModalUpdateDate1: function(ticket, mod) {
        this.IdUpdateFecha = ticket.id;
        this.TipoFecha = mod;
        $('#fecha1Update').modal('show');
    },
    GetRol: function() {
        axios.get('/GetRolUser').then((response) => {
            this.rol_id = response.data;
        })
    },
    CleanData: function(id) {
        if (id == 2) {
            var state = 2;
            this.nombre = 'TICKETS EN CURSO';
            this.modulo = 2;
        } else {
            if (id == 3) {
                var state = 3;
                this.nombre = ' TICKETS EN VALIDACIÓN';
                this.modulo = 3;
            } else {
                if (id == 4) {
                    var state = 4;
                    this.nombre = 'TICKETS FINALIZADOS'
                    this.modulo = 4;
                } else {
                    var state = 1;
                    this.nombre = ' TICKETS EN ESPERA';
                    this.modulo = 1;
                }
            }
        }
        if (this.codigo != null) {
            this.codigo = '';
        }
        if (this.area != null) {
            this.area = '';
        }
        if (this.zona != null) {
            this.zona = '';
        }
        if (this.categoria != null) {
            this.categoria = '';
        }
        if (this.sitio != null) {
            this.sitio = '';
        }
        if (this.motivo != null) {
            this.motivo = '';
        }
        if (this.fecha1 != null) {
            this.fecha1 = '';
        }
        if (this.fecha2 != null) {
            this.fecha2 = '';
        }
        if (this.searchDescripcion != null) {
            this.searchDescripcion = '';
        }
        if (this.user != null) {
            this.user = '';
        }
        this.clearArea2();
        this.ClearCate2();
        this.ClearMotivo2();
        axios.get(`/tikectList?page=${this.tickets.current_page}&state=${state}`).then((response) => {
            this.tickets = response.data
        })
    },
    formato: function(d) {
        return moment(d).format("DD/MM/YY");
    },
    crearSolicitud: function() {
        $('#formulario').modal('hide');
        let loader = this.$loading.show({
            // Optional parameters
            container: this.fullPage ? null : this.$refs.formContainer,
            canCancel: true,
            onCancel: this.onCancel,
        });
        // simulate AJAX
        setTimeout(() => {
            loader.hide()
        }, 5000)
    },
    onCancel() {
        console.log('User cancelled the loader.')
    },
    getTickets: function(id) {
        if (id == 2) {
            var state = 2;
            this.nombre = ' TICKETS EN CURSO';
            this.modulo = 2;
        } else {
            if (id == 3) {
                var state = 3;
                this.nombre = ' TICKETS EN VALIDACIÓN';
                this.modulo = 3;
            } else {
                if (id == 4) {
                    var state = 4;
                    this.nombre = 'TICKETS FINALIZADOS'
                    this.modulo = 4;
                } else {
                    var state = 1;
                    this.nombre = 'TICKETS EN ESPERA';
                    this.modulo = 1;
                }
            }
        }
        if (this.codigo != null) {
            this.codigo = '';
        }
        if (this.area != null) {
            this.area = '';
        }
        if (this.zona != null) {
            this.zona = '';
        }
        if (this.categoria != null) {
            this.categoria = '';
        }
        if (this.sitio != null) {
            this.sitio = '';
        }
        if (this.motivo != null) {
            this.motivo = '';
        }
        if (this.fecha1 != null) {
            this.fecha1 = '';
        }
        if (this.fecha2 != null) {
            this.fecha2 = '';
        }
        if (this.searchDescripcion != null) {
            this.searchDescripcion = '';
        }
        axios.get(`/tikectList?page=${this.tickets.current_page}&state=${state}`).then((response) => {
            let loader = this.$loading.show({
                // Optional parameters
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: true,
                onCancel: this.onCancel,
            });
            // simulate AJAX
            setTimeout(() => {
                loader.hide()
            }, 350)
            this.tickets = response.data
        })
    },
    setEestado: function() {
        if (this.estadoValue == 1) {
            this.SelectEstado = 'En espera';
        }
        if (this.estadoValue == 8) {
            this.SelectEstado = 'Apobación ing oym';
        }
        if (this.estadoValue == 2) {
            this.SelectEstado = 'En curso';
        }
        if (this.estadoValue == 3) {
            this.SelectEstado = 'Validación';
        }
        if (this.estadoValue == 4) {
            this.SelectEstado = 'Finalizadas';
        }
    },
    ClearEestado: function() {
        this.estadoValue = '';
        var selectEstado = document.getElementById('selectEstado');
        selectEstado.style.display = '';
        var selectedEstadoInfo = document.getElementById('selectedEstadoInfo');
        selectedEstadoInfo.style.display = 'none';
        this.SearchTicket();
    },
    
    crearTicket: function() {
        alert('hola');
    },
    getInfo: function(ticket) {
        axios.get(`/Tkc/${ticket.id}`).then((response) => {})
    },
    Aprobartck: function(ticket) {
        if(ticket.estado_id == 1 && ticket.tipo_motivo_id == 12 && ticket.area_id == null){
            Swal.fire({
                    type: "info",
                    title: "Atención",
                    text: "Debes ingresar el área, la tecnica y el equipo para poder aprobar el ticket",
            })

        }else{
            this.datosTicket.id = ticket.id;
            console.log(ticket.id);
            $('#fecha').modal('show');
        }
      
    },
    Aprobartck2: function(ticket, m) {
        var id = ticket.id;
        var url = '/cambioestado2/' + id
        axios.put(url, this.datosTicket).then(response => {
            if(response.data == 2){
                 this.error_mensaje();
            }else{
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                     toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                type: 'success',
                title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
            })
            }
        });
        this.SearchTicket(m);
        this.getBacklog();
        this.errors = [];
        
    },
    Aprobartck3: function(ticket) {
        var id = ticket.id;
        var url = '/cambioestado2/' + id
        axios.put(url, this.datosTicket).then(response => {});
        let m = 1;
        this.SearchTicket(m);
        this.getBacklog();
        this.errors = [];
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
        })
    },
    retroceso: function(ticket) {
        $('#NuevoRumbo').modal('show');
        this.OldIdTicket = ticket.id;
       
    },
    ModalRechazo: function(ticket) {
        this.datosLog.id = ticket.id;
        $('#desc').val('');
        $('#rechazo').modal('show');
    },
    ModalCrear: function() {
        $('#formulario').modal('show');
       
    },
    ModalCrearTicketCnt:function(){
        EventBus.$emit('get-data-form-cnt') 
        $('#formCnt').modal('show');
    },
    RechazarTicket: function(id, m) {
        var url = '/rechazo/' + id
        axios.put(url, this.datosLog).then(response => {
            this.sendMail(id)
        });
        $('#rechazo').modal('hide');
        $('#desc').val('');
        this.getTickets(m);
        this.getBacklog();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    
        Toast.fire({
            type: 'success',
            title: 'Ticket Nro' + ' ' + id + ' ' + 'Rechazado.'
        })
    },
    AprobarTicket: function(id) {
        var url = '/cambioestado/' + id
        axios.put(url, this.datosTicket).then(response => {
            $('#fecha').modal('hide');
            $('#fechaInput').val('');
            this.SearchTicket();
            this.getBacklog();
            this.datosTicket = {
                'id': '',
                'fechaCompromiso': ''
            };
            this.errors = [];
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                type: 'success',
                title: 'Ticket Nro' + ' ' + id + ' ' + 'Aprobado.'
            })
            this.sendMail(id);
        });
    },
    LoadData:function(){
         let loader = this.$loading.show({
                // Optional parameters
                container: this.fullPage ? null : this.$refs.formContainer,
                canCancel: true,
                onCancel: this.onCancel,
            });
            // simulate AJAX
            setTimeout(() => {
                loader.hide()
            }, 250)
    },
    busqueda_ticket_sitio_tecno:function(){
        if(this.sitio_tech_search_input.length >= 3){
          this.SearchTicket(this.modulo)
        }else{
            if(this.sitio_tech_search_input.length == 0){
               this.SearchTicket(this.modulo)
            }
        }
    },
    setvalue_pep_search:function(){
          if (this.pep_av == true) {

                this.pep_val = 1;
                this.SearchTicket(this.modulo)
            } else {

                this.pep_val = '';
                this.SearchTicket(this.modulo);
            }
    },
    setvalue_r_c_2020:function(){
           if (this.man_red_core_2020_check == true) {

                this.man_red_core_2020_val = 1;
                this.SearchTicket(this.modulo)
            } else {

                this.man_red_core_2020_val = '';
                this.SearchTicket(this.modulo);
            }



    },
    see_pep:function(ticket){
        axios.get('/change_state_pep_new/'+ticket.id).then((response=>{
           this.loadFunction();
           this.SearchTicket(this.modulo);
        }))
    },
    error_mensaje:function(){
         this.$swal({
                  type: 'error',
                  title:'Error',
                  text:'Debe finalizar sus solicitudes de SGC para poder cerrar el ticket',
                  showCloseButton: true,
        });
    },
    sendMail(ticket){
        axios.get('/send/generic/mail/platform',{
            params:{
                'ticket_id':ticket,
                'plataforma':1
            }
        }).then((response)=>{
            return response.data
        })
    }

              
           

        }
    }
</script>
