import AllTeam from './components/AllTeam.vue';
import TeamView from './components/TeamView.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllTeam
    },
    {
        name: 'team',
        path: '/team/:id',
        component: TeamView
    }
];
