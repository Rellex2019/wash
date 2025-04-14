import { createRouter, createWebHistory } from 'vue-router';
import store from './store';
import Login from './pages/Login.vue';
import Registration from './pages/Registration.vue';
import Requests from './pages/Requests.vue';
const isAuthenticated = (to, from, next) => {
    const authenticated = store.getters['authStore/isAuthenticated'];
    if (authenticated) {
        next(); 
    } else {
        next({ path: '/login' }); 
    }
};

const isAdmin = (to, from, next) => {
    const user = store.getters['authStore/user'];
    if (user && user.role_id == 1) {
        next(); 
    } else {
        next({ path: '/' }); 
    }
};

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/login', 
            component: Login
        },
        {
            path: '/registration', 
            component: Registration
        },
        {
            path: '/cleaning_requests', 
            component: Requests
        },
    ]
});

export default router;