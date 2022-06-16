import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Dashboard from '../views/Dashboard.vue'
import Login from '../views/Auth/Login.auth.vue'
import Form from '../views/Form.vue'
import useUserStore from '../store'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/admin',
        name: 'Dashboard',
        component: Dashboard,
        meta: {requiresAuth: true}
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/form',
        name: 'Form',
        component: Form
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const store = useUserStore()
    const isLogged = store.isLoggedIn()
    if (to.meta.requiresAuth && !isLogged){ 
        next({name: 'Login'})
    }else {
        next()
    }
})
export default router