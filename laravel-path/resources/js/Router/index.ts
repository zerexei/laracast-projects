import { createRouter, createWebHistory } from 'vue-router'

const Home = { template: '<div>Home</div>' }
const Dashboard = { template: '<div>Dashboard</div>' }

const routes = [
    { path: '/', component: Home },
    { path: '/dashboard', component: Dashboard },
];

const Router = createRouter({
    history: createWebHistory(),
    routes,
})

export default Router;
