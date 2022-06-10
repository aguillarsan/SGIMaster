<template>
    <div>
        <div class="main-content">
            <section class="section" v-if="ticket != []">
                <div class="section-header shadow-box-ag">
                    <div class="row">
                        <div class="col-lg-10 col-md-6 col-sm-6 col-12 ">
                            <div class="card-stats-title">
                                <h1 class="barlow bold">
                                    Ticket  {{ticket.tipo_ticket_id == 1 ? 'Conexiones':(ticket.tipo_ticket_id == 2 ? 'Proyectos':'')}} Nro° {{ticket.id}}
                                    <h5 class="barlow semi_bold">
                                        {{ticket.subproceso.descripcion}}
                                    </h5>
                                </h1>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 " style="display: none">
                            <form method="GET" v-on:submit.prevent="GetDatosSearchSlc">
                                <div class="search-element" style="margin-left: ;">
                                    <input aria-label="Search" class="form-control" placeholder="Buscar Ticket" type="text" v-model="idSearch"/>
                                    <button class="btn" style="display: none" type="submit">
                                        <i class="fas fa-search">
                                        </i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-car-battery" style="color: white">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Equipo(s)
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Equipo(s) solicitados
                            </div>
                        </div>
                        <div class="card-body p-0" style="max-height:380px;overflow-y:auto">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-md">
                                            <thead>
                                                <tr class="barlow semi_bold">
                                                    <th>
                                                        Equipo
                                                    </th>
                                                    <th>
                                                        Ítem
                                                    </th>
                                                    <th>
                                                        Características
                                                    </th>
                                                    <th>
                                                        Voltaje
                                                    </th>
                                                    <th>
                                                        Potencia real (W)
                                                    </th>
                                                    <th>
                                                        Tipo de fuente
                                                    </th>
                                                    <th>
                                                        Cantidad
                                                    </th>
                                                    <th>
                                                        Capacidad disyuntor
                                                    </th>
                                                    <th>
                                                        Número de cable interno
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="equipo in equipostickets">
                                                    <td>
                                                        {{equipo.equipo}}
                                                    </td>
                                                    <td>
                                                        {{equipo.item}}
                                                    </td>
                                                    <td>
                                                        {{equipo.caracteristica_dispositivo}}
                                                    </td>
                                                    <td>
                                                        <div v-if="equipo.voltaje_id == 1">
                                                            AC
                                                        </div>
                                                        <div v-if="equipo.voltaje_id == 2">
                                                            DC
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{equipo.potencia_real}}
                                                    </td>
                                                    <td>
                                                        <div v-if="equipo.tipo_fuente_id == 1">
                                                            Simple
                                                        </div>
                                                        <div v-if="equipo.tipo_fuente_id == 2">
                                                            Doble
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{equipo.cantidad_fuente}}
                                                    </td>
                                                    <td>
                                                        {{equipo.capacidad_disyuntor}}
                                                    </td>
                                                    <td>
                                                        {{equipo.cable_interno}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-ticket-alt" style="color: white">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Ticket
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Datos del ticket
                            </div>
                        </div>
                        <div class="card-body p-0" style="max-height:380px;overflow-y:auto">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Solicitante
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.user.name}} {{ticket.user.apellido}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Fecha creación
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{formato(ticket.created_at)}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nombre proyecto
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.nombre_proyecto}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Subgerencia
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.subgerencia ? ticket.subgerencia.subgerencia:''}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Responsable
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.responsable_id}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Fecha implementación
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{formato(ticket.fecha_implementacion)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Cantidad equipos
                                                    <a data-toggle="modal" href="#edit_q_equipos" v-if="rolId == 26 && ticket.subproceso_id == 1 || rolId == 1 || rolId == 10">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.cantidad_equipo}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Tipo de rack
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.tipo_rack_id == 2 ? 'Rack existente':(ticket.tipo_rack_id == 3 ? 'Racks nuevos y existentes':(ticket.tipo_rack_id == 1 ? 'Racks nuevos':'') )}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Cantidad racks
                                                    <a data-toggle="modal" href="#edit_q_racks" v-if="rolId == 26 && ticket.subproceso_id == 1 || rolId == 1 || rolId == 10">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.cantidad_rack ? ticket.cantidad_rack:0}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Potencia total (KiloWatt)
                                                    <a data-toggle="modal" href="#edit_p_total" v-if="rolId == 26 && ticket.subproceso_id == 1 || rolId == 1 || rolId == 10">
                                                        <i class="fas fa-edit">
                                                        </i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.potencia_proyecto}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nro° ework
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.ework}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nro° cesta
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.cesta}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nro° Oc
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.oc}}
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nro° DAS
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.das}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" v-for="tp in tps_data">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    N°Tp <a href="#" @click.prevent="editarTp(tp)"><i class="fas fa-edit"></i></a>
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{tp.tp}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-globe-americas" style="color: white">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                {{ticket.site ? 'Sitio / Sala':(ticket.pop ? 'Pop / Sala':'')}}
                            </h4>
                            <div class="card-description barlow semi_bold">
                                {{ticket.site ? 'Datos del sitio / Sala':(ticket.pop ? 'Datos del  pop / Sala':'')}}
                            </div>
                        </div>
                        <div class="card-body p-0" style="max-height:380px;overflow-y:auto">
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    {{ticket.site ? 'Nemonico':(ticket.pop ? 'Nombre pop':'')}}
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.site ? ticket.site.nem_site:(ticket.pop ? ticket.pop.nombre:'')}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    {{ticket.site ? 'Nombre':(ticket.pop ? 'Dirección':'')}}
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.site ? ticket.site.nombre:(ticket.pop ? ticket.pop.direccion:'')}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Nombre sala
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.room.name}} {{ticket.room.old_name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Coordenada dentro de la sala
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.coordernada_sala}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="ticket-title barlow semi_bold">
                                                <h4 style="color:#191919;">
                                                    Comentario
                                                </h4>
                                            </div>
                                            <div class="barlow regular">
                                                {{ticket.comentario}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag" style="min-height:400px">
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-cog" style="color: white">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Estado
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Estado & gestión del ticket
                            </div>
                        </div>
                        <div class="card-body " style="max-height:480px;overflow-y:auto">
                            <div class="card">
                                <span :style="'background-color:'+ticket.subproceso.color+';' " class="badge " style="width: 100%; height: 80px; border-radius: 4px;color: white ">
                                    <div class="barlow bold" style="font-size: 30px;">
                                        {{ticket.proceso ?ticket.proceso.descripcion:(ticket.proceso_id == 3 ? 'Finallizado':'')}}
                                    </div>
                                    <div class="barlow bold" style="font-size: 22px;margin-top: 5px;" v-if="ticket.subproceso.id != 7">
                                        {{ticket.subproceso.descripcion}}
                                    </div>
                                </span>
                            </div>
                            <div class="tickets-list">
                                <div class="ticket-item">
                                    <div class="row barlow semi_bold" v-if="rolId == 10 || rolId == 1">
                                        <button @click.prevent="AprobarTicketIng()" class="btn btn-success btn-block" v-if="ticket.proceso_id == 1 & ticket.subproceso_id ==1">
                                            <h2 style="font-size: 17px;">
                                                Factibilidad Positiva
                                            </h2>
                                        </button>
                                        <button class="btn btn-secondary btn-block" data-target="#propuestaCambio" data-toggle="modal" v-if="ticket.proceso_id == 1 & ticket.subproceso_id ==1">
                                            <h2 style="font-size: 17px;">
                                                Proponer cambio
                                            </h2>
                                        </button>
                                        <button @click.prevent="setTp()" class="btn btn-info btn-block" id="btnTp" v-if="ticket.proceso_id == 1 & ticket.subproceso_id ==2">
                                            <h2 style="font-size: 17px;">
                                                Ingresar TP
                                            </h2>
                                        </button>
                                    </div>
                                    <div class="row barlow semi_bold" style="margin-top: 10px;" v-if="rolId == 24 || rolId == 26">
                                        <button class="btn btn-info btn-block" data-target="#IngresoEwork" data-toggle="modal" id="btnework" v-if="ticket.proceso_id == 2 & ticket.subproceso_id ==4">
                                            <h2 style="font-size: 17px;">
                                                Ingresar nro° de Ework
                                            </h2>
                                        </button>
                                    </div>
                                    <div class="row barlow semi_bold" style="margin-top: 10px;" v-if="rolId == 24 || rolId == 26">
                                        <button @click="getPropuesta" class="btn btn-info btn-block" data-target="#propuesta_cambio" data-toggle="modal" id="btnework" v-if="ticket.proceso_id == 2 & ticket.subproceso_id ==13">
                                            <h2 style="font-size: 17px;">
                                                Ver propuesta de cambio
                                            </h2>
                                        </button>
                                    </div>
                                    <div class="row barlow semi_bold" style="margin-top: 10px;" v-if="rolId == 24 || rolId == 26 || rolId == 14">
                                        <button class="btn btn-info btn-block" data-target="#IngresoCesta" data-toggle="modal" id="btnework" v-if=" ticket.subproceso_id ==9">
                                            <h2 style="font-size: 17px;">
                                                Ingresar nro° de Cesta
                                            </h2>
                                        </button>
                                    </div>
                                    <div class="row barlo semi_bold" style="margin-top: 10px;" v-if="rolId == 24 || rolId == 26 || rolId == 14">
                                        <button class="btn btn-info btn-block" data-target="#IngresoOc" data-toggle="modal" id="btnework" v-if=" ticket.subproceso_id ==10">
                                            <h2 style="font-size: 17px;">
                                                Ingresar nro° de OC
                                            </h2>
                                        </button>
                                    </div>
                                    <div class="row barlo semi_bold" style="margin-top: 10px;" v-if="rolId == 24 || rolId == 26 || rolId == 14">
                                        <button class="btn btn-info btn-block" data-target="#IngresoDas" data-toggle="modal" id="btnework" v-if=" ticket.subproceso_id ==11">
                                            <h2 style="font-size: 17px;">
                                                Ingresar nro° de DAS
                                            </h2>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6 col-12 ">
                    <div class="card card-hero shadow-box-ag">
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-archive" style="color: white;font-size: ;margin-left: -170px;margin-top: 22px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Archivos
                                <button @click.prevent="UploadFiles()">
                                    <i class="fas fa-upload boxBounce " style="font-size: 30px;color: white">
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
                                                <a @click.prevent="setFile(6)" aria-controls="lpu" aria-selected="false" class="nav-link active" data-toggle="tab" href="#lpu" id="lpu-tab" role="tab">
                                                    LPU
                                                    <span class="badge badge-info" v-if="lpu!= 0">
                                                        {{lpu}}
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a @click.prevent="setFile(15)" aria-controls="ejecucion" aria-selected="false" class="nav-link" data-toggle="tab" href="#ejecucion" id="otros-tab" role="tab">
                                                    Informe Ejecución
                                                    <span class="badge badge-info" v-if="InformeEjecucion!= 0">
                                                        {{InformeEjecucion}}
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div aria-labelledby="cotizaciones-tab" class="tab-pane fade show active" id="cotizaciones" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-2" v-for="archivo in archivos" v-if="archivo.tipo_archivo_id == typeFile">
                                                        <div class="col text-center">
                                                            <a :href="'/TicketeraIngenieria/'+ticket.id+'/'+archivo.nombre_archivo" target="blank_">
                                                                <div class="browser boxBounce">
                                                                    <i :class="getFileExtension(archivo.nombre_archivo) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(archivo.nombre_archivo) == 'xls' || getFileExtension(archivo.nombre_archivo) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(archivo.nombre_archivo) == 'doc' || getFileExtension(archivo.nombre_archivo) == 'docx' ? 'far fa-file-word':( getFileExtension(archivo.nombre_archivo) == 'img' || getFileExtension(archivo.nombre_archivo) == 'jpg' || getFileExtension(archivo.nombre_archivo) == 'jpeg' ||  getFileExtension(archivo.nombre_archivo) == 'png' ? 'far fa-image':'far fa-file')))" style="font-size: 55px;color:#191919;">
                                                                    </i>
                                                                </div>
                                                                <div class="mt-2 font-weight-bold">
                                                                    {{archivo.nombre_archivo}}
                                                                </div>
                                                            </a>
                                                            <button @click.prevent="DeleteArchivos(archivo)" class="btn btn-danger">
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
                        <div class="card-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC);">
                            <div class="card-icon">
                                <i class="fas fa-comment-alt" style="color: white;font-size: ;margin-left: -170px;margin-top: 30px;">
                                </i>
                            </div>
                            <h4 class="barlow bold">
                                Bitácora
                            </h4>
                            <div class="card-description barlow semi_bold">
                                Información de cambios
                            </div>
                        </div>
                        <div class="card-body chat-content" style="max-height:400px;overflow-y:auto">
                            <div class="chat-item chat-left" style="" v-for="bitacora in bitacoras">
                                <img v-bind:src="bitacora.user.avatar"/>
                                <div class="chat-details">
                                    <div class="chat barlow bold">
                                        {{bitacora.user.name}} {{bitacora.user.apellido}}
                                    </div>
                                    <div class="chat-text barlow semi_bold">
                                        {{bitacora.descripcion}}
                                    </div>
                                    <div class="chat-time barlow regular">
                                        {{formato2(bitacora.created_at)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer chat-form">
                            <form method="POST" v-on:submit.prevent="EnviarMensaje">
                                <input class="form-control" id="descripcion" name="descripcion" placeholder="Escribe un mensaje" required="true" type="text" v-model="datoslog.descripcion"/>
                                <button class="btn " style="background-color:#42E8B4;color:white">
                                    <i class="far fa-paper-plane">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="IngresoTp" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background:linear-gradient(rgb(2, 203, 169), rgb(52, 235, 204)); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Ingresar Tp
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Número TP
                                            </label>
                                            <input class="form-control" name="" type="number" v-model="nroTp"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Fecha de ejecución
                                            </label>
                                            <input class="form-control" name="" type="date" v-model="fecha_ejecucion_tp"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Actividad
                                            </label>
                                            <select class="form-control select" v-model="actividad_id">
                                                <option :value="[actividad.id,actividad.descripcion]" v-for="actividad in actividades">
                                                    {{actividad.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Tipo de supervisión
                                            </label>
                                            <select @change.prevent="getSupervisores" class="form-control select" v-model="tipo_supervisor">
                                                <option :value="[2,'Supervisión']">
                                                    Supervisión
                                                </option>
                                                <option :value="[1,'Autosupervisión']">
                                                    Autosupervisión
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Supervisor
                                            </label>
                                            <select class="form-control select" v-model="supervisor_id">
                                                <option :value="[supervisor.id,supervisor.descripcion]" v-for="supervisor in supervisores">
                                                    {{supervisor.descripcion}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="form-inline">
                                            <button @click.prevent="addtp()" class="btn btn-secondary" style="margin-left: 10px;margin-top:28px;">
                                                Agregar
                                                <i class="fas fa-plus">
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class=" table-responsive project-list project-table">
                                            <table class="table table-hover table-bordered table-fixed">
                                                <thead class="st">
                                                    <tr class="barlow bold">
                                                        <th>
                                                            Nro° TP
                                                        </th>
                                                        <th>
                                                            Fecha de ejecución
                                                        </th>
                                                        <th>
                                                            Actividad
                                                        </th>
                                                        <th>
                                                            Tipo de supervisión
                                                        </th>
                                                        <th>
                                                            Supervisor
                                                        </th>
                                                        <th>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(tp , key) in tps">
                                                        <td>
                                                            {{tp.numero}}
                                                        </td>
                                                        <td>
                                                            {{tp.fecha_ejecucion}}
                                                        </td>
                                                        <td>
                                                            {{tp.actividad}}
                                                        </td>
                                                        <td>
                                                            {{tp.tipo_supervision}}
                                                        </td>
                                                        <td>
                                                            {{tp.supervisor}}
                                                        </td>
                                                        <td>
                                                            <a @click.prevent="deleteTp(key)" href="#">
                                                                <i class="far fa-times-circle" style="font-size: 24px; color:red;">
                                                                </i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="barlow semi_bold">
                                                Proveedor
                                            </label>
                                      
                                                <div id="search_proveedor">
                                                    <div class="input-group">
                                                        <input class="form-control " id="SearchproveedorDontDisplay" name="Proveedor" placeholder="Buscar proveedor" type="text" v-model="Buscarproveedor" v-on:keyup="BuscarProveedor"/>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="fas fa-search">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="SelectProveedor" style="display: none">
                                                    <div class="input-group">
                                                        <input class="form-control" disabled="true" name="" style="background-color:rgb(2, 203, 169);color:white;" type="" v-bind:value="proveedor_info_select"/>
                                                        <div class="input-group-append">
                                                            <div @click.prevent="searchNewProveedor()" class="input-group-text " style="cursor: pointer  ">
                                                                <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="s_l" id="listProveedor" style="display: none">
                                                    <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m" :style="'width:'+input_width+'px'+';'" >
                                                        <div v-for="proveedor in Proveedores">
                                                            <a @click.prevent="SelectProveedor(proveedor.id,proveedor.PROVEEDOR)" class="changeColor" href="" id="selectProveedorvalue" style="color: black">
                                                                {{proveedor.PROVEEDOR.toLowerCase()}} - {{proveedor.RUT_PROVEEDOR}}
                                                                <hr style="margin-top: -1px;"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color:white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="IngresoTp" class=" btn btn-primary" style="color:white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="IngresoCesta" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Ingreso cesta
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Nro° cesta
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="cesta">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="IngresoCesta" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="IngresoDas" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Ingreso de DAS
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Nro° de DAS
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="das">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="DASTicketIngenieria" class=" btn btn-primary" style="color: white;" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="IngresoOc" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Ingreso de Oc
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Nro° de Oc
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="oc">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="IngresoOc" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="edit_q_equipos" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Editar cantidad de equipos
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Cantidad de equipos
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="c_equipos"/>
                                            <div id="error_c_equipos" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar la canitdad de equipos
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="editarCantidadEquipos" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="edit_q_racks" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Editar cantidad de racks
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Cantidad de racks
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="c_racks"/>
                                            <div id="error_c_racks" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar la canitdad de racks
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="editarCantidadRacks" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="edit_p_total" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Editar potencia total
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Potencia total (KiloWatt)
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="p_total_kw"/>
                                            <div id="error_p_total" style="display: none">
                                                <p style="color: red">
                                                    Favor indicar la potencia total
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="editarPotenciaTotal" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form>
                <div aria-hidden="true" class="modal inmodal" id="MoreInfoTicket" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Solicitar más información
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Descripción
                                            </label>
                                            <textarea class="form-control" style="height:100px;" v-model="descripcionMoreInfo">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="MoreInfo()" class=" btn btn-primary" style="color: white" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="FacNegativa" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title barlow semi_bold blanco">
                                    Motivo de factibilidad negativa
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Motivo
                                            </label>
                                            <textarea class="form-control" style="height:150px;" v-model="motivo">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary blanco" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="rechazoFactibilidad" class=" btn btn-primary blanco" style="color: white;" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="IngresoEwork" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-sm ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Ingresar nro de ework
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Nro Ework*
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="number" v-model="nroEwork"/>
                                            <div id="errorEwork" style="display: none">
                                                <p style="color: red">
                                                    Favor ingresar el número de ework
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="IngresoNroEwork" class=" btn btn-primary" style="color: white;" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                
                <div aria-hidden="true" class="modal inmodal" id="editarFechaEjecucionTp" role="dialog" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Editar fecha ejecución tp
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Nro TP
                                            </label>
                                            <input class="form-control" disabled="true" name="" required="true" style="width: 100%;" type="number" v-model="nro_tp_edit"/>
                                           
                                        </div>
                                    </div>
                                     <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Fecha de ejecución
                                            </label>
                                            <input class="form-control" name="" required="true" style="width: 100%;" type="date" v-model="fecha_ejecucion_tp_edit"/>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="guardarDatosTp" class=" btn btn-primary" style="color: white;" type="submit">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="propuesta_cambio" role="dialog" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Cambio de sitio
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Sitio
                                            </label>
                                            <input class="form-control" disabled="true" name="" required="true" style="width: 100%;" type="text" v-model="p_sitio"/>
                                        </div>
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Sala
                                            </label>
                                            <input class="form-control" disabled="true" name="" required="true" style="width: 100%;" type="text" v-model="p_sala"/>
                                        </div>
                                        <div class="form-group barlow semi_bold">
                                            <label>
                                                Comentario
                                            </label>
                                            <textarea class="form-control" disabled="true" style="height:150px" v-model="p_comentario">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="actualizarSitioEstado" class=" btn btn-primary" style="color: white;" type="submit">
                                    Aprobar cambio
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form enctype="multipart/form-data" method="POST">
                <div aria-hidden="true" class="modal inmodal" id="propuestaCambio" role="dialog" tabindex="-1">
                    <div class="modal-dialog ">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco">
                                    Propuesta de cambio
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-6 col-12">
                                        <div class="form-group ">
                                            <label>
                                                Sitio*
                                            </label>
                                            <div id="pop_selected" style="display: none">
                                                <div class="input-group">
                                                    <input class="form-control" disabled="true" name="" style="background-color:#42E8B4;color:white;" type="" v-bind:value="site_info_select"/>
                                                    <div class="input-group-append">
                                                        <div @click.prevent="change_site()" class="input-group-text " style="cursor: pointer  ">
                                                            <i class="fas fa-times boxBounce " style="color:#fc544b;font-size: 18px">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="search_pop">
                                                <div class="input-group">
                                                    <input class="form-control" id="intp_site" name="datositio" placeholder="Buscar Sitio" style="position: relative;" type="text" v-model="datositio" v-on:keyup="search_site()" value=""/>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-search">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="listado_sites" style="display: none">
                                                <div :style="'width:'+input_width_form+'px'+';'" class="s_l">
                                                    <div class="col-lg-12 col-md-4 col-sm-4 col-10 s_l_m">
                                                        <div v-for="site in sites">
                                                            <a @click.prevent="select_site(site)" href="" id="selectpopvalue" style="color:black">
                                                                {{site.nem_site}} {{site.nombre}}
                                                                <hr style="margin-top: -1px;"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="error_site" style="display: none">
                                                <p style="color: red">
                                                    Favor seleccionar el sitio
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Sala*
                                            </label>
                                            <select class="form-control select barlow semi_bold" v-model="salaId">
                                                <option disabled="true" selected="true">
                                                    Seleccione
                                                </option>
                                                <option v-bind:value="sala.id" v-for="sala in  salas">
                                                    {{sala.name}}__{{sala.old_name}}
                                                </option>
                                            </select>
                                            <div id="errorSala" style="display: none">
                                                <p style="color: red">
                                                    Favor Seleccionar la sala
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Comentarios*
                                            </label>
                                            <textarea class="form-control" style="height:150px;" v-model="comentario_cambio_sitio">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal" style="color: white;" type="button">
                                    Cerrar
                                </button>
                                <button @click.prevent="enviarPropuesta" class=" btn btn-primary" style="color: white;" type="submit">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST">
                <div aria-hidden="true" class="modal inmodal" id="SubirArchivo" role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header" style="background-image: linear-gradient(#02CBA9 , #34EBCC); height: 70px;">
                                <h5 class="modal-title blanco barlow semi_bold">
                                    Subida de Archivos
                                </h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true" class="blanco">
                                        ×
                                    </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group barlow semi_bold">
                                    <label>
                                        Tipo Archivo
                                    </label>
                                    <select @change.prevent="delete_error" class="form-control select" v-model="tipo_archivo_id">
                                        <option v-bind:value="6">
                                            Lpu
                                        </option>
                                        <option v-bind:value="15">
                                            Informe de ejecución
                                        </option>
                                    </select>
                                    <div id="errorTipoArchivpo" style="display:none">
                                        <p style="color:red">
                                            Favor Indicar el tipo de archivo
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group barlow semi_bold" id="tipo_moneda_lpu" style="display:none">
                                    <label>
                                        Tipo de moneda
                                    </label>
                                    <select class="form-control select" v-model="tipo_moneda_id">
                                        <option :value="1">
                                            CLP
                                        </option>
                                        <option :value="2">
                                            UF
                                        </option>
                                        <option :value="3">
                                            USD
                                        </option>
                                        <option :value="4">
                                            EURO
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group barlow semi_bold" id="monto_lpu" style="display:none">
                                    <label>
                                        Monto LPU
                                    </label>
                                    <currency-input class="form-control " currency="USD" locale="de" v-model="monto_lpu">
                                    </currency-input>
                                </div>
                                <div class="form-group barlow semi_bold" id="textInpu">
                                    <label>
                                        Seleccione o arrastre el archivo
                                    </label>
                                    <input class="form-control" id="files" multiple="" ref="files" required="" type="file" v-on:change="putFiles()"/>
                                    <div id="error_file" style="display:none">
                                        <p style="color:red">
                                            Favor cargar uno o más archivos
                                        </p>
                                    </div>
                                </div>
                                <div class="card" style="border-radius: 5px;" v-if="files.length != 0">
                                    <div class="card-body">
                                        <p class="barlow semi_bold" style="text-align: center;">
                                            {{files.length == 1 ? files.length+' '+'Archivo seleccionado' :(files.length > 1 ? files.length +' '+ 'Archivos seleccionados':'')}}
                                        </p>
                                        <ul class="list-unstyled">
                                            <li class="media" style="margin-top: 10px;" v-for="(file, key) in files">
                                                <i :class="getFileExtension(file.name) == 'pdf' ? 'far fa-file-pdf' : (getFileExtension(file.name) == 'xls' || getFileExtension(file.name) == 'xlsx' ? 'far fa-file-excel':(getFileExtension(file.name) == 'doc' || getFileExtension(file.name) == 'docx' ? 'far fa-file-word':( getFileExtension(file.name) == 'img' || getFileExtension(file.name) == 'jpg' || getFileExtension(file.name) == 'jpeg' ||  getFileExtension(file.name) == 'png' ? 'far fa-image':'far fa-file')))" class="fas fa-file mr-3" style="font-size: 50px;">
                                                </i>
                                                <div class="media-body">
                                                    <p class="barlow regular">
                                                        {{file.name}}
                                                    </p>
                                                </div>
                                                <button class="btn btn-danger mr-3" style="margin-top: 18px;" v-on:click="removeFile( key )">
                                                    <i class="fas fa-window-close">
                                                    </i>
                                                </button>
                                            </li>
                                            <hr/>
                                            <div id="progressBarFileUpoad" style="display: none">
                                                <div class="progress mb-3 " data-height="25">
                                                    <div :style="'width:'+ getProgress" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar bg-info" role="progressbar">
                                                        <div v-if=" getProgress == 'NaN%'">
                                                        </div>
                                                        <div v-if=" getProgress != 'NaN%'">
                                                            {{getProgress}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button @click.prevent="validateForm()" class="btn btn-primary" style="color: white">
                                    Aceptar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import moment from 'moment';
    import EventBus from "../event-bus"
    import Tp from './tp.vue';

    export default {

        props: [ 'code','data' ],
        data() {
                return {
                    ticket:[],
                    solicitud: [],
                    idSearch:'',
                    mensaje:'',
                    nroTp:'',
                    IdSolicitud:'',
                    rolId:'',
                    typeFile:6,
                    cotizacion:'',
                    informeFinal:'',
                    guiaDespacho:'',
                    otro:'',
                    lpu:'',
                    adjudicacion:'',
                    informeParcial:'',
                    Mail:'',
                    informeMantencion:'',
                    archivos:[],
                    bitacoras:[],
                    datoslog:{'descripcion':''},
                    tipoArchivos:[],
                    idTipoArchivo:'',
                    nroEwork:'',
                    motivo:'',
                    InformeEjecucion:'',
                    equipostickets:[],
                    descripcionMoreInfo:'',
                    cesta:'',
                    oc:'',
                    das:'',
                    files:[],
                    tipo_archivo_id:'',
                    porcentaje:{
                      type:Number,
                      default:0
                    },
                    nroTp:'',
                    tps:[],
                    tps_data:[],
                    site_id:'',
                    sites:[],
                    site_info_select:'',
                    datositio:'',
                    salas:'',
                    input_width_form:0,
                    salaId:'',
                    site_id:'',
                    comentario_cambio_sitio:'',
                    p_sitio:'',
                    p_sala:'',
                    p_comentario:'',
                    c_equipos:'',
                    c_racks:'',
                    p_total_kw:'',
                    fecha_ejecucion_tp:'',
                    actividades:[],
                    actividad_id:'',
                    supervisores:[],
                    tipo_supervisor:[],
                    supervisor_id:[],
                    actividad_id:[],
                    monto_lpu:0,
                    tipo_moneda_id:'',
                    proveedor_info_select:'',
                    idproveedor:'',
                    NombreProveedorSelect:'',
                    Buscarproveedor:'',
                    Proveedores:[],
                    input_width:0,
                    nro_tp_edit:'',
                    fecha_ejecucion_tp_edit:'',
                    text:''


                }
            },
            computed:{
                getProgress(){
                    return Math.round(this.porcentaje)+'%'
                }
            },

            created: function() {

              this.equipostickets = this.data.equipos;
              this.ticket = this.data.ticket;
              this.rolId = this.data.rol_id;
              this.tps_data = this.data.tps;
              
              this.getArchivos();
              this.getBitacora();
              this.getExtensions()



            },
            mounted: function() { /* Agrega mounted y con el siguiente contenido */
                let self = this;
                EventBus.$on('bitacora.getBitacora', function() {
                    self.getBitacora(); // ejecutas el metodo que desees
                });


            },
        methods: {
            getRol: function() {
                axios.get('/GetRolUser').then((response) => {
                    this.rolId = response.data;
                })
            },
            editarCantidadEquipos:function(){
               if(this.c_equipos == ''){
                document.getElementById('error_c_equipos').style.display = 'block';
               }else{
                 if(this.c_equipos != ''){
                    let formData = new FormData;
                    formData.append('c_equipos', this.c_equipos);
                    formData.append('ticket_id',this.ticket.id);
                    axios.post('/editar-c-equipos',formData).then(response=>{
                        this.getDatosSlc()
                        this.getBitacora()
                        this.c_equipos = '';
                        let mensaje = 'La cantidad de equipos fue editada'
                        this.successMessaje(mensaje)
                        $('#edit_q_equipos').modal('hide')
                    })
                 }
               }
            },
            getSupervisores:function(){
                axios.get(`/get-supervisor?tipo_supervisor=${this.tipo_supervisor}`).then(response=>{
                       this.supervisores = response.data;
                })
            },
            editarTp:function(tp){
              this.nro_tp_edit = tp.tp;
              this.fecha_ejecucion_tp_edit = tp.fecha_ejecucion_tp;
              this.tp_id = tp.id;
              $("#editarFechaEjecucionTp").modal('show');
            },
            guardarDatosTp:function(){
                if(this.fecha_ejecucion_tp_edit != null){
                    let formData = new FormData;
                    formData.append('fecha_ejecucion_tp',  this.fecha_ejecucion_tp_edit);
                    formData.append('tp_id',  this.tp_id);
                    axios.post('/editar-fecha-ejecucion-tp',formData).then(response=>{
                      $("#editarFechaEjecucionTp").modal('hide');
                      this.nro_tp_edit = '';
                      this.fecha_ejecucion_tp_edit = '';
                      this.tp_id = '';
                       this.load_function();
                        this.getDatosSlc();
                         this.getBitacora();
                    })
                }
              
            },
            editarCantidadRacks:function(){
               if(this.c_racks == ''){
                document.getElementById('error_c_racks').style.display = 'block';
               }else{
                 if(this.c_racks != ''){
                    let formData = new FormData;
                    formData.append('c_racks', this.c_racks);
                    formData.append('ticket_id',this.ticket.id);
                    axios.post('/editar-c-racks',formData).then(response=>{
                        this.getDatosSlc()
                        this.getBitacora()
                        this.c_equipos = '';
                        let mensaje = 'La cantidad de racks fue editada'
                        this.successMessaje(mensaje)
                        $('#edit_q_racks').modal('hide')
                    })
                 }
               }
            },
             editarPotenciaTotal:function(){
               if(this.p_total_kw == ''){
                document.getElementById('error_p_total').style.display = 'block';
               }else{
                 if(this.p_total_kw != ''){
                    let formData = new FormData;
                    formData.append('p_total_kw', this.p_total_kw);
                    formData.append('ticket_id',this.ticket.id);
                    axios.post('/editar-p-proyecto',formData).then(response=>{
                        this.getDatosSlc()
                        this.getBitacora()
                        this.c_equipos = '';
                        let mensaje = 'La potencia total fue editada'
                        this.successMessaje(mensaje)
                        $('#edit_p_total').modal('hide')
                    })
                 }
               }
            },
            getActividades:function(){
                axios.get('/get-activdades-ticket').then(response=>{
                    this.actividades = response.data;
                })
            },
            MoreInfo: function() {
                if (this.descripcionMoreInfo != '') {
                    axios.get(`/moreInfo?descripcion=${this.descripcionMoreInfo}&id=${this.ticket.id}`).then((response) => {
                        this.getDatosSlc()
                        this.getBitacora()
                        $('#MoreInfo').modal('hide')
                    })
                }
            },
            IngresoCesta: function() {
                if (this.cesta != '') {
                    axios.get(`/CestaTicketIngenieria?cesta=${this.cesta}&ticket_id=${this.ticket.id}`).then((response) => {
                        this.getDatosSlc()
                        this.getBitacora()
                        $('#IngresoCesta').modal('hide')
                    })
                } else {
                    if (this.cesta == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debes ingresar un número de cesta.',
                            showCloseButton: true,
                        });
                    }
                }
            },
            IngresoOc: function() {
                if (this.oc != '') {
                    axios.get(`/OcTicketIngenieria?oc=${this.oc}&ticket_id=${this.ticket.id}`).then((response) => {
                        this.getDatosSlc()
                        this.getBitacora()
                        $('#IngresoOc').modal('hide')
                    })
                } else {
                    if (this.oc == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debes ingresar un número de OC.',
                            showCloseButton: true,
                        });
                    }
                }
            },
            DASTicketIngenieria: function() {
                if (this.das != '') {
                    axios.get(`/DASTicketIngenieria?das=${this.das}&ticket_id=${this.ticket.id}`).then((response) => {
                        this.getDatosSlc()
                        this.getBitacora()
                        $('#IngresoDas').modal('hide')
                    })
                } else {
                    if (this.das == '') {
                        this.$swal({
                            type: 'error',
                            title: 'Error',
                            text: 'Debes ingresar un número de DAS.',
                            showCloseButton: true,
                        });
                    }
                }
            },
            FinalizarTicket: function(id) {
                axios.get('/FinalizarSlcIng/' + id).then((response) => {
                    this.getDatosSlc();
                    this.getBitacora();
                })
            },
            getEquiposTicket: function() {
                axios.get('/EquipoTicketIngController/' + this.ticket.id).then((response) => {
                    this.equipostickets = response.data
                })
            },
            rechazoFactibilidad: function() {
                if (this.motivo == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Debes ingresar el motivo del rechazo.',
                        showCloseButton: true,
                    });
                } else {
                    axios.get(`/rechazoFactibilidad?id=${this.code}&motivo=${this.motivo}`).then((response) => {
                        this.getDatosSlc();
                        this.getBitacora();
                        $('#FacNegativa').modal('hide');
                    })
                }
            },
            IngresoNroEwork: function() {
                if (this.nroEwork == '') {
                    this.$swal({
                        type: 'error',
                        title: 'Error',
                        text: 'Debes ingresar un número de Ework.',
                        showCloseButton: true,
                    });
                } else {
                    axios.get(`/GetNroEwrok?ework=${this.nroEwork}&id=${this.ticket.id}`).then((response) => {
                        $('#IngresoEwork').modal('hide');
                        this.nroEwork = '';
                        this.getDatosSlc();
                        this.getBitacora();
                    })
                }
            },
            EnviarMensaje: function() {
                var url = '/logIng/' + this.code
                axios.post(url, this.datoslog).then(response => {
                    this.getBitacora();
                    $('#descripcion').val('');
                    this.datoslog.descripcion = '';
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
                        icon: 'success',
                        title: 'Mensaje enviado'
                    })
                });
            },
            getBitacora: function() {
                axios.get('/bitacoraIng/' + this.ticket.id).then((response) => {
                    this.bitacoras = response.data
                })
            },
            setFile: function(id) {
                this.typeFile = id;
                axios.get(`/searchArchivoIng?id=${this.code}&tipo=${this.typeFile}`).then((response) => {
                    this.archivos = response.data
                })
            },
            getArchivos: function() {
                axios.get(`/searchArchivoIng?id=${this.code}&tipo=${this.typeFile}`).then((response) => {
                    this.archivos = response.data
                })
                axios.get('/totallpuIng/' + this.code).then((response) => {
                    this.lpu = response.data;
                })
                axios.get('/totalInformeejecucion/' + this.code).then((response) => {
                    this.InformeEjecucion = response.data;
                })
            },
            setTp: function() {
                $('#IngresoTp').modal('show');
                this.IdSolicitud =this.ticket.id;
                this.getActividades();
            },
            IngresoTp: function() {
                if (this.tps.length == 0 && this.idproveedor == '') {
                   
                } else {
                    $('#IngresoTp').modal('hide');
                    console.log(this.code)
                    for (var i = 0; i < this.tps.length; i++) {
                        let tp = this.tps[i]
                        let NewformData = new FormData()
                        NewformData.append('tp', tp.numero);
                        NewformData.append('ticket_id', this.ticket.id);
                        NewformData.append('fecha_ejecucion',tp.fecha_ejecucion); 
                        NewformData.append('actividad_id',tp.actividad_id); 
                        NewformData.append('tipo_supervision_id',tp.tipo_supervision_id); 
                        NewformData.append('supervisor_id',tp.supervisor_id); 

                        axios.post('/Create_tp_ticket', NewformData).then((response) => {
                            this.getBitacora();
                            this.nroTp = '';
                            this.tps = []
                            this.getDatosSlc();
                            
                            this.registrarProveedor();
                        })
                    }

                }
            },
            registrarProveedor:function(){
                let NewformData = new FormData()
                NewformData.append('ticket_id',  this.ticket.id);
                NewformData.append('proveedor_id',this.idproveedor);
                axios.post('/registrar-proveedor-ticket',NewformData).then(response=>{
                    this.load_function();
                })
            },
            UploadFiles: function() {
                $('#SubirArchivo').modal('show');
                EventBus.$emit('ing.getDataFiles');
            },
            formato2: function(d) {
                return moment(d).format("DD/MM/YY - hh:mm:ss");
            },
            AprobarTicketIng: function() {
                axios.get('/AprobarTicketIng/' + this.ticket.id).then((response) => {
                    this.getDatosSlc();
                    this.getBitacora();
                })
            },
            formato: function(d) {
                return moment(d).format("DD/MM/YYYY");
            },
            getDatosSlc: function() {
                axios.get('/getSlcIng/' + this.ticket.id).then((response) => {
                    this.ticket = response.data.ticket;
                    this.tps_data = response.data.tps;
                    this.idSearch = '';
                    if (this.solicitud == 0) {
                        this.mensaje = 'Ticket no encontrado'
                    }
                })
            },
            GetDatosSearchSlc: function() {
                let loader = this.$loading.show({
                    // Optional parameters
                    container: this.fullPage ? null : this.$refs.formContainer,
                    canCancel: true,
                    onCancel: this.onCancel,
                });
                // simulate AJAX
                setTimeout(() => {
                    loader.hide()
                }, 500)
                axios.get('/getSlcIng/' + this.idSearch).then((response) => {
                    this.solicitud = response.data;
                    if (this.solicitud == 0) {
                        this.mensaje = 'Ticket no encontrado'
                    }
                })
                axios.get('/bitacoraIng/' + this.idSearch).then((response) => {
                    this.bitacoras = response.data
                })
            },
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            putFiles: function() {
                let uploadedFiles = this.$refs.files.files;
              
                for (var i = 0; i < uploadedFiles.length; i++) {

                   let file = uploadedFiles[i];
                   let file_extension = file.name.split(".").pop()
                   let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                   if (extension_permited) {
                     this.files.push(uploadedFiles[i]);
                   }
                }
                if (this.files != 0) {
                    document.getElementById("error_file").style.display = 'none';
                }
            },
            removeFile: function(key) {
                this.files.splice(key, 1);
            },
            getFileExtension: function(filename) {
                return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
            },
            validateForm: function() {
                if (this.tipo_archivo_id == '') {
                    document.getElementById("errorTipoArchivpo").style.display = 'block';
                }
                if (this.files == 0) {
                    document.getElementById("error_file").style.display = 'block';
                }
                if (this.tipo_archivo_id != '' || this.files != 0) {
                    if(this.tipo_archivo_id == 6){
                        if(this.tipo_moneda_id != '' && this.monto_lpu != 0 && this.monto_lpu != null){
                             this.upload_files_function();
                        }
                       
                    }else{

                        this.upload_files_function();
                    }
                    
                }
            },
            upload_files_function: function() {
                let formData = new FormData();
                formData.append('tipo_archivo', this.tipo_archivo_id);
                formData.append('tipo_moneda_id', this.tipo_moneda_id);
                formData.append('monto_lpu', this.monto_lpu);

                for (var i = 0; i < this.files.length; i++) {
                    let file = this.files[i];
                    formData.append('files[' + i + ']', file);
                }
                document.getElementById("progressBarFileUpoad").style.display = 'block';
                axios.post('/subidaArchivoIng/' + this.code, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: e => {
                        if (e.lengthComputable) {
                            this.porcentaje = (e.loaded / e.total) * 100
                            console.log(this.porcentaje)
                        }
                    }
                }).then(response => {
                    $('#SubirArchivo').modal('hide');
                    this.getDatosSlc();
                    this.getArchivos();
                    this.getBitacora();
                    this.load_function();
                    this.files = [];
                    this.tipo_archivo_id = '';
                    $("#files").val('');
                })
            },
            delete_error: function() {
                if (this.tipo_archivo_id != '') {
                    if(this.tipo_archivo_id == 6 ){
                        document.getElementById("monto_lpu").style.display = 'block';
                         document.getElementById("tipo_moneda_lpu").style.display = 'block';
                        
                    }else{
                        if(this.tipo_archivo_id != 6){
                            document.getElementById("monto_lpu").style.display = 'none';
                            document.getElementById("tipo_moneda_lpu").style.display = 'none';
                            this.monto_lpu = 0;
                            this.tipo_moneda_id = '';
                        }
                    }
                    document.getElementById("errorTipoArchivpo").style.display = 'none';
                }
            },
            load_function: function() {
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
            DeleteArchivos: function(file) {
                axios.get('/delte_file_ticket_ing/' + file.id).then(response => {
                    this.getArchivos();
                    this.getBitacora();
                    this.load_function();
                })
            },
            addtp: function() {
             
                if (this.nroTp != '' && this.fecha_ejecucion_tp != '' && this.actividad_id.length != 0 && this.tipo_supervisor.length != 0  && this.supervisor_id.length != 0 ) {
                    // const nombre_actividad = this.actividades.filter(actividad => actividad.id == this.actividad_id );
                    // console.log(nombre_actividad.descripcion);
                   
                    this.tps.push({
                        numero: this.nroTp,
                        fecha_ejecucion:this.fecha_ejecucion_tp,
                        actividad:this.actividad_id[1],
                        tipo_supervision:this.tipo_supervisor[1],
                        supervisor:this.supervisor_id[1],
                        actividad_id:this.actividad_id[0],
                        tipo_supervision_id:this.tipo_supervisor[0],
                        supervisor_id:this.supervisor_id[0]
                    })
                    this.nroTp = '';
                    this.actividad_id = [];
                    this.fecha_ejecucion_tp = '';
                    this.tipo_supervisor = [];
                    this.supervisor_id = [];

                }
            },
            deleteTp: function(key) {
                this.tps.splice(key, 1)
            },
    search_site: function() {
         if (this.datositio.length >= 3) {
             this.input_width_form = document.getElementById("intp_site").clientWidth;
             document.getElementById('listado_sites').style.display = 'block';
             axios.get(`/GetPop?datositio=${this.datositio}`).then((response) => {
                 this.sites = response.data
             });
         } else {
             this.sites = '';
             document.getElementById('listado_sites').style.display = 'none';
         }
     },
     select_site: function(site) {
         this.site_id = site.id;
         document.getElementById('listado_sites').style.display = 'none';
         document.getElementById('pop_selected').style.display = 'block';
         document.getElementById('search_pop').style.display = 'none';
         document.getElementById('error_site').style.display = 'none';
         this.sites = '';
         this.site_info_select = site.nem_site + ' ' + site.nombre;
         axios.get('/GetSalas/' + site.pop_id).then(response => {
             this.salas = response.data;
         })
     },
     change_site: function() {
         this.datositio = '';
         this.site_id = '';
         this.salas = [];
         document.getElementById('pop_selected').style.display = 'none';
         document.getElementById('search_pop').style.display = 'block';
         this.sites = '';
         this.site_info_select = '';
     },
     enviarPropuesta:function(){
        if(this.site_id != '' && this.salaId != '' && this.comentario != ''){
             let formData = new FormData;
             formData.append('site_id',this.site_id);
             formData.append('ticket_id', this.ticket.id);
             formData.append('room_id', this.salaId);
             formData.append('comentario',this.comentario_cambio_sitio);
        
             axios.post('/propuesta-cambio-sitio',formData).then(response=>{

              this.getDatosSlc();
              this.getBitacora();
              this.change_site();
              this.comentario_cambio_sitio='';
               $("#propuestaCambio").modal('hide');
             }) 
        }
         

     },
     getPropuesta:function(){
        axios.get('/get-datos-propuesta/'+this.ticket.id).then(response=>{
             this.p_sitio = response.data.p_sitio;
             this.p_sala = response.data.p_sala;
             this.p_comentario = response.data.p_comentario;
        })
     },
     actualizarSitioEstado:function(){
        let formData = new FormData;
        formData.append('ticket_id', this.ticket.id);
        axios.post('/aprobar-cambio-sitio',formData).then(response=>{
             this.getDatosSlc();
             this.getBitacora();
             $("#propuesta_cambio").modal('hide');
        })
     },
     successMessaje:function(mensaje){
         Swal.fire({
            type: 'success',
            title: 'Éxito',
            text: mensaje,
       })
     },
     SelectProveedor: function(id, nombreProveedor) {
        this.proveedor_info_select = nombreProveedor.toLowerCase()
        this.idproveedor = id;
        this.NombreProveedorSelect = nombreProveedor;
        document.getElementById('search_proveedor').style.display = 'none';
        document.getElementById('SelectProveedor').style.display = '';
        document.getElementById('listProveedor').style.display = 'none';
        document.getElementById('errorProveedor').style.display = 'none';
    },
    BuscarProveedor: function() {
        if (this.Buscarproveedor.length >= 3) {
            axios.get(`/GetProveedor?proveedor=${this.Buscarproveedor}`).then((response) => {
                this.Proveedores = response.data;
                this.input_width = document.getElementById("SearchproveedorDontDisplay").clientWidth
            })
            var box = document.getElementById('listProveedor');
            box.style.display = '';
        } else {
            this.Proveedores = '';
            var box = document.getElementById('listProveedor');
            box.style.display = 'none';
        }
    },
    searchNewProveedor: function() {
        document.getElementById('SelectProveedor').style.display = 'none';
        document.getElementById('search_proveedor').style.display = '';
        this.Buscarproveedor = '';
        this.idproveedor = '';
    },
    }
}
</script>
