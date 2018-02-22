//DASHBOARD
import DashboardIndex from './components/dashboard/DashboardIndex.vue';
import RuanganIndex from './components/ruangan/RuanganIndex.vue';
import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
     {
        path: '/',
        component: DashboardIndex,
        name : 'IndexDashboard'
     },
     { path: '/ruangan', component: RuanganIndex,name: 'IndexRuangan' },
];

export default routes;