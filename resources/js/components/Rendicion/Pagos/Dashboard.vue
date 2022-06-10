<template>
    <div id="kt_content_container" class="container">
        <div class="row g-5 g-xl-12">
            <div class="col-xl-12 mb-5 mb-xl-10">
                <div class="mt-n20 position-relative">
                    <div class="row g-3 g-lg-6">
                        <div class="col-md-4" v-for="card in cards">
                            <div class="bg-opacity-70 rounded-2 px-6 py-5" style="background:white">
                                <div class="symbol symbol-40px me-5 mb-8">
                                    <span class="symbol-label" :style="'background:'+card.background">
                                        <span class="svg-icon svg-icon-2x svg-icon-primary text-white">
                                            <svg class="bi" width="32" height="32" fill="currentColor">
                                                <use
                                                    :xlink:href="'assets/bootstrap-icons/bootstrap-icons.svg#'+card.icono" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="m-0">
                                    <span
                                        class="text-gray-700 fw-boldest d-block fs-2qx lh-1 mb-1">{{card.value}}</span>
                                    <span class="text-gray-500 fw-bold fs-6">{{card.name}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1"
                            v-if="registered_payment != null &&  registered_payment != 0">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control form-control-solid w-250px ps-14"
                                style="width:350px !important" @keyup="filterData" v-model="filters.general_search"
                                placeholder="Buscar por sitio, creador o responsable">
                        </div>
                    </div>
                    <div class="card-toolbar" v-if="registered_payment != null &&  registered_payment != 0">
                        <button type="button" class="btn btn-light-dark  me-3 " @click="showFilter"
                            data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-2 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="black"></path>
                                </svg>
                            </span>Filtros
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6 show"
                            data-kt-menu="true" data-popper-placement="bottom-end" id="filter_menu"
                            data-kt-scroll-offset="200px" style="margin-left:-145px !important; display:none ">

                            <div class="px-7 py-5" data-kt-user-table-filter="form">
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold">Jefe de proyecto:</label>
                                    <select class="form-select form-select-solid fw-bolder"
                                        v-model="filters.project_manager_id">
                                        <option :value="project_manager.id" v-for="project_manager in project_managers">
                                            {{project_manager.name_manager}}</option>
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold">Estado:</label>
                                    <select class="form-select form-select-solid fw-bolder" v-model="filters.state_id">
                                        <option :value="state.id" v-for="state in states">{{state.state}}</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset"
                                        class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                        @click="cleanFilter">Limpiar</button>
                                    <button type="submit" class="btn btn-primary fw-bold px-6"
                                        @click="aplicateFilter">Aplicar</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light-success me-3" @click="getSurrenders">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                    <path
                                        d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                </svg>
                            </span>
                            Actualizar
                        </button>
                        <button type="button" class="btn btn-light-info me-3" @click="exportData()" id="btn_export">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                                        transform="rotate(90 12.75 4.25)" fill="black"></rect>
                                    <path
                                        d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                        fill="black"></path>
                                    <path
                                        d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                        fill="#C4C4C4"></path>
                                </svg>
                            </span>
                            <span class="indicator-label">Exportar</span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_surrender_payment" @click="getDataForm">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </span>
                            Nuevo registro</button>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="kt_table_users">
                                <thead v-if="registered_payment != null &&  registered_payment != 0">
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th tabindex="0" rowspan="1" colspan="1">Id</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Sitio</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Creador</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Responsable Entel
                                        </th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Jefe de Proyecto
                                        </th>
                                       
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Monto Total</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Estado</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">Opciones</th>
                                        <th class="min-w-125px " tabindex="0" rowspan="1" colspan="1">OC
                                        </th>



                                    </tr>
                                </thead>
                                <tbody v-if="!load_data">
                                    <tr v-for="surrender in surrenders.data">
                                        <td>{{surrender.id}}</td>
                                        <td>
                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                <div class="flex-grow-1 me-2">
                                                    <a class="text-gray-800 text-hover-primary fs-6 fw-bolder">{{surrender.site
                                                        ? surrender.site.nem_site:' '}}
                                                    </a>
                                                    <span class="text-muted fw-bold d-block fs-7">{{surrender.site ?
                                                        surrender.site.nombre:' '}}</span>
                                                </div>

                                            </div>

                                        </td>
                                        <td>{{surrender.user? surrender.user.fullname : ''}}</td>
                                        <td>{{surrender.responsable_entel}}</td>
                                        <td>{{surrender.project_manager ? surrender.project_manager.name_manager :''}}
                                        </td>
                                        
                                        <td>${{moneyFormat(surrender.monto_total)}}</td>
                                        <td>
                                            <span :class="setClass(surrender.state_id)">{{surrender.state ?
                                                surrender.state.state : ''}}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-shrink-0" v-if="userAuth.rol == 1 || userAuth.rol == 14">
                                                <a href="#" class="btn btn-secondary btn-sm"
                                                    @click.prevent="showMoreInfo(surrender)">Más
                                                    información</a>
                                                <a class="btn btn-success btn-sm" v-if="surrender.state_id == 1"
                                                    @click.prevent="updateState(surrender,2)" style="margin-left:5px"
                                                    :id="'btn_pay'+surrender.id">
                                                    <span class="indicator-label">Pagar</span>
                                                    <span class="indicator-progress">
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div v-if="surrender.oc">{{surrender.oc}}</div>
                                            <div v-if="!surrender.oc" >
                                                <button class="btn btn-primary btn-sm" v-if="userAuth.rol == 1 || userAuth.rol == 14" @click="addOc(surrender.id)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-body mt-5" v-if="load_data" style="height:400px;">
                                <div class="empty-state" data-height="400">
                                    <div class="d-flex justify-content-center  mt-8">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 9rem;height: 9rem;color: #007bff!important;">
                                            <span class="sr-only" style="color: #191919">
                                                Cargando...
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12" style="margin-top:-30px"
                                v-if="registered_payment == 0 && !load_data">
                                <div class="card card-flush h-lg-100" id="kt_contacts_main">
                                    <div class="card-body p-0">
                                        <div class="card-px text-center py-20 my-10">
                                            <h2 class="fs-2x fw-bolder mb-10">Bienvenido a rendición de pagos</h2>
                                            <p class="text-gray-400 fs-4 fw-bold mb-10">Aún no has declarado ningún pago
                                            </p>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_add_surrender_payment"
                                                @click="getDataForm">Crear
                                                nuevo registro</button>
                                            <div class="text-center px-4 mt-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                                    fill="currentColor" class="bi bi-inbox-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm-1.17-.437A1.5 1.5 0 0 1 4.98 3h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z" />
                                                </svg>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0"
                                v-if="registered_payment != 0 && surrenders.data == 0 && is_filter">
                                <div class="card-px text-center py-20 my-10">
                                    <h2 class="fs-2x fw-bolder mb-10">No se encontró nada</h2>
                                    <p class="text-gray-400 fs-4 fw-bold mb-10">intente buscar de nuevo
                                    </p>



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin tabla -->
            <!-- Inicio modal crear Usuario -->
            <div class="modal fade" id="kt_modal_add_surrender_payment" data-backdrop="static" tabindex="-1"
                style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-750px">
                    <div class="modal-content">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#"
                            id="kt_modal_add_customer_form"
                            data-kt-redirect="../../demo1/dist/apps/customers/list.html">
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <h2 class="fw-bolder">Rendir Pago</h2>
                                <div @click="closeModal" class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                transform="rotate(45 7.41422 6)" fill="black"></rect>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="modal-body py-10 px-lg-17">
                                <!-- Inicio load -->
                                <div class="empty-state" data-height="400" v-if="load">
                                    <div class="d-flex justify-content-center  mt-5">
                                        <div class="spinner-border text-primary" role="status"
                                            style="width: 8rem;height: 8rem;color: #007bff!important;">
                                            <span class="sr-only" style="color: #191919">
                                                Cargando...
                                            </span>
                                        </div>
                                    </div>
                                    <div style="text-align: center;
                                    margin-top: 1.5rem;
                                    font-size: 16px;">Creando...</div>
                                </div>
                                <!-- FIn load -->
                                <!-- Inicio etapas -->
                                <div class="stepper stepper-links d-flex flex-column between" v-if="!load">
                                    <div class="stepper-nav mb-5">
                                        <div class="stepper-item" v-for="step in steps" :class="step.class"
                                            data-kt-stepper-element="nav">
                                            <h3 class="stepper-title">{{step.name}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin etapas -->
                                <!-- Inicio formulario -->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" v-if="!load"
                                    data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                    data-kt-scroll-offset="300px" style="max-height: 548px;">
                                    <!-- First Step -->
                                    <div id="firstStep" v-if="currentStep == 1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <!-- Inicio input sitio -->
                                                    <label class="required fs-6 fw-bold mb-2">Sitio</label>
                                                    <div class="position-relative mb-3">
                                                        <input type="text" class="form-control " @keyup="searchSite"
                                                            v-model="nem_site" placeholder="Buscar Sitio" name="name"
                                                            id="site_search">
                                                        <span
                                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                            v-if="form_input.site_id" @click="changeSite">
                                                            <i class="bi bi-x-circle-fill fs-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{mensajes_error.site}}</div>
                                                    <!-- Fin input sitio-->
                                                    <!-- Inicio Listado de sitios -->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6 show"
                                                        data-kt-menu="true" data-popper-placement="bottom-end"
                                                        id="list_site" data-kt-scroll-offset="200px"
                                                        :style="'width:'+input_width_form+'px !important;'"
                                                        v-if="sites.length >=3">
                                                        <div class="menu-item px-5" v-for="site in sites">
                                                            <a href="#" @click.prevent="selectSite(site)"
                                                                class="menu-link px-5">{{site.nem_site}} -
                                                                {{site.nombre}}</a>
                                                            <div class="separator my-1"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Fin Listado de sitios -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="required fs-6 fw-bold mb-2">Jefe de proyecto</label>
                                                    <select class="form-select" v-model="form_input.jefe_proyecto">
                                                        <option :value="project_manager.id"
                                                            v-for="project_manager in project_managers">
                                                            {{project_manager.name_manager}}</option>
                                                    </select>
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{mensajes_error.jefe_proyecto}}</div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="required fs-6 fw-bold mb-2">Responsable Entel</label>
                                                    <input type="text" class="form-control "
                                                        v-model="form_input.responsable_entel" autocomplete="off"
                                                        placeholder="" name="responsable_entel">
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{mensajes_error.responsable_entel}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="required fs-6 fw-bold mb-2">Fecha inicio</label>
                                                    <input type="date" class="form-control "
                                                        v-model="form_input.fecha_actividad" autocomplete="off"
                                                        placeholder="" name="name">
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{mensajes_error.fecha_actividad}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="required fs-6 fw-bold mb-2">Fecha fin</label>
                                                    <input type="date" class="form-control "
                                                        v-model="form_input.fecha_fin" autocomplete="off" placeholder=""
                                                        name="">
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                        {{mensajes_error.fecha_fin}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="fs-6 fw-bold mb-2 required">Área de trabajo</label>
                                                     <select class="form-select" v-model="form_input.work_area_id">
                                                         <option :value="work_area.id" v-for="work_area in work_areas">{{work_area.name}}</option>
                                                     </select>
                                                    <div class="fv-plugins-message-container invalid-feedback">{{mensajes_error.work_area}}</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                                    <label class="fs-6 fw-bold mb-2"
                                                        :class="userAuth.rol == 10 || userAuth.rol == 12  ? 'required' : '' ">PEP</label>
                                                    <input type="text" class="form-control " v-model="form_input.pep"
                                                        autocomplete="off" placeholder="" name="pep">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fv-row mb-7 fv-plugins-icon-container mt-2">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="required fs-6 fw-bold mb-2">Tp</label>
                                                    <input type="number" class="form-control " v-model="form_input.tps"
                                                        placeholder="" name="name">

                                                </div>
                                                <div class="col-lg-6" style="margin-top: 2.1rem!important;">
                                                    <a href="#" @click.prevent="addTp" class="btn btn-light-primary">
                                                        <i class="la la-plus"></i>Añadir</a>
                                                </div>

                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{mensajes_error.tps}}</div>
                                            <div id="kt_docs_repeater_basic mt-5"
                                                class="border-dashed border-gray-300 rounded " v-if="tps.length != 0"
                                                style="padding: 15px;">
                                                <div class="row">
                                                    <div class="col-lg-2" v-for="(tp,key) in tps">
                                                        <span class="badge badge-primary" style="font-size:14px">{{tp}}
                                                            <a href="#" @click.prevent="deleteTp(key)"><i
                                                                    class="bi bi-x-circle-fill text-danger"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First Step -->
                                    <!-- Second Step -->
                                    <div id="secondtStep" v-if="currentStep == 2">
                                        <label class="fs-6 fw-bold mb-2"> <span class="required">Declaracion de
                                                gastos</span></label>
                                        <div id="kt_docs_repeater_basic mt-5"
                                            class="border-dashed border-gray-300 rounded " style="padding: 15px;">
                                            <div class="form-group" style="margin-top:10px">
                                                <div data-repeater-list="kt_docs_repeater_basic">
                                                    <div data-repeater-item="">
                                                        <div class="form-group row mb-5" v-for="(input, key) in inputs">
                                                            <div class="col-md-4">
                                                                <label class="form-label">Tipo de gasto</label>
                                                                <select class="form-select"
                                                                    v-model="input.expense_type_id">
                                                                    <option :value="expense_type.id"
                                                                        v-for="expense_type in expense_types">
                                                                        {{expense_type.expense_type}}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label class="form-label">Monto</label>


                                                                <money class="form-control mb-2 mb-md-0" v-bind="money"
                                                                    v-model="input.monto">
                                                                </money>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <a href="#" @click.prevent="deleteInput(key)"
                                                                    class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                                                                    <i class="la la-trash-o fs-3"></i>Eliminar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="#" @click.prevent="addInput" class="btn btn-light-primary">
                                                    <i class="la la-plus"></i>Añadir</a>
                                            </div>
                                        </div>
                                        <div class="fv-plugins-message-container invalid-feedback">{{error_gatos}}</div>

                                    </div>
                                    <!--End Second Step -->
                                    <!--Third Step -->
                                    <div id="finalStep" v-if="currentStep == 3">
                                        <!--Inicio  archivos -->
                                        <div class="fv-row mb-7 fv-plugins-icon-container mt-6"
                                            style="text-align: center">
                                            <!-- <label class="required fs-6 fw-bold mb-2">Seleccione una opción</label> -->
                                            <ul class="nav nav-pills nav-pills-custom mb-3"
                                                style="justify-content: center;">
                                                <li class="nav-item mb-3 me-3 me-lg-6" v-for="type_file in type_files">
                                                    <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4 active"
                                                        data-bs-toggle="pill" href="#"
                                                        @click.prevent="selectFile(type_file.id)">
                                                        <div class="nav-icon">
                                                            <i :class="type_file.class" class="big-icon"
                                                                :style="'color:'+type_file.color"></i>
                                                        </div>
                                                        <span
                                                            class="nav-text text-gray-500  fs-6 lh-1">{{type_file.name}}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <input class="file-upload-input" hidden="true" id="files" multiple=""
                                                ref="files" type="file" v-on:change="uploadFiles()" />
                                            <div class="d-flex align-items-center border-1 border-dashed card-rounded p-6  mb-5"
                                                style="justify-content: space-between;"
                                                v-for="(archivo, key) in archivos">
                                                <div>
                                                    <span
                                                        :class="archivo.type == 1 ? 'badge badge-primary':'badge badge-warning'">{{archivo.type==
                                                        1 ? 'Boleta':'Correo'}}</span>
                                                    <label style="margin-left:10px">{{archivo.file.name}}
                                                        ({{paseSize(archivo.file.size)}})</label>
                                                </div>
                                                <div>
                                                    <a href="#" @click.prevent="delefile(key)">
                                                        <span class=" translate-middle top-50 end-0 me-n2">
                                                            <i class="bi bi-x-circle-fill fs-2"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="fv-plugins-message-container invalid-feedback">{{error_file}}
                                            </div>
                                        </div>
                                        <!--Fin  archivos -->
                                    </div>
                                    <!--End Third Step -->


                                </div>

                                <!-- Fin formulario -->
                            </div>
                            <div class="modal-footer flex-center" v-if="!load">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" v-if="currentStep != 1"
                                    @click="backStep">
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black">
                                            </rect>
                                            <path
                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    Volver
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" @click="validateStep"
                                    v-if="currentStep != steps.length">Siguiente
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                                transform="rotate(-180 18 13)" fill="black"></rect>
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" @click="storeSurrenderPayment"
                                    v-if="currentStep == 3">Finalizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" id="kt_modal_add_surrender_payment_detail">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title">Detalle rendición de pago</h5>

                            <!--begin::Close-->
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                            <!--end::Close-->
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card card-flush h-md-100 no-shadow" style="margin-top: -20px;">
                                        <!--begin::Header-->
                                        <div class="card-header pt-7" style="text-align:center">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder text-gray-800">Montos
                                                    declarados</span>
                                            </h3>
                                        </div>
                                        <div class="card-body pt-4 border-dashed border-gray-300 rounded">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table
                                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 my-0">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fs-7 fw-bolder text-gray-500 border-bottom-0">
                                                            <th class="p-0 w-100px pb-1">Tipo de gasto</th>

                                                            <th class="text-end min-w-140px p-0 pb-1">Monto</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        <tr v-for="detail in payment_detail">

                                                            <td class="ps-0">
                                                                <a
                                                                    class="text-gray-800 fw-bolder text-hover-primary mb-1 fs-6 text-start pe-0">{{detail.expense_type.expense_type}}</a>

                                                            </td>

                                                            <td>
                                                                <span
                                                                    class="text-gray-800 fw-bolder d-block fs-6 ps-0 text-end">${{moneyFormat(detail.amount)}}</span>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card card-flush h-md-100 no-shadow" style="margin-top:-20px">
                                        <!--begin::Header-->
                                        <div class="card-header pt-7" style="text-align:center">
                                            <!--begin::Title-->
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bolder text-gray-800">TPS</span>
                                            </h3>
                                        </div>
                                        <div class="card-body pt-4 border-dashed border-gray-300 rounded">
                                            <div class="row">
                                                <div class="col-lg-3" v-for="tp in tps_lists">
                                                    <span class="badge badge-primary"
                                                        style="font-size:13px">{{tp.tp}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-flush h-md-100 no-shadow">
                                <!--begin::Header-->
                                <div class="card-header pt-7" style="text-align:center">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-gray-800">Archivos</span>
                                    </h3>
                                </div>
                                <div class="card-body pt-4 border-dashed border-gray-300 rounded">
                                    <div class="row">
                                        <div class="d-flex align-items-center border-1 border-dashed card-rounded p-6  mb-5 mt-5"
                                            style="justify-content: space-between;"
                                            v-for="(archivo, key) in file_details">
                                            <div>
                                                <span
                                                    :class="archivo.type_file_id == 1 ? 'badge badge-primary':'badge badge-warning'">{{archivo.type_file.type_file}}</span>
                                                <label style="margin-left:10px">{{archivo.name}}</label>
                                            </div>
                                            <div>
                                                <a :href="archivo.full_path" target="blank__">
                                                    <span class=" translate-middle top-50 end-0 me-n2">
                                                        <i class="bi bi-download fs-2"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" id="modal_add_oc">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Oc</h5>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <label class="required fs-6 fw-bold mb-2">OC</label>
                                <input type="text" class="form-control  " v-model="form_input.oc" autocomplete="off"
                                    placeholder="" name="oc">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" @click="storeOc">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { Money } from "v-money";
    import axios from 'axios';

    export default {
        components: { Money },
        props: ['userAuth'],
        data() {
            return {
                surrenders: {
                    'total': 0,
                    'current_page': 1,
                    'per_page': 10,

                    'from': 2,
                    'to': 0

                },
                money: {
                    decimal: ",",
                    thousands: ".",
                    prefix: "$ ",
                    suffix: "",
                    precision: 0,
                    masked: false,
                },
                cards: [
                    { id: 1, name: 'Pagos declarados', value: 0, icono: 'list-check', background: '#005CFF' },
                    { id: 2, name: 'Por pagar', value: 0, icono: 'hourglass-split', background: '#ffc700' },
                    { id: 3, name: 'Pagados', value: 0, icono: 'check-all', background: '#50cd89' },
                ],
                pagos: [],
                inputs: [{ monto: 0, expense_type_id: '' }],
                form_input: {
                    site_id: null,
                    jefe_proyecto: null,
                    tps: null,
                    responsable_entel: null,
                    fecha_actividad: null,
                    pep: null,
                    total_gasto: null,
                    fecha_fin: null,
                    oc:null,
                    work_area_id:null
                },
                archivos: [],
                sites: [],
                nem_site: '',
                input_width_form: 0,
                type_files: [
                    { id: 1, name: 'Boleta', class: 'bi bi-receipt', color: '#009ef7' },
                    { id: 2, name: 'Correo', class: 'bi bi-envelope-fill', color: '#FFD76B' }
                ],
                steps: [
                    { id: 1, name: 'Información general', class: 'current' },
                    { id: 2, name: 'Gastos', class: 'pending' },
                    { id: 3, name: 'Archivos', class: 'pending' },
                ],
                type_file_select: '',
                extensions: [],
                expense_types: [],
                project_managers: [],
                tps: [],
                error_file: '',
                comprobacion_files: 0,
                error_gatos: '',
                load: false,
                load_data: true,
                payment_detail: [],
                tps_lists: [],
                mensajes_error: {
                    site: '',
                    jefe_proyecto: '',
                    responsable_entel: '',
                    fecha_actividad: '',
                    tps: '',
                    fecha_fin: '',
                    work_area:''
                },
                file_details: [],
                filters: {
                    project_manager_id: null,
                    state_id: null,
                    general_search: ''
                },
                states: [],
                registered_payment: null,
                is_filter: false,
                setTimeoutBuscador: '',
                surrender_id_oc:'',
                work_areas:[]





            }
        },
        created: function () {
            this.getSurrenders()
            this.getFilters()
        },
        computed: {
            currentStep() {
                let step = this.steps.find((obj => obj.class == 'current'));
                return step.id
            }
        },
        watch: {
            'form_input.site_id'(text) {
                if (text) return this.mensajes_error.site = ''
            },
            'form_input.jefe_proyecto'(text) {
                if (text) return this.mensajes_error.jefe_proyecto = ''
            },
            'form_input.responsable_entel'(text) {
                if (text) return this.mensajes_error.responsable_entel = ''
            },
            'form_input.fecha_actividad'(text) {
                if (text) return this.mensajes_error.fecha_actividad = ''
            },
            'form_input.fecha_fin'(text) {
                if (text) return this.mensajes_error.fecha_fin = ''
            }
        },
        methods: {
            getSurrenders() {
                axios.get('/rendicion/surrenders', {
                    params: {
                        'project_manager_id': this.filters.project_manager_id,
                        'state_id': this.filters.state_id,
                        'general_search': this.filters.general_search,
                    }
                }).then(response => {
                    this.registered_payment = response.data.registered_payment
                    this.surrenders = response.data.payment
                    for (let index = 0; index < this.cards.length; index++) {
                        let element = this.cards[index];
                        let pagos_declarados = this.cards.findIndex((obj => obj.id == element.id));
                        this.cards[pagos_declarados].value = element.id == 1 ? response.data.total_payment : (element.id == 2 ? response.data.total_payment_pending : response.data.total_payment_pay);
                    }
                    this.load_data = false
                })
            },
            async getFilters() {
                axios.get('/rendicion/filters').then(response => {
                    this.project_managers = response.data.project_managers
                    this.states = response.data.states
                })
            },
            getExtensions() {
                axios.get('/repositorio/extensions').then((response) => {
                    this.extensions = response.data;
                })
            },
            closeModal() {
                $("#kt_modal_add_surrender_payment").modal("hide");
            },
            addInput() {
                this.inputs.push({ monto: 0, expense_type_id: '' })
            },
            deleteInput(key) {
                this.inputs.splice(key, 1)
            },
            getDataForm() {
                axios.get('/data/form/payment').then(response => {

                    this.expense_types = response.data.expense_types
                    this.project_managers = response.data.project_managers
                    this.work_areas = response.data.work_areas
                })
                this.getExtensions();
            },
            searchSite() {

                if (this.nem_site.length >= 3) {
                    this.input_width_form = document.getElementById("site_search").clientWidth;

                    axios.get(`/GetPop?datositio=${this.nem_site}`).then((response) => {
                        this.sites = response.data
                    });
                } else {
                    this.sites = '';

                }

            },
            selectSite(site) {
                this.form_input.site_id = site.id
                this.nem_site = site.nem_site
                this.sites = []
            },
            changeSite() {
                this.form_input.site_id = null
                this.nem_site = ''
            },
            validateStep() {
                if (this.currentStep == 1) {
                    this.messageError();
                    if (this.form_input.site_id && this.form_input.jefe_proyecto && this.tps.length != 0 && this.form_input.fecha_actividad && this.form_input.fecha_fin && this.form_input.work_area_id) {
                        this.nextStep()
                    }
                } else {
                    if (this.currentStep == 2) {
                        let count_payment = this.inputs.filter((obj => obj.expense_type_id != '' && obj.monto != 0));
                        if (this.inputs.length == count_payment.length) {
                            this.nextStep()
                            this.error_gatos = ''
                        } else {
                            this.error_gatos = 'Debes ingresar al menos un gasto'
                        }
                    }
                }

            },
            nextStep() {
                let actualStep = this.steps.findIndex((obj => obj.id == this.currentStep));
                let nextStep = this.steps.findIndex((obj => obj.id == this.currentStep + 1));
                this.steps[actualStep].class = 'completed';
                this.steps[nextStep].class = 'current';
            },
            backStep() {
                let actualStep = this.steps.findIndex((obj => obj.id == this.currentStep));
                let nextStep = this.steps.findIndex((obj => obj.id == this.currentStep - 1));
                this.steps[actualStep].class = 'pending';
                this.steps[nextStep].class = 'current';
            },
            selectFile(typeFile) {
                this.type_file_select = typeFile
                document.getElementById("files").click();
            },
            uploadFiles() {
                let filesSelect = this.$refs.files.files;

                for (var i = 0; i < filesSelect.length; i++) {
                    let file = filesSelect[i];
                    let file_extension = file.name.split(".").pop()
                    let extension_permited = this.extensions.find((obj => obj.extension == file_extension));
                    if (extension_permited) {
                        this.archivos.push({ 'file': filesSelect[i], 'type': this.type_file_select });
                    }
                }
            },
            delefile(key) {
                this.archivos.splice(key, 1)
            },
            paseSize(bytes) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
                return parseInt(size / 1024);
            },
            addTp() {
                this.mensajes_error.tps = ''
                this.tps.push(this.form_input.tps);
                this.form_input.tps = null
            },
            deleteTp(key) {
                this.tps.splice(key, 1);
            },
            storeSurrenderPayment() {
                for (let index = 0; index < this.archivos.length; index++) {
                    let file = this.archivos[index];
                    if (file.type == 1 || file.type == 2) {
                        this.comprobacion_files += 1
                    }

                }
                console.log(this.comprobacion_files)

                if (this.archivos.length != 0 && this.comprobacion_files >= 2) {
                    this.load = true;
                    this.error_file = '';
                    let formData = new FormData
                    formData.append('site_id', this.form_input.site_id)
                    formData.append('pep', this.form_input.pep)
                    formData.append('responsable_entel', this.form_input.responsable_entel)
                    formData.append('project_manager_id', this.form_input.jefe_proyecto)
                    formData.append('fecha_actividad', this.form_input.fecha_actividad)
                    formData.append('fecha_fin', this.form_input.fecha_fin)
                    formData.append('work_area_id', this.form_input.work_area_id)
                    
                    for (let index = 0; index < this.inputs.length; index++) {
                        let gasto = this.inputs[index];
                        this.form_input.total_gasto += parseInt(gasto.monto)
                    }
                    formData.append('monto_total', this.form_input.total_gasto)
                    axios.post('/rendicion/store/payment', formData).then(response => {

                        let payment_id = response.data
                        for (let index = 0; index < this.tps.length; index++) {
                            let tp = this.tps[index];
                            let formData = new FormData
                            formData.append('tp', tp)
                            formData.append('payment_id', payment_id)
                            axios.post('/rendicion/store/tp', formData).then((response => {

                            }))
                        }
                        for (let index = 0; index < this.inputs.length; index++) {
                            let gastos = this.inputs[index];
                            let formData = new FormData
                            formData.append('expense_type_id', gastos.expense_type_id)
                            formData.append('amount', gastos.monto)
                            formData.append('payment_id', payment_id)
                            axios.post('/rendicion/store/detail/payment', formData).then((response => {

                            }))
                        }
                        for (let index = 0; index < this.archivos.length; index++) {
                            let archivo = this.archivos[index];
                            let formData = new FormData
                            formData.append('file', archivo.file)
                            formData.append('type_file', archivo.type)
                            formData.append('payment_id', payment_id)
                            axios.post('/rendicion/store/files', formData).then((response => {

                            }))
                        }
                        this.load = false
                        $("#kt_modal_add_surrender_payment").modal('hide');
                        this.load_data = false
                        Swal.fire('Su rendición de pago fue registrado', '', 'success')
                        this.getSurrenders()
                        this.cleanform()
                    })


                } else {
                    if (this.archivos.length == 0) {
                        this.error_file = 'No se ha cargado ningún archivo'
                    } else {
                        if (this.archivos.length != 0 && this.comprobacion_files == 1) {
                            this.error_file = 'Debes subir una boleta y un correo'
                        }
                    }
                }
            },
            cleanform() {
                this.form_input.site_id = null
                this.form_input.jefe_proyecto = null
                this.form_input.responsable_entel = null
                this.form_input.fecha_actividad = null
                this.form_input.pep = null
                this.form_input.total_gasto = null
                this.form_input.work_area_id = null
                this.form_input.fecha_fin = null
                this.archivos = []
                this.tps = []
                this.inputs = [{ monto: 0, expense_type_id: '' }]
                this.changeSite()
                let actualStep = this.steps.findIndex((obj => obj.id == this.currentStep));
                let nextStep = this.steps.findIndex((obj => obj.id == this.currentStep - 2));
                this.steps[actualStep].class = 'pending';
                this.steps[nextStep].class = 'current';
            },
            moneyFormat(value) {
                if (value % 1 == 0) {

                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                } else {
                    let val = (value / 1).toFixed(2).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                }

            },
            setClass(state) {
                if (state == 1) return 'badge badge-warning'
                if (state == 2) return 'badge badge-success'
            },
            showMoreInfo(surrender) {
                this.payment_detail = surrender.payment_detail
                this.tps_lists = surrender.payment_tp
                this.file_details = surrender.file
                $("#kt_modal_add_surrender_payment_detail").modal('show');
            },
            messageError() {
                if (!this.form_input.site_id) {
                    this.mensajes_error.site = 'Debes seleccionar un sitio'
                }
                if (!this.form_input.jefe_proyecto) {
                    this.mensajes_error.jefe_proyecto = 'Debes seleccionar un jefe de proyecto'
                }
                if (!this.form_input.responsable_entel) {
                    this.mensajes_error.responsable_entel = 'ingresa un responsable'
                }
                if (!this.form_input.fecha_actividad) {
                    this.mensajes_error.fecha_actividad = 'Debes seleccionar una fecha'
                }
                if (this.tps.length == 0) {
                    this.mensajes_error.tps = 'Debes ingresar al menos un TP'
                }
                if (!this.form_input.fecha_fin) {
                    this.mensajes_error.fecha_fin = 'Debes seleccionar una fecha'
                }
                if (!this.form_input.work_area_id) {
                    this.mensajes_error.work_area = 'Debes seleccionar el área'
                }
                


            },
            updateState(surrender, state) {
                let button = document.getElementById("btn_pay" + surrender.id);
                button.setAttribute("data-kt-indicator", "on");
                let formData = new FormData
                formData.append('payment_id', surrender.id)
                formData.append('state_id', state)
                axios.post('/rendicion/update/state', formData).then(response => {
                    this.getSurrenders()
                    button.removeAttribute("data-kt-indicator");
                })

            },
            showFilter() {
                let menu = document.getElementById("filter_menu");
                menu.style.display === "block" ? menu.style.display = "none" : menu.style.display = "block"

            },
            aplicateFilter() {
                this.showFilter()
                this.load_data = true;
                this.is_filter = true
                this.getSurrenders()
            },
            cleanFilter() {
                this.showFilter()
                this.filters.project_manager_id = null
                this.filters.state_id = null
                this.is_filter = false
                this.load_data = true;
                this.getSurrenders()
            },
            filterData() {
                clearTimeout(this.setTimeoutBuscador)
                this.setTimeoutBuscador = setTimeout(() => this.getSurrenders(), 300);
            },
            exportData() {
                let button = document.getElementById("btn_export");
                button.setAttribute("data-kt-indicator", "on");
                axios.get('/rendicion/export', {
                    responseType: 'arraybuffer'
                }).then(response => {
                    const blob = new Blob([response.data], { type: 'application/xlsx' })
                    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                        window.navigator.msSaveOrOpenBlob(newBlob)
                        return
                    }
                    const data = window.URL.createObjectURL(blob)
                    let link = document.createElement('a')
                    link.href = data
                    link.download = 'Rendicion_pagos_' + moment().format('YYYY-MM-DD hh:mm:ss') + '.xlsx'
                    link.click()
                    this.message('success', 'Éxito al descargar', 'Su reporte fue generado exitosamente')
                    button.removeAttribute("data-kt-indicator");
                }).catch(
                    error => {
                        this.load_excel = false;
                        this.message('error', 'Error', 'Se produjo un error inesperado al generar el reporte, favor contactar con soporte')

                    });
            },
            message(Type, Title, Text) {
                Swal.fire({
                    icon: Type,
                    title: Title,
                    text: Text,
                })
            },
            addOc(surrender_id){
                $("#modal_add_oc").modal("show")
                this.surrender_id_oc = surrender_id
            },
            storeOc(){
                axios.get('/rendicion/add/oc',{
                    params: {
                        'payment_id':this.surrender_id_oc,
                        'oc':this.form_input.oc
                    }
                }).then(response => {
                    $("#modal_add_oc").modal("hide")
                    this.getSurrenders()
                })
            }

        }

    }
</script>

<style>
    #vs1__combobox {
        height: 41px !important;
        border-radius: 0.475rem;
    }

    #list_site {
        box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px !important;
        margin-left: 1px !important;
        z-index: 105;
        position: absolute;
        margin: 0px;
        overflow: auto;
        max-height: 200px;
        margin-top: -5px !important;
    }

    #filter_menu {
        box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px !important;
        margin-left: 1px !important;
        z-index: 105;
        position: absolute;
        margin: 0px;
        overflow: auto;
        margin-top: 27rem !important;
    }

    .big-icon {

        font-size: 30px;

    }

    .no-shadow {
        box-shadow: none !important;
    }
</style>