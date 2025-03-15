import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { ZiggyVue } from 'ziggy-js';

createInertiaApp({
    resolve: name => import(`./components/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) }) 
        .use(plugin)      
        .use(ZiggyVue)       
        .mount(el);          
    },
});
