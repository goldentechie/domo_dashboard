import HomeView from './view/HomeView.vue';
import DashboardView from './view/DashboardView.vue';
import Dashboard from './components/Dashboard/Dashboard.vue';
import Events from './components/Dashboard/Events.vue';
import Messages from './components/Dashboard/Messages.vue';
import Channels from './components/Dashboard/Channels.vue';
import Files from './components/Dashboard/Files.vue';
import Teams from './components/Dashboard/Teams.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: HomeView
    },
    {
        name: 'dashboard',
        path: '/admin',
        component: DashboardView,
        
        children: [
            {path: '/admin/dashboard',component: Dashboard},
            {path: '/admin/events',component: Events},
            {path: '/admin/messages',component: Messages},
            {path: '/admin/channels',component: Channels},
            {path: '/admin/files',component: Files},
            {path: '/admin/teams',component: Teams},
        ]
    }
];