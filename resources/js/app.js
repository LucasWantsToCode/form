require('./bootstrap');

import { createPinia } from 'pinia';
import { createApp } from 'vue';
import router from './router'
import Home from './views/Home.vue'
import Login from './views/Auth/Login.auth.vue'
import Dashboard from './views/Dashboard.vue'
import Form from './views/Form.vue'
import "@fortawesome/fontawesome-free/css/all.min.css";

const pinia = createPinia()

createApp({
    components: [
        Home,
        Login,
        Dashboard,
        Form
    ]
}).use(pinia).use(router).mount('#app')