//DASHBOARD
import DashboardIndex from './components/dashboard/DashboardIndex.vue';
import RuanganIndex from './components/ruangan/RuanganIndex.vue';
import RuanganCreate from './components/ruangan/RuanganCreate.vue';
import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
     {
        path: '/',
        component: DashboardIndex,
        name : 'IndexDashboard'
     },
     { path: '/ruangan', component: RuanganIndex, name: 'IndexRuangan' },
     { path: '/ruangan/create', component: RuanganCreate, name: 'CreateRuangan' },
];

export default routes;