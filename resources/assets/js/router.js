//DASHBOARD
import DashboardIndex from './components/dashboard/DashboardIndex.vue';
import RuanganIndex from './components/ruangan/RuanganIndex.vue';
import RuanganCreate from './components/ruangan/RuanganCreate.vue';
import RuanganEdit from './components/ruangan/RuanganEdit.vue';
import ExampleComponent from './components/ExampleComponent.vue';

//ROUTE
const routes = [
     {
        path: '/',
        component: DashboardIndex,
        name : 'IndexDashboard'
     },
     { path: '/ruangan', component: RuanganIndex, name: 'IndexRuangan' },
     { path: '/ruangan/create', component: RuanganCreate, name: 'CreateRuangan' },
     { path: '/ruangan/edit/:id', component: RuanganEdit, name: 'EditRuangan' },
];

export default routes;