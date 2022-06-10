import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
let MyFolders = () =>
    import( /* webpackChunkName: "chunks/repostorio/carpetas"*/ './components/repositorio/carpetas.vue')
let FoldersAdmin = () =>
    import( /* webpackChunkName: "chunks/repostorio/folderAdmin"*/ './components/repositorio/folderAdmin.vue')
let FoldersTrash = () =>
    import( /* webpackChunkName: "chunks/repostorio/Trash"*/ './components/repositorio/Trash.vue')
let FoldersShared = () =>
    import( /* webpackChunkName: "chunks/repostorio/FolderShared"*/ './components/repositorio/FolderShared.vue')
let OfficeTrackFolders = () =>
    import( /* webpackChunkName: "chunks/repostorio/OfficeTrackFolders"*/ './components/repositorio/OfficeTrackFolders.vue')
let SgcFiles = () =>
    import( /* webpackChunkName: "chunks/repostorio/SgcFiles"*/ './components/repositorio/SgcFiles.vue')
let ReportPep = () =>
    import( /* webpackChunkName: "chunks/reports/pep/Report"*/ './components/reports/pep/Report.vue')
let TicketSupport = () =>
    import( /* webpackChunkName: "chunks/Suport/Ticket/Ticket"*/ './components/Suport/Ticket/Ticket.vue')
let indexAcreditation = () =>
    import( /* webpackChunkName: "chunks/Acreditacion/dashboard/index"*/ './components/Acreditacion/dashboard/index.vue')
let calendarioItos = () =>
    import( /* webpackChunkName: "chunks/itos/calendario/calendario"*/ './components/itos/calendario/calendario.vue')
let TaskItos = () =>
    import( /* webpackChunkName: "chunks/itos/calendario/task"*/ './components/itos/calendario/task.vue')
let ListUsers = () =>
    import( /* webpackChunkName: "chunks/Administracion/Users"*/ './components/Administracion/Users.vue')
let DetailUsers = () =>
    import( /* webpackChunkName: "chunks/Administracion/UserDetail"*/ './components/Administracion/UserDetail.vue')
let Providers = () =>
    import( /* webpackChunkName: "chunks/Acreditacion/dashboard/Providers"*/ './components/Acreditacion/dashboard/Providers.vue')
let RequestAccount = () =>
    import( /* webpackChunkName: "chunks/Administracion/Accounts"*/ './components/Administracion/Accounts.vue')
let DashBoardPagos = () =>
    import( /* webpackChunkName: "chunks/Rendicion/Pagos/Dashboard"*/ './components/Rendicion/Pagos/Dashboard.vue')
export default {
    mode: 'history',
    base: process.env.BASE_URL,
    render: h => h(App),
    routes: [{
        path: '/show/:id',
        name: 'showsgc',
        component: require('./components/sgc/show.vue'),
        props: true
    }, {
        path: '/sgc/:modulo',
        name: 'solicitudes',
        component: require('./components/sgc/tablesrequest.vue'),
        props: true
    }, {
        path: '/repositorio',
        name: 'myFolder',
        component: MyFolders,
        props: true
    }, {
        path: '/repositorio/folderAdmin',
        name: 'FoldersAdmin',
        component: FoldersAdmin,
        props: true
    }, {
        path: '/repositorio/OfficeTrackFolders',
        name: 'OfficeTrackFolders',
        component: OfficeTrackFolders,
        props: true
    },
    {
        path: '/admin',
        name: 'ListUsers',
        component: ListUsers,
        props: true,
        beforeEnter: (to, from, next) => {
            axios.get('/get/user').then(response => {


                if (response.data.rol == 1) {
                    next()
                } else {
                    window.location.replace('/modulos')
                }



            })

        }
    },
    {
        path: '/admin/user/detail/:id',
        name: 'DetailUsers',
        component: DetailUsers,
        props: true
    },
    {
        path: '/admin/solicitud/cuentas',
        name: 'solicitudCuentas',
        component: RequestAccount,
        props: true
    },

    {
        path: '/rendicion',
        name: 'DashBoardPagos',
        component: DashBoardPagos,
        props: true
    },

    

    






    {
        path: '/support',
        name: 'support',
        component: TicketSupport,
        props: true

    },

    {
        path: '/repositorio/FoldersTrash',
        name: 'FoldersTrash',
        component: FoldersTrash,
        props: true
    }, {
        path: '/repositorio/SgcFiles',
        name: 'SgcFiles',
        component: SgcFiles,
        props: true
    }, {
        path: '/repositorio/FoldersShared',
        name: 'FoldersShared',
        component: FoldersShared,
        props: true
    }, {
        path: '/formOym',
        name: 'formoym',
        component: require('./components/sgc/formOym.vue'),
        props: true
    },
    {
        path: '/reports',
        name: 'ReportPep',
        component: ReportPep,
        props: true
    },
    {
        path: '/accreditation/employees',
        name: 'accreditationEmployees',
        component: indexAcreditation,
        props: true
    },
    {
        path: '/accreditation',
        name: 'Providers',
        component: Providers,
        props: true
    },

    

    {
        path: '/itos',
        name: 'calendarioItos',
        component: calendarioItos,
        props: true
    },
    {
        path: '/itos/task',
        name: 'TaskItos',
        component: TaskItos,
        props: true
    },








    {

        path: '/showTicket/:id',
        name: 'showTicket',
        component: require('./components/ticket/show.vue'),
        props: true
    },],
}