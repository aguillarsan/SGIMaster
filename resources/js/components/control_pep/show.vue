<template>
    <div>
        <div class="main-content">
            <div class="wrapper wrapper-content">
                <section class="section">
                    <div class="section-header shadow-box-ag">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 col-12 ">
                                <div class="card-stats-title">
                                    <h1>
                                        <div class=" barlow semi_bold">
                                            PEP NRO° {{pep.pep}}
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-ticket-alt" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Tickets
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Ticket asociados al pep
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="animated fadeIn">
                                    <div class="table-responsive project-list project-table">
                                        <table class="table table-hover table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class=" barlow bold">
                                                        #
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Área
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Sitio/Tecnología
                                                    </th>
                                                    <th>
                                                        Crm
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Categoría
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Motivo
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Fecha Inicio
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Fecha Termino
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Descripción
                                                    </th>
                                                    <th class=" barlow bold">
                                                        Estado
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="height: 150px; " v-for="ticket in tickets">
                                                    <td class="">
                                                        <router-link :to="{ path:`/showTicket/`+ticket.id, params: {id: ticket.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                            <a :href="href" target="_blank">
                                                                <span class="badge badge-info boxBounce barlow regular" style="font-size:15px;border-radius:5px;" v-text="ticket.id">
                                                                </span>
                                                            </a>
                                                        </router-link>
                                                        <div style="margin-top: 12px">
                                                            <strong class="barlow semi_bold">
                                                                {{ticket.user ? ticket.user.name+' '+ticket.user.apellido:''}}
                                                            </strong>
                                                        </div>
                                                        <div style="margin-top: 10px">
                                                           <strong>
                                                               {{ticket.nro_imputacion ? ticket.nro_imputacion :'PEP no ingresado'}}
                                                           </strong> 
                                                        </div>
                                                    </td>
                                                    <td class="">
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
                                                                <span class="badge" style="background-color: #42e8b4;color: white">
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
                                                    <td class="">
                                                        <div v-if="ticket.site">
                                                            <div class="barlow semi_bold" style="font-size:13.5" v-if="ticket.site.classification_type_id != null">
                                                                <span class="badge " style="background-color:#43e8b4;color: white " v-if="ticket.clasificacion_id == 1 ">
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
                                                    <td class=" barlow semi_bold">
                                                        <div v-if="ticket.tipo_motivo_id != null">
                                                            <div>
                                                                {{ticket.tipo_motivo ? ticket.tipo_motivo .descripcion : ''}}  {{ticket.tipo_mantencion ? ticket.tipo_mantencion.descripcion :''}}
                                                            </div>
                                                        </div>
                                                        <div v-if="ticket.trimestre == 1">
                                                            <span class="badge badge-success">
                                                                Primera mantención
                                                            </span>
                                                        </div>
                                                        <div v-if="ticket.trimestre == 2">
                                                            <span class="badge badge-info">
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
                                                    <td class=" barlow regular">
                                                        <div v-if="ticket.created_at != null">
                                                            {{formato(ticket.created_at)}}
                                                        </div>
                                                    </td>
                                                    <td class=" barlow regular">
                                                        <div v-if="ticket.fecha_compromiso != null">
                                                            {{formato(ticket.fecha_compromiso)}}
                                                        </div>
                                                    </td>
                                                    <td class="barlow regular">
                                                        <div style="width:200px;">
                                                            {{ticket.descripcion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span :style="'background-color:'+ticket.estado.color+';'" class="badge" style="color: white">
                                                            {{ticket.estado ? ticket.estado.descripcion:''}}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-list" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Resumen
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Detalle total SGC con y sin OC
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="animated fadeIn">
                                    <div class="table-responsive project-list project-table">
                                        <table class="table table-hover table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class="barlow bold" style="width: 80px;">
                                                        PEP
                                                    </th>
                                                    <th class="barlow bold" style="width: 150px;">
                                                        Presupuesto PEP
                                                    </th>
                                                    <th class="barlow bold">
                                                        Real
                                                    </th>
                                                    <th class="barlow bold" style="max-width: 80px;">
                                                        Disponible
                                                    </th>
                                                    <th class="barlow bold">
                                                        Total en SGC con OC
                                                    </th>
                                                    <th class="barlow bold">
                                                        Total en SGC sin OC
                                                    </th>
                                                    <th class="barlow bold">
                                                        Total SGC
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{resumen_data.pep}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.ppto_sap ? '$'+formatPrice(resumen_data.ppto_sap) :''}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.real_sap ? '$'+formatPrice(resumen_data.real_sap) :''}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.disponible_real ? '$'+formatPrice(resumen_data.disponible_real) :''}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.total_sgc_con_oc ? '$'+formatPrice(resumen_data.total_sgc_con_oc) :''}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.total_pep ? '$'+formatPrice(resumen_data.total_pep.total) :''}}
                                                    </td>
                                                    <td>
                                                        {{resumen_data.total_real_sgc ? '$'+formatPrice(resumen_data.total_real_sgc) :''}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-list" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Solicitudes SGC sin OC
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Solicitudes asociadas al pep sin Orden de Compra
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="animated fadeIn">
                                    <div class="table-responsive project-list project-table">
                                        <table class="table table-hover table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class="barlow bold" style="width: 80px;">
                                                        #
                                                    </th>
                                                    <th class="barlow bold" style="width: 150px;">
                                                        Sitio
                                                    </th>
                                                    <th class="barlow bold">
                                                        Solicitante
                                                    </th>
                                                    <th class="barlow bold" style="max-width: 80px;">
                                                        Proveedor
                                                    </th>
                                                    <th class="barlow bold">
                                                        Descripción
                                                    </th>
                                                    <th class="barlow bold">
                                                        Nro° ticket
                                                    </th>
                                                    <th class="barlow bold">
                                                        Costos
                                                    </th>
                                                    <th class="barlow bold">
                                                        Tipo boleta
                                                    </th>
                                                    <th class="barlow bold" style="width: 50px;">
                                                        Cesta/Oc/N°ework
                                                    </th>
                                                    <th class="barlow bold">
                                                        Estado
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="height: 200px;" v-for="solicitud in solicitudes">
                                                    <td>
                                                        <div v-if="solicitud.solicitud_duplicada_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular" style="margin-top: 10px;">
                                                                <router-link :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular" style="margin-top: 20px;">
                                                                <router-link :to="{ path:`/show/`+solicitud.solicitud_duplicada_id, params: {id: solicitud.solicitud_duplicada_id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: rgb(248, 172, 89);color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.solicitud_duplicada_id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.solicitud_duplicada_id == null">
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular">
                                                                <router-link :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="" style="font-size: 12px;">
                                                        <div class="col-md-12 col-sm-12 col-12 barlow semi_bold" v-if="solicitud.site_id != null">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                    {{solicitud.site?solicitud.site.nem_site:''}} {{solicitud.site?solicitud.site.nombre:'' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-12 barlow semi_bold" v-if="solicitud.temp_sgc_pop_id != null">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                    {{solicitud.temp_sgc_pop ?  solicitud.temp_sgc_pop.nem_movil :''}} {{solicitud.temp_sgc_pop ?  solicitud.temp_sgc_pop.nombre:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top:10px;" v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'" class="badge barlow semi_bold" v-if="solicitud.tipo_trabajo_id != null">
                                                                    {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id == null">
                                                            <div class="col-md-3 col-sm-3 col-12" v-if="solicitud.tipo_trabajo_id != null">
                                                                <span :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'" class="badge barlow semi_bold">
                                                                    {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="" v-if="solicitud.area_creadora_id == null && solicitud.contingencia_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                    Contingencia {{solicitud.contingencia? solicitud.contingencia.nombre_contingencia :''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top:10px;" v-if="solicitud.tipo_trabajo_ingenieria_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#23c6c8 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 1">
                                                                    Licitación
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color:#1ab394 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 2">
                                                                    Cotización
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color: #f8ac59; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 3">
                                                                    LPU
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color: #f66997; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 4">
                                                                    CPU
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color:#999999 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 6">
                                                                    Sin asignar
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == 1 && solicitud.proyecto_gpon==1">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                    Proyecto GPON 2020
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                {{solicitud.user.name}}  {{solicitud.user.apellido}}
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            Fecha creación
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{formato(solicitud.created_at)}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="max-width: 120px;" v-if="solicitud.proveedor_id != null">
                                                            <strong class=" barlow semi_bold" style="font-size:12px; ">
                                                                {{solicitud.proveedor?solicitud.proveedor.PROVEEDOR:''}}
                                                            </strong>
                                                        </div>
                                                    </td>
                                                    <td class="barlow regular">
                                                        <div>
                                                            {{solicitud.descripcion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a :href="'/showTicket/'+solicitud.ticket_id" style="" target="_blanck">
                                                                <strong class=" barlow semi_bold">
                                                                    {{solicitud.ticket_id}}
                                                                </strong>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div v-if="solicitud.costos_activos != 0 && solicitud.costos_activos != null ">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    ACTIVOS
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.tipo_moneda.moneda}} {{formatPrice(solicitud.costos_activos ) }}
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    SERVICIOS
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.tipo_moneda.moneda}} {{formatPrice(solicitud.costos_servicios) }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == 1 ">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    COSTOS TOTALES
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.tipo_moneda.moneda}} {{solicitud.activo_servicio ?  formatPrice(solicitud.activo_servicio):''}}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 60px;" v-if="solicitud.solicitud_duplicada ">
                                                            <div v-if="solicitud.solicitud_duplicada.costos_servicios != 0 && solicitud.solicitud_duplicada.costos_servicios != null">
                                                                <div>
                                                                    <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                        SERVICIOS
                                                                    </strong>
                                                                    <div class="barlow regular">
                                                                        {{solicitud.solicitud_duplicada.tipo_moneda.moneda}} {{formatPrice(solicitud.solicitud_duplicada.costos_servicios)  }}
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                {{solicitud.tipo_boleta ?solicitud.tipo_boleta.descripcion:''}}
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{solicitud.boleta}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div>
                                                                <strong class="barlow semi_bold">
                                                                    Cesta
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.cesta}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    OC
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.oc}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    Ework
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.ework}}
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 50px" v-if="solicitud.solicitud_duplicada">
                                                            <div>
                                                                <strong class=" barlow semi_bold">
                                                                    Cesta
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.solicitud_duplicada.cesta}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    OC
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.solicitud_duplicada.oc}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    Ework
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.solicitud_duplicada.ework}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div class="barlow semi_bold">
                                                                <span :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                                                    {{solicitud.proceso ?solicitud.proceso.descripcion:''}}
                                                                </span>
                                                            </div>
                                                            <div class="barlow semi_bold" style="margin-top:5px;" v-if="solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                                <span :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                                                    {{solicitud.subestado.subestado}} {{solicitud.gestionador_id!=null ? solicitud.gestionador_id :''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top: 50px;" v-if="solicitud.solicitud_duplicada">
                                                            <div>
                                                                <span :style="'background-color:'+solicitud.solicitud_duplicada.proceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge">
                                                                    {{solicitud.solicitud_duplicada.proceso.descripcion}}
                                                                </span>
                                                            </div>
                                                            <div style="margin-top:5px;" v-if="solicitud.solicitud_duplicada.proceso_id != 13 && solicitud.solicitud_duplicada.proceso_id != 14">
                                                                <span :style="'background-color:'+solicitud.solicitud_duplicada.subestado.color+';'+'color:white;'+'border-radius:5px;'" class="badge">
                                                                    {{solicitud.solicitud_duplicada.subestado.subestado}} {{solicitud.solicitud_duplicada.gestionador_id !=null ? solicitud.solicitud_duplicada.gestionador_id :''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-12 ">
                        <div class="card card-hero shadow-box-ag">
                            <div class="card-header" style="background-image: linear-gradient(rgb(0, 92, 255), #007bff99);">
                                <div class="card-icon" style="margin: -45px;">
                                    <i class="fas fa-list" style="color: #42E8B4;font-size: 135px;">
                                    </i>
                                </div>
                                <h4 class=" barlow bold">
                                    Solicitudes SGC con OC
                                </h4>
                                <div class="card-description barlow semi_bold">
                                    Solicitudes asociadas al pep con Orden de Compra
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="animated fadeIn">
                                    <div class="table-responsive project-list project-table">
                                        <table class="table table-hover table-striped ">
                                            <thead>
                                                <tr>
                                                    <th class="barlow bold" style="width: 80px;">
                                                        #
                                                    </th>
                                                    <th class="barlow bold" style="width: 150px;">
                                                        Sitio
                                                    </th>
                                                    <th class="barlow bold">
                                                        Solicitante
                                                    </th>
                                                    <th class="barlow bold" style="max-width: 80px;">
                                                        Proveedor
                                                    </th>
                                                    <th class="barlow bold">
                                                        Descripción
                                                    </th>
                                                    <th class="barlow bold">
                                                        Nro° ticket
                                                    </th>
                                                    <th class="barlow bold">
                                                        Costos
                                                    </th>
                                                    <th class="barlow bold">
                                                        Tipo boleta
                                                    </th>
                                                    <th class="barlow bold" style="width: 50px;">
                                                        Cesta/Oc/N°ework
                                                    </th>
                                                    <th class="barlow bold">
                                                        Estado
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="height: 200px;" v-for="solicitud in solicitudes_con_oc">
                                                    <td>
                                                        <div v-if="solicitud.solicitud_duplicada_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular" style="margin-top: 10px;">
                                                                <router-link :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular" style="margin-top: 20px;">
                                                                <router-link :to="{ path:`/show/`+solicitud.solicitud_duplicada_id, params: {id: solicitud.solicitud_duplicada_id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: rgb(248, 172, 89);color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.solicitud_duplicada_id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.solicitud_duplicada_id == null">
                                                            <div class="col-md-3 col-sm-3 col-12 barlow regular">
                                                                <router-link :to="{ path:`/show/`+solicitud.id, params: {id: solicitud.id}}" v-slot="{ href, route, navigate, isActive, isExactActive }">
                                                                    <a :href="href" target="_blank">
                                                                        <span class="badge boxBounce barlow regular" style="background-color: #1d548a;color: white;border-radius: 5px;font-size: 15px">
                                                                            {{solicitud.id}}
                                                                        </span>
                                                                    </a>
                                                                </router-link>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="" style="font-size: 12px;">
                                                        <div class="col-md-12 col-sm-12 col-12 barlow semi_bold" v-if="solicitud.site_id != null">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                    {{solicitud.site?solicitud.site.nem_site:''}} {{solicitud.site?solicitud.site.nombre:'' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-12 barlow semi_bold" v-if="solicitud.temp_sgc_pop_id != null">
                                                            <div style="font-size: 10px;">
                                                                <span class="badge " style="background-color: rgb(0, 92, 255);color: white;border-radius: 5px">
                                                                    {{solicitud.temp_sgc_pop ?  solicitud.temp_sgc_pop.nem_movil :''}} {{solicitud.temp_sgc_pop ?  solicitud.temp_sgc_pop.nombre:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top:10px;" v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'" class="badge barlow semi_bold" v-if="solicitud.tipo_trabajo_id != null">
                                                                    {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == null && solicitud.tipo_trabajo_id != null && solicitud.solicitud_duplicada_id == null">
                                                            <div class="col-md-3 col-sm-3 col-12" v-if="solicitud.tipo_trabajo_id != null">
                                                                <span :style="'background-color:'+solicitud.tipo_trabajo.color+';'+'color:white;border-radius:5px;'" class="badge barlow semi_bold">
                                                                    {{solicitud.tipo_trabajo_id ?solicitud.tipo_trabajo.nombre_trabajo:''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="" v-if="solicitud.area_creadora_id == null && solicitud.contingencia_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                    Contingencia {{solicitud.contingencia? solicitud.contingencia.nombre_contingencia :''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top:10px;" v-if="solicitud.tipo_trabajo_ingenieria_id != null">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#23c6c8 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 1">
                                                                    Licitación
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color:#1ab394 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 2">
                                                                    Cotización
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color: #f8ac59; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 3">
                                                                    LPU
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color: #f66997; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 4">
                                                                    CPU
                                                                </span>
                                                                <span class="badge barlow semi_bold" style="background-color:#999999 ; color: white;border-radius: 5px;text-align: center;" v-if="solicitud.tipo_trabajo_ingenieria_id== 6">
                                                                    Sin asignar
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == 1 && solicitud.proyecto_gpon==1">
                                                            <div class="col-md-3 col-sm-3 col-12">
                                                                <span class="badge barlow semi_bold" style="background-color:#ed5565;color:white;border-radius:5px;">
                                                                    Proyecto GPON 2020
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                {{solicitud.user.name}}  {{solicitud.user.apellido}}
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            Fecha creación
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{formato(solicitud.created_at)}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="max-width: 120px;" v-if="solicitud.proveedor_id != null">
                                                            <strong class=" barlow semi_bold" style="font-size:12px; ">
                                                                {{solicitud.proveedor?solicitud.proveedor.PROVEEDOR:''}}
                                                            </strong>
                                                        </div>
                                                    </td>
                                                    <td class="barlow regular">
                                                        <div>
                                                            {{solicitud.descripcion}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <a :href="'/showTicket/'+solicitud.ticket_id" style="" target="_blanck">
                                                                <strong class=" barlow semi_bold">
                                                                    {{solicitud.ticket_id}}
                                                                </strong>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div v-if="solicitud.costos_activos != 0 && solicitud.costos_activos != null ">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    ACTIVOS
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.tipo_moneda.moneda}} {{formatPrice(solicitud.costos_activos ) }}
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.costos_servicios != 0 && solicitud.costos_servicios != null">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    SERVICIOS
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.tipo_moneda.moneda}} {{formatPrice(solicitud.costos_servicios) }}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                        <div v-if="solicitud.area_creadora_id == 1 ">
                                                            <div>
                                                                <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                    COSTOS TOTALES
                                                                </strong>
                                                                <div class="barlow regular">
                                                                    {{solicitud.tipo_moneda.moneda}} {{solicitud.activo_servicio ?  formatPrice(solicitud.activo_servicio):''}}
                                                                </div>
                                                            </div>
                                                            <div>
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 60px;" v-if="solicitud.solicitud_duplicada ">
                                                            <div v-if="solicitud.solicitud_duplicada.costos_servicios != 0 && solicitud.solicitud_duplicada.costos_servicios != null">
                                                                <div>
                                                                    <strong class="barlow semi_bold" style="font-size: 12px;">
                                                                        SERVICIOS
                                                                    </strong>
                                                                    <div class="barlow regular">
                                                                        {{solicitud.solicitud_duplicada.tipo_moneda.moneda}} {{formatPrice(solicitud.solicitud_duplicada.costos_servicios)  }}
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <strong class="barlow semi_bold">
                                                                {{solicitud.tipo_boleta ?solicitud.tipo_boleta.descripcion:''}}
                                                            </strong>
                                                        </div>
                                                        <div class="barlow regular">
                                                            {{solicitud.boleta}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div>
                                                                <strong class="barlow semi_bold">
                                                                    Cesta
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.cesta}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    OC
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.oc}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    Ework
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.ework}}
                                                            </div>
                                                        </div>
                                                        <div style="margin-top: 50px" v-if="solicitud.solicitud_duplicada">
                                                            <div>
                                                                <strong class=" barlow semi_bold">
                                                                    Cesta
                                                                </strong>
                                                            </div>
                                                            <div class=" barlow regular">
                                                                {{solicitud.solicitud_duplicada.cesta}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    OC
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.solicitud_duplicada.oc}}
                                                            </div>
                                                            <div style="margin-top: 10px;">
                                                                <strong class="barlow semi_bold">
                                                                    Ework
                                                                </strong>
                                                            </div>
                                                            <div class="barlow regular">
                                                                {{solicitud.solicitud_duplicada.ework}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <div class="barlow semi_bold">
                                                                <span :style="'background-color:'+solicitud.proceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                                                    {{solicitud.proceso ?solicitud.proceso.descripcion:''}}
                                                                </span>
                                                            </div>
                                                            <div class="barlow semi_bold" style="margin-top:5px;" v-if="solicitud.proceso_id != 13 && solicitud.proceso_id != 14">
                                                                <span :style="'background-color:'+solicitud.subestado.color+';'+'color:white;'+'border-radius:5px;'" class="badge" v-if="solicitud">
                                                                    {{solicitud.subestado.subestado}} {{solicitud.gestionador_id!=null ? solicitud.gestionador_id :''}}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="barlow semi_bold" style="margin-top: 50px;" v-if="solicitud.solicitud_duplicada">
                                                            <div>
                                                                <span :style="'background-color:'+solicitud.solicitud_duplicada.proceso.color+';'+'color:white;'+'border-radius:5px;'" class="badge">
                                                                    {{solicitud.solicitud_duplicada.proceso.descripcion}}
                                                                </span>
                                                            </div>
                                                            <div style="margin-top:5px;" v-if="solicitud.solicitud_duplicada.proceso_id != 13 && solicitud.solicitud_duplicada.proceso_id != 14">
                                                                <span :style="'background-color:'+solicitud.solicitud_duplicada.subestado.color+';'+'color:white;'+'border-radius:5px;'" class="badge">
                                                                    {{solicitud.solicitud_duplicada.subestado.subestado}} {{solicitud.solicitud_duplicada.gestionador_id !=null ? solicitud.solicitud_duplicada.gestionador_id :''}}
                                                                </span>
                                                            </div>
                                                        </div>
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
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
import moment from 'moment';



export default {
    props:[
    'tickets',
    'pep',
    'solicitudes',
    'solicitudes_con_oc'
    ],
    data(){
        return{
            resumen_data:[]
        

        }
    },

    created:function(){
        this.resumen();

    },
    mounted: function() { /* Agrega mounted y con el siguiente contenido */
        
       
      
    },
    methods:{
    resumen:function(){

        axios.get('/calculate-value-sgc/'+this.pep.id).then(response=>{
            this.resumen_data = response.data;
        })

    },    

    formato: function(d) {
        return moment(d).format("DD/MM/YY");
    },
    formatPrice(value) {
        if (value % 1 == 0) {
      
           return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
         } else {
           let val = (value/1).toFixed(2).replace('.', ',')
           return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
      
    },
      

          
    },
      
        
}
</script>
