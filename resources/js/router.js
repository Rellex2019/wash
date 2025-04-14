import { createRouter, createWebHistory } from 'vue-router';
import store from './store';
import Registration from '@/js/pages/Registration.vue'
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
            path: '/', 
            component: Registration
        },
    ]
});

export default router;