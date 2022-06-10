<template>
    <div>
        <div class="back-aside-load-sgc" id="loadBack">
            <div class="d-flex justify-content-center" style="margin-top: 20%">
                <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                    <span class="sr-only" style="color: #191919">
                        Cargando...
                    </span>
                </div>
            </div>
        </div>
        <div class="main-content" id="searchTicekt" v-if="solicitudes.length == 0">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12 ">
                                <form @submit="SearchSolicitud">
                                    <div class="search-element" v-if="BuscarSolicitud == 1">
                                        <input aria-label="Search" class="form-control" name="" placeholder="Buscar solicitud" type="search" v-model="solicitudSearch">
                                            <button @="" class="btn" style="display: none" type="submit">
                                                <i class="fas fa-search">
                                                </i>
                                            </button>
                                        </input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                    <div class="card-body">
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon" style="background-image: linear-gradient(rgb(0, 92, 255), rgba(0, 123, 255, 0.6))">
                                <i class="fas fa-question">
                                </i>
                            </div>
                            <h2>
                                No se ha encontrado ningúna Solicitud en la busqueda.
                            </h2>
                            <p class="lead">
                                Verifique los datos de búsqueda o el estado de esta.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content" id="showDataSgc" v-if="solicitudes.length != 0">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title" v-for="solicitud in solicitudes">
                                    <a @click.prevent="getshowSolicitud()" href="#" style="color:rgb(0, 92, 255)" title="Recargar datos">
                                        <i class="fas fa-undo-alt" style="font-size:20px">
                                        </i>
                                    </a>
                                    <h1>
                                        <div class=" barlow semi_bold">
                                            Solicitud Nro°  {{solicitud.id}} {{solicitud.solicitud_duplicada_id != null ? '&':''}} {{solicitud.solicitud_duplicada_id != null ? solicitud.solicitud_duplicada_id:''}}
                                            <a @click.prevent="setTexto(solicitud)" href="#" v-clipboard:copy="texto_solicitud" v-if="copy_data_cesta == 1">
                                                <i class="fas fa-copy boxBounce" style="font-size: 22px;color: rgb(0, 92, 255)">
                                                </i>
                                            </a>
                                        </div>
                                    </h1>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title" v-for="solicitud in solicitudes">
                                    <h1>
                                        <div v-if="solicitud.ticket_id !=null ">
                                            <a :href="'/showTicket/'+solicitud.ticket_id" style="color: #42E8B4" target="__blanck">
                                                <strong class=" barlow semi_bold">
                                                    Ticket Nro°{{solicitud.ticket_id}}
                                                </strong>
                                            </a>
                                            <a data-toggle="modal" href="#EditNumeroTicket" v-if="add_ticket_sgc == 1">
                                                <i class="fas fa-edit" style="font-size:15px;">
                                                </i>
                                            </a>
                                        </div>
                                        <div v-if="solicitud.ticket_id == null ">
                                            <button @click.prevent="add_ticket_modal(solicitud.id)" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="add_ticket_sgc == 1">
                                                <i class="fas fa-plus">
                                                </i>
                                                N° TICKET
                                            </button>
                                        </div>
                                    </h1>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-12 ">
                                <form @submit="SearchSolicitud">
                                    <div class="search-element" v-if="BuscarSolicitud == 1">
                                        <input aria-label="Search" class="form-control" name="" placeholder="Buscar solicitud" type="search" v-model="solicitudSearch">
                                            <button @="" class="btn" style="display: none" type="submit">
                                                <i class="fas fa-search">
                                                </i>
                                            </button>
                                        </input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-poll-h" style="color: #42E8B4;font-size: 135px;margin-left: -130px;">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Solicitud
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Datos de la solicitud
                                </div>
                            </div>
                            <div class="card-body p-0" style="max-height:360px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes" v.if="solicitud.area_creadora_id == null">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Creador
                                                        <a @click.prevent="showModalEditUser(solicitud)" href="#" style="color: #005cff" v-if="opcionEdituser == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.user.name}} {{solicitud.user.apellido}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Fecha creación
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{formato(solicitud.created_at)}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Ejecución
                                                        <a @click.prevent="show_modal_edit_fecha_ejecucion(solicitud.id)" href="" style="color: #005cff" v-if="opcion_edit_fecha_ejecucion == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{formato(solicitud.fecha_ejecucion)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Área
                                                        <a @click.prevent="showModalEditArea(solicitud)" href="" style="color: #005cff" v-if="opcionEditArea == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.area ? solicitud.area.area:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Tipo trabajo
                                                        <a @click.prevent="showModalEditTipoTrabajo(solicitud)" href="#" style="color: #005cff" v-if="opcionEditTipoTrabajo==1 && solicitud.area_creadora_id == null && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                        <a @click.prevent="showModalEditTipoTrabajo(solicitud)" href="#" style="color: #005cff" v-if="opcionEditTipoTrabajo==1 && solicitud.area_creadora_id == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.area_creadora_id == null">
                                                    {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.area_creadora_id == 1">
                                                    <div v-if="solicitud.tipo_trabajo_ingenieria_id== 1">
                                                        Licitación
                                                    </div>
                                                    <div v-if="solicitud.tipo_trabajo_ingenieria_id== 2">
                                                        Cotización
                                                    </div>
                                                    <div v-if="solicitud.tipo_trabajo_ingenieria_id== 3">
                                                        LPU
                                                    </div>
                                                    <div v-if="solicitud.tipo_trabajo_ingenieria_id== 4">
                                                        CPU
                                                    </div>
                                                    <div v-if="solicitud.tipo_trabajo_ingenieria_id== 6">
                                                        Sin asignar
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div v-if="solicitud.area_creadora_id == null">
                                                    <div class="ticket-title barlow bold">
                                                        <h4 style="color:#1e5e98;">
                                                            Motivo
                                                        </h4>
                                                    </div>
                                                    <div class=" barlow regular">
                                                        {{solicitud.ticket_id != null && solicitud.ticket.tipo_motivo ? solicitud.ticket.tipo_motivo.descripcion:''}}
                                                    </div>
                                                </div>
                                                <div v-if="solicitud.area_creadora_id == 1">
                                                    <div class="ticket-title barlow bold">
                                                        <h4 style="color:#1e5e98;">
                                                            Cod Sap
                                                            <a @click.prevent="showModalEditCodSap(solicitud)" href="#" style="color: #005cff" v-if="editar_codigo_sap == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                                <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                                </i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class=" barlow regular">
                                                        {{solicitud.cod_sap}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Descripción
                                                        <a @click.prevent="showModalEditDescripcion(solicitud)" href="" style="color: #005cff " v-if="opcionEditDescripcion==1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.descripcion}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Responsable pago
                                                        <a @click.prevent="showModalEditResponsablePago(solicitud)" href="" style="color: #005cff" v-if="opcionEditResponsable == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.responsable_pago? solicitud.responsable_pago.nombre:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Nombre proyecto   <a  href="#editNameProject" data-toggle="modal" style="color: #005cff" v-if="opcionEditDescripcion == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14  ">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 17px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.nombre_proyecto_ing}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Motivo trabajo
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.motivo_trabajo? solicitud.motivo_trabajo.motivo:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Flujo trabajo
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.flujo_trabajo? solicitud.flujo_trabajo.nombre_flujo:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Trabajo ejecutado
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.trabajo_ejecutado_ing == 1">
                                                    SI
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.trabajo_ejecutado_ing == 2">
                                                    NO
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Pm proyecto
                                                        <a @click.prevent="showModalEditPmProyecto(solicitud)" href="" style="color: #005cff" v-if="opcionEditPmProyecto == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.pm_proyecto? solicitud.pm_proyecto.nombre_completo:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Pm interno
                                                        <a @click.prevent="showModalEditPmInterno(solicitud)" href="" style="color: #005cff" v-if="opcionEditPmInterno == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.pm_interno ? solicitud.pm_interno.nombre_completo:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Solicitante
                                                        <a @click.prevent="showModalEditSolicitante(solicitud)" href="" style="color: #005cff" v-if="opcionEditSolicitante == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.solicitante? solicitud.solicitante.nombre_completo:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Tipo de pago
                                                        <a @click.prevent="showModalEditTipoPago(solicitud)" href="" style="color: #005cff" v-if="opcionEditTipoPago== 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.tipo_pago? solicitud.tipo_pago.descripcion:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        P.GPON
                                                        <a @click.prevent="showModalEditPGpon(solicitud)" href="" style="color: #005cff" v-if="opcionEditPGpon == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.proyecto_gpon == 1 ">
                                                    SI
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.proyecto_gpon == 2 ">
                                                    NO
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item" v-if="solicitud.area_creadora_id == 1">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        TP
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row barlow regular">
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12" v-for="t in tp">
                                                {{t.nro_tp}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-globe-americas" style="color: #42E8B4">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Sitio 
                                             
                                                     <a @click.prevent="showModalEditSite(solicitud)" href="" style="color: white" v-if="opcionEditSitio == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14  ">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 17px;">
                                                            </i>
                                                        </a>
                                              
                                    
                                </h4>
                                <div class="card-description barlow semi_bold" v-for="solicitud in solicitudes">
                                    {{solicitud.site_id != null || solicitud.temp_sgc_pop_id != null ? 'Datos del sitio' :'Sin sitio'}} {{solicitud.temp_sgc_pop_id != null ? ' - Ingreso manual' :''}}
                                </div>
                            </div>
                            <div class="card-body p-0" style="max-height:360px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes" v-if="solicitud.site_id != null">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Nombre
                                                      <!--   <a @click.prevent="showModalEditSite(solicitud)" href="" style="color: #005cff" v-if="opcionEditSitio == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a> -->
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.site?solicitud.site.nombre:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Nemonico
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.site?solicitud.site.nem_site:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Tipo
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.site.site_type_id==1">
                                                    FIJO
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.site.site_type_id==2">
                                                    MOVIL
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.site.site_type_id==3">
                                                    SWITCH
                                                </div>
                                                <div class=" barlow regular" v-if="solicitud.site.site_type_id==4">
                                                    PHONE
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Clasificación
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    <span class="badge " style="background-color:#42e8b4;color: white; " v-if="solicitud.site.classification_type_id == 1 ">
                                                        A
                                                    </span>
                                                    <span class="badge " style="background-color:#005cff;color: white; " v-if="solicitud.site.classification_type_id == 2 ">
                                                        B
                                                    </span>
                                                    <span class="badge badge-warning" style="" v-if="solicitud.site.classification_type_id == 3 ">
                                                        C
                                                    </span>
                                                    <span class="badge " style="background-color:#6c757d;color: white ; " v-if="solicitud.site.classification_type_id == 4 ">
                                                        D
                                                    </span>
                                                    <span class="badge " style="background-color:#6c757d;color: white ; " v-if="solicitud.site.classification_type_id == 5 ">
                                                        E
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Crm
                                                    </h4>
                                                </div>
                                                <div class="barlow semi_bold">
                                                    {{solicitud.site ?  solicitud.site.pop.comuna.zona.crm.nombre_crm:'' | uppercase}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Tipo de Atención
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.site.attention_type_id == 1">
                                                    5X8
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.site.attention_type_id == 2">
                                                    24/7
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Planificación
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    <span class="badge badge-info " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==1">
                                                        A
                                                    </span>
                                                    <span class="badge badge-success " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==2">
                                                        A+
                                                    </span>
                                                    <span class="badge badge-dark " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==3">
                                                        A++
                                                    </span>
                                                    <span class="badge badge-light " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==4">
                                                        B+
                                                    </span>
                                                    <span class="badge badge-primary " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==5">
                                                        C
                                                    </span>
                                                    <span class="badge badge-danger " style="font-size: 15px;" v-if="solicitud.site.category_type_id ==6">
                                                        C+
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Bafi
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.site.bafi == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="solicitud.site.bafi == 0">
                                                    <i class="fas fa-times-circle" style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Olt 3Play
                                                    </h4>
                                                </div>
                                                <div v-if="solicitud.site.olt_3play == 1">
                                                    <i class="fas fa-check" style="color:#47c363;font-size:18px;">
                                                    </i>
                                                </div>
                                                <div v-if="solicitud.site.olt_3play == 0">
                                                    <i class="fas fa-times-circle" style="color:#ed5565;font-size:22px;">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tickets-list" v-for="solicitud in solicitudes" v-if="solicitud.temp_sgc_pop_id != null">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Nombre
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.temp_sgc_pop? solicitud.temp_sgc_pop.nombre:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Nemonico
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.temp_sgc_pop?solicitud.temp_sgc_pop.nem_movil:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Dirección
                                                    </h4>
                                                </div>
                                                <div class=" barlow regular">
                                                    {{solicitud.temp_sgc_pop? solicitud.temp_sgc_pop.direccion:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-dolly" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class="barlow bold">
                                    Proveedor
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Datos del proveedor
                                </div>
                            </div>
                            <div class="card-body p-0" style="max-height:360px;overflow-y:auto">
                                <div class="tickets-list" v-for="solicitud in solicitudes">
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Proveedor
                                                        <a @click.prevent="showModalEditProveedor(solicitud)" href="" style="color: #005cff" v-if="opcionEditProveedor == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{solicitud.proveedor ?solicitud.proveedor.PROVEEDOR:''}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-16 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Rut
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{solicitud.proveedor ?solicitud.proveedor.RUT_PROVEEDOR:''}}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" v-if="solicitud.tipo_gasto">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Formato de pago
                                                        <a @click.prevent="showModalEditFormato(solicitud.id)" href="" style="color: #005cff" v-if=" solicitud.proceso_id != 13 && solicitud.proceso_id != 14 && opcionEditarFormato == 1 ">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                    <div class="barlow regular">
                                                        {{solicitud.tipo_gasto.nombre_gasto}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;" v-if="solicitud.costos_activos!= 0 && solicitud.costos_activos!= null ">
                                                        Costos Activos
                                                        <a @click.prevent="showModalEditMontoSolicitud(solicitud)" href="" style="color: #005cff" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 7 && opcionEditMonto == 1 ||  opcionEditMonto == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                    <h4 style="color:#1e5e98;" v-if="solicitud.costos_servicios!= 0 &&  solicitud.costos_servicios!= null">
                                                        Costos Servicios
                                                        <a @click.prevent="showModalEditMontoSolicitud(solicitud)" href="" style="color: #005cff" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 7 && opcionEditMonto == 1 ||  opcionEditMonto == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                    <h4 style="color:#1e5e98;" v-if="solicitud.activo_servicio!= 0 && solicitud.activo_servicio != null ">
                                                        Costos totales
                                                        <a @click.prevent="showModalEditMontoSolicitud(solicitud)" href="" style="color: #005cff" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 7 && opcionEditMonto == 1 || solicitud.proceso_id == 11 && solicitud.subestado_id == 7 && opcionEditMonto == 1 ||  opcionEditMonto == 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14 ">
                                                            <i class="fas fa-edit boxBounce" style="font-size: 15px;">
                                                            </i>
                                                        </a>
                                                    </h4>
                                                    <h4 style="color:#1e5e98;" v-if="solicitud.costos_activos == null  && solicitud.costos_servicios == null && solicitud.activo_servicio == null ">
                                                        Costos 
                                                    </h4>
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.costos_activos != 0 && solicitud.costos_activos!= null">
                                                    {{solicitud.tipo_moneda.moneda}}  $ {{formatPrice(solicitud.costos_activos ) }}
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null">
                                                    {{solicitud.tipo_moneda.moneda}} $ {{formatPrice(solicitud.costos_servicios ) }}
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.activo_servicio != 0 && solicitud.activo_servicio != null ">
                                                    {{solicitud.tipo_moneda.moneda}} $ {{formatPrice(solicitud.activo_servicio ) }}
                                                </div>
                                                <div class="barlow regular" v-if="solicitud.costos_activos == null  && solicitud.costos_servicios == null && solicitud.activo_servicio == null ">
                                                       <button class="btn " @click.prevent="showModalEditMontoSolicitud(solicitud)"  style="color: white;font-size: 15px; background-color: #1d548a" ><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12" v-if="solicitud.limite_monto != null && solicitud.limite_monto != 3">
                                                <div class="ticket-title barlow bold">
                                                    <span :style="solicitud.limite_monto == 1 ? 'background-color: rgb(248, 172, 89);':'background-color:rgb(66, 232, 180);'" class="badge " style="width:100%;border-radius: 3px;opacity: .7;color:white;margin-top: 7px;">
                                                        <div class="barlow bold" style="font-size: 20px;" v-text="solicitud.limite_monto == 1 ? ' Mayor a 50UF':(solicitud.limite_monto == 2 ? 'Menor a 50UF':'')">
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket-item">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ticket-title barlow bold">
                                                    <h4 style="color:#1e5e98;">
                                                        Fecha de facturación
                                                    </h4>
                                                </div>
                                                <div class="barlow regular">
                                                    {{solicitud.fecha_facturacion}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-info-circle" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class="barlow bold">
                                    Estado
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Estado solicitud
                                </div>
                            </div>
                            <div class="card-body " style="max-height:450px;overflow-y:auto" v-for="solicitud in solicitudes">
                                <div class="card" v-if="load_data == 0">
                                    <span :style="'width:100%;'+'border-radius:3px;'+'background-color:'+solicitud.subestado.color+';'+'color:white;'+'opacity: .7'" class="badge ">
                                        <div class="barlow bold" style="font-size: 30px;" v-if="solicitud.subestado_id != 12">
                                            {{solicitud.proceso.descripcion | uppercase}}
                                        </div>
                                        <div class="barlow bold" style="font-size: 22px;margin-top: 5px;" v-if="solicitud.proceso_id != 14 && solicitud.proceso_id != 13">
                                            {{solicitud.subestado.subestado | uppercase}}
                                        </div>
                                        <div class="barlow semi_bold" style="font-size: 26px" v-if="solicitud.gestionador_id != null">
                                            {{solicitud.gestionador_id | uppercase}}
                                        </div>
                                    </span>
                                    <span class="badge" style="margin-top: 5px;border-radius:3px;" v-bind:class="total_montos_pendientes != 0 ? 'badge-danger':(total_montos_pendientes == 0 ? 'badge-info':'')" v-if="solicitud.subestado_id == 12 && total_montos_pendientes != '' ">
                                        <div class="barlow bold" style="font-size: 22px">
                                            Liberaciones de pago por aprobar
                                            <div class="barlow semi_bold" style="font-size: 28px;margin-top: 10px;">
                                                {{total_montos_pendientes}}
                                            </div>
                                            <div style="margin-top: 10px;" v-if="ver_liberaciones == 1">
                                                <button @click.prevent="showModalAprobacionmonto(solicitud)" class="btn barlow semi_bold btn-block boxBounce" style="background-color: #cdd3d8;color: white;font-size: 18px;">
                                                    Ver
                                                </button>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                                <div class="">
                                    <div class="d-flex justify-content-center" v-if="load_data == 1">
                                        <div class="spinner-border text-primary" role="status" style="width: 6rem;height: 6rem;color: #007bff!important;">
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION VALIDADOR -->
                                    <div v-if="load_data == 0 && solicitud.proceso_id == 15 && solicitud.subestado_id == 7 && opcionValidador == 1">
                                        <div class="barlow semi_bold">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudValidador()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click="load_spin" @click.prevent="set_falla_movil()" class="btn btn-warning btn-block" style="font-size: 17px;" v-if="solicitud.tipo_trabajo_id == 10 || solicitud.tipo_trabajo_id == 12">
                                                <div v-if="solicitud.tipo_trabajo_id == 10">
                                                    Solicitar  PEP falla movil menor
                                                </div>
                                                <div v-if="solicitud.tipo_trabajo_id == 12">
                                                    Solicitar  PEP falla movil mayor
                                                </div>
                                            </button>
                                            <button class="btn btn-info btn-block" @click="changeStateValidator(1)" style="font-size: 17px;">Validación de compras</button>


                                            <button class="btn btn-warning btn-block" @click="changeStateValidator(2)" style="font-size: 17px;">Carga de cotizaciones</button>

                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 15 && solicitud.subestado_id == 17 && opcionValidador == 1">
                                            <button @click="load_spin" @click.prevent="set_falla_movil()" class="btn btn-warning btn-block" style="font-size: 17px;">
                                                <div v-if="solicitud.tipo_trabajo_id == 10">
                                                    PEP falla movil menor solicitado
                                                </div>
                                                <div v-if="solicitud.tipo_trabajo_id == 12">
                                                    PEP falla movil mayor solicitado
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIO VALIDADOR -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 15 && solicitud.subestado_id == 8 && opcionValidador==1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudValidador()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Reenviar
                                            </button>
                                            <button @click="load_spin" @click.prevent="set_falla_movil()" class="btn btn-warning btn-block" style="font-size: 17px;" v-if="solicitud.tipo_trabajo_id == 10 || solicitud.tipo_trabajo_id == 12">
                                                <div v-if="solicitud.tipo_trabajo_id == 10">
                                                    Solicitar  PEP falla movil menor
                                                </div>
                                                <div v-if="solicitud.tipo_trabajo_id == 12">
                                                    Solicitar  PEP falla movil mayor
                                                </div>
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION JEFE ÁREA -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 16 && solicitud.subestado_id == 7 && opcionJefeArea == 1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudJefeArea()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIO JEFE ÁREA -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 16 && solicitud.subestado_id == 8 && opcionJefeArea == 1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudJefeArea()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Reenviar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION ELECTRICO -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="cargo_id == 2 && solicitud.proceso_id == 7 && solicitud.subestado_id == 7 ">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitud()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIAR ELECTRICO -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="cargo_id == 2 && solicitud.proceso_id == 7 && solicitud.subestado_id == 8 ">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitud()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Reenviar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIAR ELECTRICO -->
                                    <div class="barlow semi_bold" v-if="cargo_id == 1 && solicitud.proceso_id == 8 && solicitud.subestado_id == 8 ">
                                        <button @click.prevent="AprobarSolicitud()" class="btn btn-success btn-block" style="font-size: 17px;">
                                            Reenviar
                                        </button>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION INGENIERO OYM -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 6 && solicitud.subestado_id == 7 && opcionIngOym==1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudIngOym()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIO INGENIERO OYM -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 6 && solicitud.subestado_id == 8 && opcionIngOym==1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudIngOym()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Reenviar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION PMO -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 11 && solicitud.subestado_id == 7 && opcionPmo==1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitud()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- REENVIAR PMO -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 11 && solicitud.subestado_id == 8 && opcionPmo==1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitud()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Reenviar
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION CONTROL -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 7 && opcionControlOym == 1">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudControl()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Aprobar
                                            </button>
                                            <button @click="load_spin" @click.prevent="EsperaPresupuesto()" class="btn btn-block " style="background-color:rgb(66, 232, 180);color:white;box-shadow: 0 2px 6px rgb(66, 232, 180);font-size: 17px;">
                                                Espera presupuesto
                                            </button>
                                            <button @click="load_spin" @click.prevent="PagoRetenido()" class="btn btn-info btn-block" style="font-size: 17px;">
                                                Pago retenido
                                            </button>
                                            <button @click.prevent="RechazarSolicitud(solicitud)" class="btn btn-danger btn-block" style="font-size: 17px;">
                                                Rechazar
                                            </button>
                                        </div>
                                    </div>
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 10 && opcionControlOym == 1">
                                            <button @click="load_spin" @click.prevent="EsperaPresupuesto()" class="btn btn-block" style="background-color:rgb(66, 232, 180);color:white;box-shadow: 0 2px 6px rgb(66, 232, 180);font-size: 17px;">
                                                Espera presupuesto
                                            </button>
                                        </div>
                                    </div>
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 23 && opcionControlOym == 1">
                                            <button @click="load_spin" @click.prevent="reclasificarSolicitud()" class="btn btn-block" style="background-color:rgb(66, 232, 180);color:white;box-shadow: 0 2px 6px rgb(66, 232, 180);font-size: 17px;">
                                                Reclasificar
                                            </button>
                                        </div>
                                    </div>

                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id == 11 && opcionControlOym == 1">
                                            <button @click="load_spin" @click.prevent="PagoRetenido()" class="btn btn-info btn-block" style="font-size: 17px;">
                                                Pago retenido
                                            </button>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px;">
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- FINALIZAR SOLICITUD -->
                                    <div class="barlow semi_bold" v-if="solicitud.proceso_id == 17 && solicitud.subestado_id == 5">
                                        <button @click.prevent="ModalFacturar(solicitud)" class="btn btn-secondary btn-block" style="font-size: 17px;" v-if="finalizar_solicitud==1">
                                            Finalizar solicitud
                                        </button>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- SOLICITAR LIBERACIÓN DE PAGO DE  SOLICITUD -->
                                    <div style="margin-top: 8px;">
                                    </div>
                                    <div class="barlow semi_bold" v-if=" solicitud.subestado_id == 12">
                                        <button @click.prevent="ModalSolcitarLiberacion(solicitud)" class="btn btn-info btn-block" style="font-size: 17px;">
                                            Solicitar liberación de pago
                                        </button>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <div style="margin-top: 8px;">
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                       <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- APROBACION INGENIERO OYM -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="solicitud.proceso_id == 18 && solicitud.subestado_id == 20 ">
                                            <button @click="load_spin" @click.prevent="AprobarSolicitudIngOym()" class="btn btn-success btn-block" style="font-size: 17px;">
                                                Ingresar a flujo normal
                                            </button>
                                         
                                        </div>
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <div style="margin-top: 8px;">
                                    </div>
                                    <!-- GESTIONAR SOLICITUD -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="opcionGestionar == 1 && solicitud.proceso_id != 14 && solicitud.subestado_id != 14 && solicitud.proceso_id != 13">
                                            <button @click="load_spin" @click.prevent="gestion" class="btn btn-block" style="font-size: 17px;background-color:rgb(30, 94, 152); color:white">
                                                Gestionar
                                            </button>
                                        </div>
                                    </div>
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="opcionGestionar == 1 && solicitud.subestado_id == 14">
                                            <button @click="load_spin" @click.prevent="gestionEnd" class="btn btn-secondary btn-block" style="font-size: 17px;">
                                                Finalizar gestión
                                            </button>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px;">
                                    </div>
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ----------------------------------------------------------------- -->
                                    <!-- ANULAR SOLICITUD -->
                                    <div v-if="load_data == 0">
                                        <div class="barlow semi_bold" v-if="opcionAnular == 1 && solicitud.proceso_id != 14 && solicitud.proceso_id != 13">
                                            <button @click.prevent="modalAnular(solicitud)" class="btn btn-secondary btn-block" style="font-size: 17px;">
                                                Anular
                                            </button>
                                        </div>
                                    </div>
                                    <div class="barlow semi_bold" style="margin-top: 8px;" v-if="duplicateRequestOption == 1 && solicitud.proceso_id != 14 && solicitud.proceso_id != 13" >
                                        <button @click="question" class="btn btn-primary btn-block" style="font-size: 17px;">
                                            Duplicar solicitud
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    {{solicitud.tipo_boleta ? solicitud.tipo_boleta.descripcion :''}}
                                    <a @click.prevent="ModalContableEdit(solicitud)" href="#" style="color: #005cff" v-if="solicitud.boleta!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditBoleta==1">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.boleta!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" id="boleta" style="color: white;" v-clipboard:copy="solicitud.boleta">
                                        {{solicitud.boleta}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.boleta==null">
                                <button @click.prevent="ModalContableEdit(solicitud)" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="opcionEditBoleta==1">
                                    <i class="fas fa-plus">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    NRO°CESTA
                                    <a @click.prevent="showModalEditCesta(solicitud)" href="" style="color: #005cff" v-if="solicitud.cesta!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditCesta==1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.cesta!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" style="color: white;" v-clipboard:copy="solicitud.cesta">
                                        {{solicitud.cesta}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.cesta==null">
                                <div v-if="opcionEditCesta==1">
                                    <button @click.prevent="showModalEditCesta(solicitud)" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id ==6">
                                        <i class="fas fa-plus">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    NRO°OC
                                    <a @click.prevent="showModalEditOc(solicitud)" href="" style="color: #005cff" v-if="solicitud.oc!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditOc== 1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.oc!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" style="color: white;" v-clipboard:copy="solicitud.oc">
                                        {{solicitud.oc}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.oc==null">
                                <div v-if="opcionEditOc== 1">
                                    <button @click.prevent="showModalEditOc(solicitud)" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id ==1">
                                        <i class="fas fa-plus">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    NRO°DAS
                                    <a @click.prevent="showModalEditDAS(solicitud)" href="" style="color: #005cff" v-if="solicitud.DAS!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditDas==1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.DAS!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" style="color: white;" v-clipboard:copy="solicitud.DAS">
                                        {{solicitud.DAS}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.DAS==null">
                                <div v-if="opcionEditDas==1">
                                    <button @click.prevent="showModalEditDAS(solicitud)" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="solicitud.proceso_id == 2 && solicitud.subestado_id ==2  ">
                                        <i class="fas fa-plus">
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    COTIZACIÓN
                                    <a @click.prevent="showModalEditCotizacion()" href="" style="color: #005cff" v-if="solicitud.cotizacion!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditCotizacion==1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.cotizacion!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" style="color: white;" v-clipboard:copy="solicitud.cotizacion">
                                        {{solicitud.cotizacion}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.cotizacion==null">
                                <button @click.prevent="showModalEditCotizacion()" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="opcionEditCotizacion==1">
                                    <i class="fas fa-plus">
                                    </i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2 " v-for="solicitud in solicitudes">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    EWORK
                                    <a @click.prevent="showModalEditEwork()" href="" style="color: #005cff" v-if="solicitud.ework!=null">
                                        <i class="fas fa-edit boxBounce" style="font-size: 15px;" v-if="opcionEditEwork==1 && solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                        </i>
                                    </a>
                                </h4>
                            </div>
                            <div v-if="solicitud.ework!=null">
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a @click.prevent="estadoCopia" href="#" style="color: white;" v-clipboard:copy="solicitud.ework">
                                        {{solicitud.ework}}
                                    </a>
                                </span>
                            </div>
                            <div v-if="solicitud.ework==null">
                                <button @click.prevent="showModalEditEwork()" class="btn boxBounce" style="color: white;font-size: 15px; background-color: #1d548a" v-if="opcionEditEwork==1">
                                    <i class="fas fa-plus">
                                    </i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section" v-if="mul_das.length != 0">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-2 " v-for="d in mul_das">
                            <div class="ticket-title barlow semi_bold">
                                <h4 style="color:#191919;font-size: 16px;">
                                    NRO°DAS
                                </h4>
                            </div>
                            <div>
                                <span class="badge boxBounce" style="border-radius: 5px;font-size: 16px; background-color: #1d548a">
                                    <a href="#" style="color: white;">
                                        {{d.das}}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class=" row">
                <div class="col-12 col-sm-6 col-lg-8">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                            <div class="card-icon">
                                <i class="fas fa-archive" style="color: #42E8B4;font-size: ;margin-left: -170px;margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Archivos
                                <button @click.prevent="showModalUploadFiles()" v-if="opcionUploadFiles==1">
                                    <i class="fas fa-upload boxBounce " style="font-size: 28px; color:#42E8B4">
                                    </i>
                                </button>
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Lista de archivos
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="gallery gallery-md" style="min-height:450px;">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(1)" aria-controls="cotizaciones" aria-selected="true" class="nav-link active" data-toggle="tab" href="#cotizaciones" id="cotizaciones-tab" role="tab" style="color: #1e5e98">
                                                    Cotizaciones
                                                    <span class="badge badge-info" v-if="Total_files.cotizacion!= 0">
                                                        {{Total_files.cotizacion}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(2)" aria-controls="informe" aria-selected="false" class="nav-link" data-toggle="tab" href="#informe" id="Informe-tab" role="tab" style="color: #1e5e98">
                                                    Informe Final
                                                    <span class="badge badge-info" v-if="Total_files.informe_final!= 0">
                                                        {{Total_files.informe_final}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(4)" aria-controls="guia" aria-selected="false" class="nav-link" data-toggle="tab" href="#guia" id="guia-tab" role="tab" style="color: #1e5e98">
                                                    Guía de despacho
                                                    <span class="badge badge-info" v-if="Total_files.guia_despacho!= 0">
                                                        {{Total_files.guia_despacho}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(6)" aria-controls="lpu" aria-selected="false" class="nav-link" data-toggle="tab" href="#lpu" id="lpu-tab" role="tab" style="color: #1e5e98">
                                                    LPU
                                                    <span class="badge badge-info" v-if="Total_files.lpu!= 0">
                                                        {{Total_files.lpu}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(7)" aria-controls="mail" aria-selected="false" class="nav-link" data-toggle="tab" href="#mail" id="mail-tab" role="tab" style="color: #1e5e98">
                                                    Mail
                                                    <span class="badge badge-info" v-if="Total_files.mail!= 0">
                                                        {{Total_files.mail}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(8)" aria-controls="adjudicación" aria-selected="false" class="nav-link" data-toggle="tab" href="#adjudicación" id="adjudicación-tab" role="tab" style="color: #1e5e98">
                                                    Carta de adjudicación
                                                    <span class="badge badge-info" v-if="Total_files.carta_adjudicacion!= 0">
                                                        {{Total_files.carta_adjudicacion}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(9)" aria-controls="parcial" aria-selected="false" class="nav-link" data-toggle="tab" href="#parcial" id="parcial-tab" role="tab" style="color: #1e5e98">
                                                    Informe liberación de pago
                                                    <span class="badge badge-info" v-if="Total_files.informe_parcial!= 0">
                                                        {{Total_files.informe_parcial}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(17)" aria-controls="validacion_compras" aria-selected="false" class="nav-link" data-toggle="tab" href="#validacion_compras" id="validacion_compras-tab" role="tab" style="color: #1e5e98">
                                                    Validación de compras
                                                    <span class="badge badge-info" v-if="Total_files.validacion_compras != 0">
                                                       {{Total_files.validacion_compras}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(5)" aria-controls="otros" aria-selected="false" class="nav-link" data-toggle="tab" href="#otros" id="otros-tab" role="tab">
                                                    Otros
                                                    <span class="badge badge-info" v-if="Total_files.otros!= 0">
                                                        {{Total_files.otros}}
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent" style="margin-top: 40px;">
                                            <div class="d-flex justify-content-center" style="margin-top: 100px;" v-if="load_data_archivos == 1">
                                                <div class="spinner-border text-primary" role="status" style="width: 12rem;height: 12rem;color: #007bff!important;">
                                                </div>
                                            </div>
                                            <div aria-labelledby="cotizaciones-tab" class="tab-pane fade show active" id="cotizaciones" role="tabpanel" v-if="load_data_archivos == 0">
                                                <div class="row">
                                                    <div class="col-lg-2" v-for="archivo in archivos" v-if="archivo.tipo_archivo_id == typeFile">
                                                        <div class="col text-center">
                                                            <a :href="'/archivosSgc/'+archivo.nombre_archivo" target="blank_">
                                                                <div class="browser boxBounce">
                                                                    <i :class="archivo.class" style="font-size: 55px;color:#191919">
                                                                    </i>
                                                                </div>
                                                                <div class="mt-2 font-weight-bold">
                                                                    {{archivo.nombre_archivo}}
                                                                </div>
                                                            </a>
                                                            <button @click.prevent="DeleteArchivos(archivo)" class="btn btn-danger" v-if="opcionDeleteFiles==1">
                                                                Eliminar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-hero chat-box shadow-box-ag" id="mychatbox">
                        <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                            <div class="card-icon">
                                <i class="fas fa-comment-alt" style="color: #42E8B4;font-size: ;margin-left: -170px;margin-top: 30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Bitácora
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Información de cambios
                            </div>
                        </div>
                        <div class="card-body chat-content ">
                            <div v-for="bitacora in bitacoras">
                                <div class="chat-item chat-left" style="">
                                    <img v-bind:src="bitacora.user.avatar"/>
                                    <div class="chat-details">
                                        <div class="chat barlow bold">
                                            {{bitacora.user.name}} {{bitacora.user.apellido}}
                                        </div>
                                        <div class="chat-text barlow semi_bold">
                                            {{bitacora.mensaje}}
                                        </div>
                                        <div class="chat-time barlow regular">
                                            {{formato2(bitacora.created_at)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer chat-form">
                            <form v-on:submit.prevent="EnviarMensaje">
                                <input class="form-control" id="descripcion" name="descripcion" placeholder="Escribe un mensaje" required="true" type="text" v-model="mensaje_bitacora"/>
                                <button class="btn btn-primary" type="submit">
                                    <i class="far fa-paper-plane" style="color:white">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6 col-12 " v-for="solicitud in solicitudes" v-if="solicitud.area_creadora_id == 1">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                            <div class="card-icon">
                                <i class="far fa-money-bill-alt" style="color: #42E8B4;font-size: ;margin-right: 40px; margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Montos solicitados
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Listado de liberaciones de pago
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive table project-list">
                                <table class="table table-striped table-md table-hover" v-if="load_function_data_delete == 0">
                                    <thead>
                                        <tr>
                                            <th class="barlow bold text_c">
                                                Monto total
                                            </th>
                                            <th class="barlow bold text_c">
                                                Monto solicitado en pesos
                                            </th>
                                            <th class="barlow bold text_c">
                                                Monto solicitado en %
                                            </th>
                                            <th class="barlow bold text_c">
                                                Monto restante
                                            </th>
                                            <th class="barlow bold text_c">
                                                Fecha de solicitud
                                            </th>
                                            <th class="barlow bold ">
                                                Estado
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="monto_solicitado in montos_solicitados">
                                            <td class="barlow regular text_c">
                                                ${{monto_solicitado.monto_total | currency}}
                                            </td>
                                            <td class="barlow regular text_c">
                                                ${{monto_solicitado.monto_solicitado | currency}}
                                            </td>
                                            <td class="barlow regular text_c">
                                                {{monto_solicitado.monto_solicitado_porcentaje }}
                                            </td>
                                            <td class="barlow regular text_c">
                                                ${{monto_solicitado.monto_restante | currency}}
                                            </td>
                                            <td class="barlow regular text_c">
                                                {{formato(monto_solicitado.created_at )}}
                                            </td>
                                            <td>
                                                <div v-if="monto_solicitado.estado == 1">
                                                    <span class="badge badge-warning barlow regular text_c" style="border-radius: 5px;font-size: 13px">
                                                        Pendiente
                                                    </span>
                                                </div>
                                                <div v-if="monto_solicitado.estado == 2">
                                                    <span class="badge badge-success barlow regular text_c" style="border-radius: 5px;font-size: 13px">
                                                        Aprobado
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <button @click.prevent="eliminar_monto(monto_solicitado.id)" class="btn btn-danger" v-if="eliminar_liberacion==1">
                                                    <i class="fas fa-times-circle">
                                                    </i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 col-md-12 col-sm-12" v-if="load_function_data_delete == 1">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="d-flex justify-content-center">
                                                    <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6 col-12 " id="billist" v-for="solicitud in solicitudes" v-if="solicitud.cuenta_id == null && ver_cuentas == 1 || edit_cuenta == 1 && ver_cuentas == 1">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign" style="color: #42E8B4;font-size: ;margin-left: -170px;margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Cuentas
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Listado de cuentas
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive table project-list">
                                <table class="table table-striped table-md table-hover" v-if="load_function_data_cuentas == 0">
                                    <thead>
                                        <tr>
                                            <th>
                                            </th>
                                            <th class="barlow bold">
                                                Nro° de cuenta
                                            </th>
                                            <th class="barlow bold">
                                                Nombre
                                            </th>
                                            <th class="barlow bold">
                                                Monto utilizado
                                            </th>
                                            <th class="barlow bold">
                                                Monto disponible
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="bill in Bills.cuenta1">
                                            <td>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input @click.prevent="SetCuenta(bill)" class="selectgroup-input" name="" type="radio">
                                                            <span class="selectgroup-button selectgroup-button-icon">
                                                                <i class="fas fa-check">
                                                                </i>
                                                            </span>
                                                        </input>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="barlow regular">
                                                {{bill.cuenta}}
                                            </td>
                                            <td class="barlow regular">
                                                {{bill.Descripcion}}
                                            </td>
                                            <td class="barlow regular">
                                                ${{bill.montoutilizado | currency}}
                                            </td>
                                            <td class="barlow regular">
                                                ${{bill.montodisponible | currency}}
                                            </td>
                                        </tr>
                                        <tr v-for="billTwo in Bills.cuenta2">
                                            <td>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input @click.prevent="SetCuenta(billTwo)" class="selectgroup-input" name="" type="radio">
                                                            <span class="selectgroup-button selectgroup-button-icon">
                                                                <i class="fas fa-check">
                                                                </i>
                                                            </span>
                                                        </input>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{billTwo.cuenta}}
                                            </td>
                                            <td>
                                                {{billTwo.Descripcion}}
                                            </td>
                                            <td>
                                                ${{billTwo.montoutilizado | currency}}
                                            </td>
                                            <td>
                                                ${{billTwo.montodisponible | currency}}
                                            </td>
                                        </tr>
                                        <tr v-for="billThree in Bills.cuenta3">
                                            <td>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input @click.prevent="SetCuenta(billThree)" class="selectgroup-input" name="" type="radio">
                                                            <span class="selectgroup-button selectgroup-button-icon">
                                                                <i class="fas fa-check">
                                                                </i>
                                                            </span>
                                                        </input>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{billThree.cuenta}}
                                            </td>
                                            <td>
                                                {{billThree.Descripcion}}
                                            </td>
                                            <td>
                                                ${{billThree.montoutilizado | currency}}
                                            </td>
                                            <td>
                                                ${{billThree.montodisponible | currency}}
                                            </td>
                                        </tr>
                                        <tr v-for="billFour in Bills.cuenta4">
                                            <td>
                                                <div class="selectgroup w-100">
                                                    <label class="selectgroup-item">
                                                        <input @click.prevent="SetCuenta(billFour)" class="selectgroup-input" name="" type="radio">
                                                            <span class="selectgroup-button selectgroup-button-icon">
                                                                <i class="fas fa-check">
                                                                </i>
                                                            </span>
                                                        </input>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                {{billFour.cuenta}}
                                            </td>
                                            <td>
                                                {{billFour.Descripcion}}
                                            </td>
                                            <td>
                                                ${{billFour.montoutilizado | currency}}
                                            </td>
                                            <td>
                                                ${{billFour.montodisponible | currency}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 col-md-12 col-sm-12" v-if="load_function_data_cuentas == 1">
                                    <div class="card" style="box-shadow: 0 0px 0px rgba(0, 0, 0, 0);">
                                        <div class="card-body">
                                            <div class="empty-state" data-height="400">
                                                <div class="d-flex justify-content-center">
                                                    <div class="spinner-border text-primary" role="status" style="width: 8rem;height: 8rem;color: #007bff!important;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6 col-12 " id="cuenta_asociada" v-for="solicitud in solicitudes" v-if="solicitud.cuenta_id != null && ver_cuentas == 1">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#1e5e98 ,#0f0c29);">
                            <div class="card-icon">
                                <i class="fas fa-dollar-sign" style="color: #42E8B4;font-size: ;margin-left: -170px;margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Cuenta
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Cuenta asociada
                            </div>
                        </div>
                        <div class="card-body">
                            <div class=" table-responsive table project-list">
                                <table class="table table-striped table-md table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                            </th>
                                            <th>
                                                Nro° de cuenta
                                            </th>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Monto utilizado
                                            </th>
                                            <th>
                                                Monto disponible
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="Associate in billAssociate">
                                            <td>
                                                <a @click.prevent="EditCuenta" href="#" style="color: #005cff">
                                                    <i class="fas fa-edit boxBounce" style="font-size: 20px;">
                                                    </i>
                                                </a>
                                            </td>
                                            <td>
                                                {{Associate.cuenta}}
                                            </td>
                                            <td>
                                                {{Associate.Descripcion}}
                                            </td>
                                            <td>
                                                ${{Associate.montoutilizado | currency}}
                                            </td>
                                            <td>
                                                ${{Associate.montodisponible | currency}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ediciondatoscontables>
            </ediciondatoscontables>
            <form-oym>
            </form-oym>
            <form-ing-sgc>
            </form-ing-sgc>
            <modal-edit-user>
            </modal-edit-user>
            <modal-area-edit>
            </modal-area-edit>
            <modal-edit-descripcion>
            </modal-edit-descripcion>
            <modal-edit-site>
            </modal-edit-site>
            <modal-edit-proveedor>
            </modal-edit-proveedor>
            <modal-edit-tipo-trabajo-oym>
            </modal-edit-tipo-trabajo-oym>
            <modal-edit-costo>
            </modal-edit-costo>
            <modal-edit-cesta>
            </modal-edit-cesta>
            <modal-edit-oc>
            </modal-edit-oc>
            <modal-edit-das>
            </modal-edit-das>
            <modal-anular-solicitud>
            </modal-anular-solicitud>
            <modal-finalizar-solicitud>
            </modal-finalizar-solicitud>
            <modal-rechazo-solicitud>
            </modal-rechazo-solicitud>
            <modal-upload-files>
            </modal-upload-files>
            <modal-edit-cotizacion>
            </modal-edit-cotizacion>
            <modal-edit-ework>
            </modal-edit-ework>
            <modal-edit-responsable-pago>
            </modal-edit-responsable-pago>
            <modal-edit-pm-proyecto>
            </modal-edit-pm-proyecto>
            <modal-edit-pm-interno>
            </modal-edit-pm-interno>
            <modal-edit-solicitante>
            </modal-edit-solicitante>
            <modal-edit-tipo-pago>
            </modal-edit-tipo-pago>
            <modal-edit-pgpon>
            </modal-edit-pgpon>
            <modal-solicitud-monto>
            </modal-solicitud-monto>
            <modal-aprobacion-monto :aprobar_liberaciones="aprobar_liberaciones" :montos_pendientes="montos_solicitados">
            </modal-aprobacion-monto>
            <modal-edit-tipo-trabajo-ing>
            </modal-edit-tipo-trabajo-ing>
            <modal-edit-cod-sap>
            </modal-edit-cod-sap>
            <modal-add-ticket-id>
            </modal-add-ticket-id>
            <modal-edit-fecha-ejecucion>
            </modal-edit-fecha-ejecucion>
            <modal-edit-formato-pago>
            </modal-edit-formato-pago>
            <modal-edit-numero-ticket>
            </modal-edit-numero-ticket>
            <modal-edit-name-project>
            </modal-edit-name-project>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';
import EventBus from "./event-bus"
import editdatoscontables from './datoscontables.vue'
import modaluseredit from './modals/edituser.vue';
import modalareaedit from './modals/editareatrabajo.vue';
import modaldescripciondit from './modals/editardescripcion.vue';
import modaldeditsite from './modals/editsite.vue';
import modaldeditproveedor from './modals/editproveedor.vue';
import modaldedittipotrabajo from './modals/edittipotrabajooym.vue';
import modaldeditmonto from './modals/editcosto.vue';
import modaldeditCesta from './modals/editcesta.vue';
import modaldeditOc from './modals/ocedit.vue';
import modaldeditDAS from './modals/editdas.vue';
import modalanular from './modals/modalanular.vue';
import modalfinalizar from './modals/modalfinalizar.vue';
import modalrechazo from './modals/modalrechazo.vue';
import modalUpload from './modals/modaluploadfiles.vue'
import modalCotizacion from './modals/editCotizacion.vue'
import modalEwork from './modals/eworkEdit.vue'
import modalEditResponsable from './modals/editresponsablepago.vue'
import modalEditPmProyecto from './modals/editpmproyecto.vue'
import modalEditPminterno from './modals/editpminterno.vue'
import modalEditSolicitante from './modals/editarsolicitante.vue'
import modalEditTipoPago from './modals/editartipopago.vue'
import modalEditPGpon from './modals/editpgpon.vue'
import modalSolicitudMonto from './modals/solicitudmonto.vue'
import modalAprobacionMonto from './modals/modalaprobarmonto.vue'
import modaEditTipoTrabajoIng from './modals/editar_tipo_trabajo_ing.vue'
import modaEditCodSap from './modals/edit_cod_sap.vue'
import modaladdticket from './modals/add_n_ticket.vue'
import modalEditFechaEjecucion from './modals/modal_edit_fecha_ejecucion.vue'
import modaleditformatoPago from './modals/modal_edit_formato_pago.vue'
import modaleditNumeroTicket from './modals/editarNumeroTicket.vue'
import editNombreProject from './modals/EditarNombreProyecto.vue'
import formoym from'./formOym.vue';
import formsgcing from'./formSgcing.vue'

export default {
      props: [ 'permisos','cargo_id','solicitud'],
      components: {
          
            'ediciondatoscontables':editdatoscontables,
            'form-oym':formoym,
            'form-ing-sgc':formsgcing,
            'modal-edit-user':modaluseredit,
            'modal-area-edit':modalareaedit,
            'modal-edit-descripcion':modaldescripciondit,
            'modal-edit-site':modaldeditsite,
            'modal-edit-proveedor':modaldeditproveedor,
            'modal-edit-tipo-trabajo-oym':modaldedittipotrabajo,
            'modal-edit-costo':modaldeditmonto,
            'modal-edit-cesta':modaldeditCesta,
            'modal-edit-oc':modaldeditOc,
            'modal-edit-das':modaldeditDAS,
            'modal-anular-solicitud':modalanular,
            'modal-finalizar-solicitud':modalfinalizar,
            'modal-rechazo-solicitud':modalrechazo,
            'modal-upload-files':modalUpload,
            'modal-edit-cotizacion':modalCotizacion,
            'modal-edit-ework':modalEwork,
            'modal-edit-responsable-pago':modalEditResponsable,
            'modal-edit-pm-proyecto':modalEditPmProyecto,
            'modal-edit-pm-interno':modalEditPminterno,
            'modal-edit-solicitante':modalEditSolicitante,
            'modal-edit-tipo-pago':modalEditTipoPago,
            'modal-edit-pgpon':modalEditPGpon,
            'modal-solicitud-monto':modalSolicitudMonto,
            'modal-aprobacion-monto':modalAprobacionMonto,
            'modal-edit-tipo-trabajo-ing':modaEditTipoTrabajoIng,
            'modal-edit-cod-sap':modaEditCodSap,
            'modal-add-ticket-id':modaladdticket,
            'modal-edit-fecha-ejecucion':modalEditFechaEjecucion,
            'modal-edit-formato-pago':modaleditformatoPago,
            'modal-edit-numero-ticket':modaleditNumeroTicket,
            'modal-edit-name-project':editNombreProject

           
           

        },
    data(){
        return{
              solicitudId:'',
              solicitudes:[],
              solicitudSearch:'',
              copiaOk: false,
              Totalcotizacion:'',
              informeFinal:'',
              guiaDespacho:'',
              lpu:'',
              Mail:'',
              adjudicacion:'',
              informeParcial:'',
              archivos:[],
              typeFile:1,
              otro:'',
              bitacoras:[],
              nombre:'',
              id_slc_modal:'',
    
              opcionValidador:'',
              opcionJefeArea:'',
              opcionControlOym:'',
              opcionGestionar:'',
              opcionAnular:'',
              opcionIngOym:'',
              opcionPmo:'',
              opcionEdituser:'',
              opcionEditArea:'',
              opcionEditTipoTrabajo:'',
              opcionEditDescripcion:'',
              opcionEditSitio:'',
              opcionEditProveedor:'',
              opcionEditBoleta:'',
              opcionEditCesta:'',
              opcionEditOc:'',
              opcionEditCotizacion:'',
              opcionEditEwork:'',
              opcionUploadFiles:'',
              opcionDeleteFiles:'',
              opcionEditDas:'',
              Bills:[],
              BillTwo:[],
              BillThree:[],
              BillFour:[],
              billAssociate:[],
              edit_cuenta:0,
              tp:[],
              opcionEditResponsable:'',
              opcionEditPmProyecto:'',
              opcionEditPmInterno:'',
              opcionEditSolicitante:'',
              opcionEditTipoPago:'',
              opcionEditPGpon:'',
              mensaje_bitacora:'',
              montos_solicitados:[],
              total_montos_pendientes:'',
              mul_das:[],
              Total_files:'',
              BuscarSolicitud:0,
              texto_solicitud:'',
              copy_data_cesta:0,
              finalizar_solicitud:'',
              ver_liberaciones:'',
              aprobar_liberaciones:'',
              eliminar_liberacion:'',
              load_data:0,
              editar_codigo_sap:0,
              ver_cuentas:0,
              opcionEditMonto:0,
              add_ticket_sgc:0,
              load_data_archivos:0,
              opcion_edit_fecha_ejecucion:0,
              load_function_data_delete:0,
              load_function_data_cuentas:0,
              opcionEditarFormato:0,
              duplicateRequestOption:0



        }
    },
     filters: {
    uppercase: function(v) {
      return v.toUpperCase();
    }
    },

    created:function(){
      
          this.solicitudes = this.solicitud
          this.getPermisos()
          this.getBitacora()
          this.GetTotalFiles()
          this.getArchivos()
          this.getMountRequest()
         
     
          this.getCuentas()
          this.getBillAssociate()
        
          this.getTp()
         
        

        

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
        let self = this;
        EventBus.$on('sgc.showRefresh', function () {
     
            self.getshowSolicitud(); // ejecutas el metodo que desees
            self.getBitacora();
         
        });
        EventBus.$on('sgc.getbitacora', function () {
     
            self.getBitacora(); // ejecutas el metodo que desees
            
         
        });
        EventBus.$on('sgc.RefrheshFiles', function () {
            self.getshowSolicitud()
            self.getArchivos()
            self.GetTotalFiles()
            self.getBitacora()
            
         
        });
         EventBus.$on('sgc.refreshMontos', function () {
     
             self.getMountRequest()
         
        });

        EventBus.$on('sgc.load_tab_files', function () {
     
             self.load_data_archivos = 1;
         
        });
        EventBus.$on('sgc.finalizar_load_data', function () {
     
             self.load_data_archivos = 0;
         
        });
        EventBus.$on('sgc.sendMail', function () {
     
            self.sendMail()
        });

        

        window.Echo.channel('logout-session').listen('CloseSessionLogoutEvent',(e)=>{
             window.location.replace("/login");
        });

       

      

         
      


        
    },
    filters: {
         uppercase: function(v) {
         return v.toUpperCase();
         }
    },
    methods:{

        getPermisos:function(){
             

            let ParsePermiso = JSON.parse( this.permisos)
            
            for (var i = 0; i < ParsePermiso.length; i++) {
                let permiso = ParsePermiso[i]
                            
                    if(permiso.permission_id == 100 ){
                         this.opcionValidador = 1;
                    }
                    if(permiso.permission_id == 102 ){
                                this.opcionJefeArea = 1;
                    }
                    if(permiso.permission_id == 81 ){
                                this.opcionControlOym = 1;
                    }
                    if(permiso.permission_id == 109 ){
                                this.opcionGestionar = 1;
                    }
                    if(permiso.permission_id == 77 ){
                                this.opcionAnular = 1;
                    }
                    if(permiso.permission_id == 92 ){
                                this.opcionIngOym = 1;
                    }
                    if(permiso.permission_id == 78 ){
                                this.opcionPmo= 1;
                    }
                    if(permiso.permission_id == 165 ){
                                this.opcionEdituser= 1;
                    }
                    if(permiso.permission_id == 140 ){
                                this.opcionEditArea= 1;
                    }
                    if(permiso.permission_id == 63 ){
                                this.opcionEditTipoTrabajo= 1;
                    }
                    if(permiso.permission_id == 62 ){
                                this.opcionEditDescripcion= 1;
                    }
                    if(permiso.permission_id == 64 ){
                                this.opcionEditSitio= 1;
                    }
                    if(permiso.permission_id == 65 ){
                                this.opcionEditProveedor= 1;
                    }
                    if(permiso.permission_id == 66 ){
                                this.opcionEditMonto= 1;
                    }
                    if(permiso.permission_id == 67 ){
                                this.opcionEditBoleta= 1;
                    }
                    if(permiso.permission_id == 68 ){
                                this.opcionEditCesta= 1;
                    }
                    if(permiso.permission_id == 69 ){
                                this.opcionEditOc= 1;
                    }
                    if(permiso.permission_id == 70 ){
                                this.opcionEditDas= 1;
                    }
                    if(permiso.permission_id == 71 ){
                                this.opcionEditCotizacion= 1;
                    }
                    if(permiso.permission_id == 72 ){
                                this.opcionEditEwork= 1;
                    }
                    if(permiso.permission_id == 73 ){
                                this.opcionUploadFiles= 1;
                    }
                    if(permiso.permission_id == 74 ){
                                this.opcionDeleteFiles= 1;
                    }
                    if(permiso.permission_id == 97){
                        this.opcionEditPmProyecto = 1
                    }

                    if(permiso.permission_id == 170){
                        this.opcionEditResponsable=1
                    }
                    if(permiso.permission_id == 98){
                        this.opcionEditPmInterno=1
                    }
                    if(permiso.permission_id == 99){
                        this.opcionEditSolicitante=1
                    }
                    if(permiso.permission_id == 141){
                        this.opcionEditTipoPago=1
                    }
                    if(permiso.permission_id == 142){
                        this.opcionEditPGpon=1
                    }
                    if(permiso.permission_id == 173){
                        this.BuscarSolicitud=1
                    }
                    if(permiso.permission_id == 176){
                        this.copy_data_cesta =1
                    }
                    if(permiso.permission_id == 90){
                        this.finalizar_solicitud =1
                    }
                    if(permiso.permission_id == 86){
                        this.ver_liberaciones = 1
                    }

                    if(permiso.permission_id == 186){
                        this.aprobar_liberaciones = 1
                    }

                    if(permiso.permission_id == 187){
                        this.eliminar_liberacion = 1
                    }
                    if(permiso.permission_id == 188){
                        this.editar_codigo_sap = 1
                    }
                    if(permiso.permission_id == 189){
                        this.ver_cuentas = 1
                    }
                    if(permiso.permission_id == 190){
                        this.add_ticket_sgc = 1
                    }
                    if(permiso.permission_id == 192){
                        this.opcion_edit_fecha_ejecucion = 1
                    }
                    if(permiso.permission_id == 193){
                        this.opcionEditarFormato = 1
                    }
                    if(permiso.permission_id == 200){
                        this.duplicateRequestOption = 1
                    }

                    


                    
                    
                    
                         
                               

                            

            }
                     
              
        },
        getBitacora:function(){
        
            axios.get('/GetBitacoraSgc/'+this.$route.params.id)
            .then((response) => {

                this.bitacoras = response.data
                
            })


        },

        getshowSolicitud:function(){
            
               axios.get('/getDatosSolicitud/'+this.$route.params.id).then((response)=>{
                  this.solicitudes = response.data
                   
                  
               }).finally(() => this.load_data = 0)   

             
              
        },

        AprobarSolicitudJefeArea:function(){
          axios.get('/update-slc-apr-jefe-area/'+this.$route.params.id).then((response)=>{
              this.getBitacora();
              this.sendMail()
           }).finally(() => this.getshowSolicitud());
         


        },
        AprobarSolicitud:function(){
           axios.get('/aprobarSolicitudOym/'+this.$route.params.id).then((response)=>{
             this.getBitacora();
             this.sendMail()
           }).finally(() => this.getshowSolicitud());
           

                
           
        },
        AprobarSolicitudIngOym:function(){
           axios.get('/updateslcapringoym/'+this.$route.params.id).then((response)=>{
              this.getBitacora();
              this.sendMail()
            }).finally(() => this.getshowSolicitud());
          

              
        },

        AprobarSolicitudValidador:function(){
            axios.get('/update-slc-apr-validador/'+this.$route.params.id).then((response)=>{
                this.getBitacora();
                this.sendMail()
            }).finally( () =>this.getshowSolicitud());
             


        },
        AprobarSolicitudControl:function(){
            axios.get('/update-slc-apr-control/'+this.$route.params.id).then((response)=>{
                this.getBitacora();
                this.sendMail()
            }).finally(() => this.getshowSolicitud());
            

        },

      
   
        formatPrice(value) {
          if (value % 1 == 0) {
              return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          } else {
             let val = (value/1).toFixed(2).replace('.', ',')
             return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
          }
        },
        formato2:function(d){
            return moment(d).format("DD/MM/YY - hh:mm:ss");
        },
        formato:function(d){
            return moment(d).format("DD/MM/YY");
        },
        getTp:function(){
           axios.get('/GetTpRequest/'+this.$route.params.id).then((response)=>{
              this.tp = response.data
           })
        },
        EditCuenta:function(){
         this.edit_cuenta = 1
         document.getElementById('cuenta_asociada').style.display='none'
         document.getElementById('billist').style.display='block'
        },
        EnviarMensaje:function(){
           axios.get(`/SendMessageSgcBitacora?solicitud_id=${this.$route.params.id}&mensaje=${this.mensaje_bitacora}`).then((response)=>{
             this.mensaje_bitacora= ''
             this.getBitacora()
           
           })
        },
        getCuentas:function(){
          axios.get('/GetBillOne').then((response)=>{
             this.Bills = response.data
          })
          


         
        },
         setTexto:function(solicitud){
            if(solicitud.site_id == null){
                   var sitio = 'N/A'
                }else{
                    if(solicitud.site_id != null){
                        var sitio = solicitud.site.nem_site +' '+   solicitud.site.nombre 
                    }
            }
          
            
            if( solicitud.costos_activos != 0 && solicitud.costos_activos!= null ){
                        var costo = solicitud.costos_activos
            }else{
                 if(solicitud.costos_servicios != 0 && solicitud.costos_servicios!= null){
                              var costo = solicitud.costos_servicios
                 }else{
                     if(solicitud.activo_servicio != 0 && solicitud.activo_servicio!= null){
                                  var costo = solicitud.activo_servicio
                    }
                }
            }

            var tipo_modena = solicitud.tipo_moneda.moneda;

                  
            if(solicitud.area_creadora_id != null){
              this.texto_solicitud = 'Descripción:' +' '+ solicitud.descripcion +'\n'+'Nemonico:' +' '+ sitio +'\n'+ 'SGC:'+' '+ solicitud.id +'\n'+'Creador:'+' '+solicitud.user.name+' '+ solicitud.user.apellido  +'\n'+ 'Nombre del proyecto:' +' '+ solicitud.nombre_proyecto_ing +'\n'+  'Monto total Compra:' +' '+ tipo_modena +' '+  costo  
            }else{
               this.texto_solicitud = 'Descripción:' +' '+ solicitud.descripcion +'\n'+'Nemonico:' +' '+ sitio +'\n'+ 'SGC:'+' '+ solicitud.id +'\n'+'Creador:'+' '+solicitud.user.name+' '+ solicitud.user.apellido +'\n'+  'Monto total Compra:' +' '+ tipo_modena +' '+costo 
            }
            

            let mensaje = 'Texto copiado'
            this.toastFunction(mensaje)
         
           
            
        },
        getBillAssociate:function(){
          axios.get(`/GetBillAssociate?solicitud_id=${this.$route.params.id}`).then((response)=>{
              this.billAssociate = response.data
          })
        },
        SetCuenta:function(cuenta){
             this.load_function_data_cuentas = 1;
             axios.get(`/BillRequest?solicitud_id=${this.$route.params.id}&cuenta_id=${cuenta.id}`).then((response)=>{
                   this.edit_cuenta = 0
                   this.getshowSolicitud()
                   this.getBillAssociate()
                    document.getElementById('cuenta_asociada').style.display='block'
             }).finally(() => this.load_function_data_cuentas = 0);
        },
        estadoCopia:function(){
           
            
                let mensaje = 'Texto copiado'
                this.toastFunction(mensaje)
            
        },
        getMountRequest:function(){
            axios.get('/totalMontos/'+this.$route.params.id).then((response)=>{
                this.total_montos_pendientes = response.data;
            })
            axios.get('/montosSolicitados/'+this.$route.params.id).then((response)=>{
                this.montos_solicitados = response.data
            })
            axios.get('/MutliplesDas/'+this.$route.params.id).then((response)=>{
                this.mul_das = response.data
            })
        },
        DeleteArchivos:function(archivo){
            this.load_data_archivos = 1;
            axios.get('/DeleteFileSgc/'+archivo.id).then((response)=>{
              
                this.getArchivos()
                this.GetTotalFiles()
                this.getshowSolicitud();
                this.getBitacora()
            }).finally(() =>this.load_data_archivos = 0);
                

            
        },

        RechazarSolicitud:function(solicitud){
            EventBus.$emit('sgc.modalRechazo',solicitud);

        },
        showModalEditCodSap:function(solicitud){
           EventBus.$emit('sgc.modalEditCodSap',solicitud.id);
        },
        showModalEditSolicitante:function(solicitud){
            EventBus.$emit('sgc.modalSolicitante',solicitud.id);
        },
        showModalEditPGpon:function(solicitud){
            EventBus.$emit('sgc.modalPgopn',solicitud.id);
        },
        showModalEditTipoPago:function(solicitud){
            EventBus.$emit('sgc.modalTipoPago',solicitud.id);
        },
        showModalAprobacionmonto:function(solicitud){
              EventBus.$emit('sgc.AprobarMonto',solicitud);
        },
        showModalEditResponsablePago:function(solicitud){
            EventBus.$emit('sgc.modalResponsablePago',solicitud.id);
        },
        showModalEditPmInterno:function(solicitud){
            EventBus.$emit('sgc.modalPmInterno',solicitud.id);
        },
        showModalEditPmProyecto:function(solicitud){
            EventBus.$emit('sgc.modalPmProyecto',solicitud.id);
        },
        showModalEditUser:function(solicitud){
            EventBus.$emit('sgc.modalEditUser',solicitud.id);

        },
        showModalEditArea:function(solicitud){
            EventBus.$emit('sgc.modalEditAreaTrabajo',solicitud.id);

        },
        showModalEditDescripcion:function(solicitud){
            EventBus.$emit('sgc.modalEditDescripcion',solicitud);

        },
        showModalEditSite:function(solicitud){
            EventBus.$emit('sgc.modalEditSite',solicitud.id);

        },
        showModalEditProveedor:function(solicitud){
            EventBus.$emit('sgc.modalEditProveedor',solicitud.id);

        },
        showModalEditFormato:function(id){
            EventBus.$emit('sgc.modalEditFormatoPago',id);
        },
        add_ticket_modal:function(id){
                  EventBus.$emit('sgc.modalAddTicket',id);
        },
        show_modal_edit_fecha_ejecucion:function(id){
            EventBus.$emit('sgc.modalEditFechaEjecucion',id);
        },
        showModalEditTipoTrabajo:function(solicitud){
            if(solicitud.area_creadora_id == null){
                EventBus.$emit('sgc.modalEditTipoTrabajo',solicitud.id);
            }else{
                if(solicitud.area_creadora_id == 1){
                     EventBus.$emit('sgc.modalEditTipoTrabajoIng',solicitud.id);
                }
            }
           

        },
        showModalEditMontoSolicitud:function(solicitud){
            EventBus.$emit('sgc.modalEditCosto',solicitud);

        },
        showModalEditCesta:function(solicitud){
            EventBus.$emit('sgc.modalEditCesta',solicitud.id)

        },
        showModalEditOc:function(solicitud){
            EventBus.$emit('sgc.modalEditOc',solicitud.id)

        },
        showModalUploadFiles:function(){
            EventBus.$emit('sgc.modalUploadFiles',this.$route.params.id)

        },
        showModalEditCotizacion:function(){
            EventBus.$emit('sgc.modalEditcotizacion',this.$route.params.id)

        },
        ModalSolcitarLiberacion:function(solicitud){
             EventBus.$emit('sgc.SolicitudMonto',solicitud)
        },
        showModalEditEwork:function(){
            EventBus.$emit('sgc.modalEditEwork',this.$route.params.id)

        },
        ModalFacturar:function(solicitud){
              EventBus.$emit('sgc.modalFinalizarSgc',solicitud.id)
        },
        showModalEditDAS:function(solicitud){
            
                     EventBus.$emit('sgc.modalEditDasOyM',solicitud.id);
            
       

        },
        modalAnular:function(solicitud){
                EventBus.$emit('sgc.modalAnularSgc',solicitud.id);
        },
        setFile:function(id){
            this.typeFile = id;
        }, 
       
     
        EsperaPresupuesto:function(){
           axios.get('/Esperapresupuesto/'+this.$route.params.id).then((response)=>{
                
                this.getshowSolicitud();
                this.getBitacora();
           }).finally(() => this.load_data = 0);
        },
        PagoRetenido:function(){
            axios.get('/PagoRetenido/'+this.$route.params.id).then((response)=>{
              
                this.getshowSolicitud();
                this.getBitacora();
           }).finally(() => this.load_data = 0);
        },
        gestion:function(){
               axios.get('/Gestion/'+this.$route.params.id).then((response)=>{
                
                this.getshowSolicitud();
                this.getBitacora();
           }).finally(() => this.load_data = 0);
        },
        gestionEnd:function(){
                axios.get('/GestionEnd/'+this.$route.params.id).then((response)=>{
               
                this.getshowSolicitud();
                this.getBitacora();
           }).finally(() => this.load_data = 0);
        },
        set_falla_movil:function(){
            axios.get('/falla-movil-sgc/'+this.$route.params.id).then((response)=>{
               
                this.getshowSolicitud();
                this.getBitacora();
           }).finally(() => this.load_data = 0);
        },
        ModalContableEdit:function(solicitud){
               
             
                  EventBus.$emit('show.modalEditDatoContable',solicitud.id)
          
               
             
        },

     
       
        getArchivos:function(){
            
            axios.get('/searchArchivoSgc/'+this.$route.params.id)
            .then((response) => {

                this.archivos = response.data
            })

        },


      
        toastSuccess:function(){
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
           })
           Toast.fire({
            type: 'success',
            title: 'Solicitud Aprobada'
           })
        },
        GetTotalFiles:function(){
            
            axios.get('/totalCotizacionesSgc/'+this.$route.params.id).then((response)=>{
                this.Total_files = response.data;
            })
        


        },
        SearchSolicitud:function(){
            this.$router.push('/show/'+this.solicitudSearch)
          
              
        },
        eliminar_monto:function(id){
            this.load_function_data_delete = 1;
            axios.get(`/delete-montos?monto_id=${id}&solicitud_id=${this.$route.params.id}`).then(response=>{
                this.getMountRequest()
                this.getshowSolicitud()
            }).finally(() => this.load_function_data_delete = 0);
        },
      
       
  
        
        CloseShow:function(){
            this.solicitud = []
            document.getElementById('showDataSgc').style.display = 'none'
            
        },

        load_spin:function(){
            
            this.load_data=1;
       
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
        toastFunction: function(messaje) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            type: 'success',
            title: messaje
        })
    },
    question:function(){
        Swal.fire({
         type:'info',   
         title: 'Seguro que desea duplicar esta solicitud',
         showDenyButton: true,
         showCancelButton: true,
         confirmButtonText: 'Aceptar',
         cancelButtonText:'Cancelar',
         denyButtonText: `Don't save`,
       }).then((result) => {
      
         if (result.value ) {
           this.duplicateRequest();
         } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
         }
       })
    },
    duplicateRequest:function(){
        document.getElementById("loadBack").style.display = 'block'
        document.getElementById("showDataSgc").style='position: fixed;'
        let formData = new FormData;
        formData.append('id',this.$route.params.id);
        axios.post('/duplicate-request-sgc',formData).then(response=>{
            document.getElementById("loadBack").style.display = 'none'
            document.getElementById("showDataSgc").style='position: relative;'
            Swal.fire({
             type:'success',   
             title: response.data,
             showDenyButton: true,
             showCancelButton: true,
             confirmButtonText: 'Aceptar'
       
        
           })
        })
    },
    changeStateValidator(type){
        console.log('changeStateValidator')
        axios.get('/change/state/valditor',{
            params:{
                'type':type,
                'solicitud_id':this.$route.params.id
            }
        }).then(response=>{
            this.getshowSolicitud(); 
            this.getBitacora();
            this.sendMail()
        })
    },
    sendMail(){
        axios.get('/send/generic/mail/platform',{
            params:{
                'solicitud_id': this.$route.params.id,
                'plataforma':2
            }
        }).then((response)=>{
            
        })
    },
    reclasificarSolicitud(){
        this.load = 0;
        axios.get('/reclasificar/solicitud',{
            params:{
                'solicitud_id':this.$route.params.id
            }
        }).then(response=>{
            this.getshowSolicitud()
            this.sendMail()
        })
    }
        
        
    }
}
</script>