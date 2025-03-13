import './bootstrap';
import '../css/app.css';
import '../css/custom.css';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';

import RegisterComponent from './components/RegisterComponent.vue'
import LoginComponent from './components/LoginComponent.vue'
import UserDashboard from './components/UserDashboard.vue'
import AdminDashboard from './components/AdminDashboard.vue';

const routes = [
    { path: '/', component: LoginComponent },
    { path: '/register', component:  RegisterComponent},
    { path: '/user', component:  UserDashboard},
    { path: '/admin', component:  AdminDashboard},
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App);
app.use(router);
app.mount('#app');
