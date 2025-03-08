import './bootstrap';
import '../css/app.css';
import '../css/custom.css';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';

import RegisterComponent from './components/RegisterComponent.vue'
import LoginComponent from './components/LoginComponent.vue'

const routes = [
    { path: '/', component: RegisterComponent },
    { path: '/login', component: LoginComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App);
app.use(router);
app.mount('#app');
