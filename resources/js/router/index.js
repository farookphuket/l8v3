import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import LoginPage from '../pages/Login.vue'
import Register from "../pages/Register.vue"
import UserHasConfirm from '../pages/UserHasConfirmed.vue'
import UserConfirmationFail from '../pages/UserConfirmationFail.vue'


export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name:'LoginPage',
        path:'/login',
        component: LoginPage
    },
    {
        name:'Register',
        path:'/regis',
        component: Register
    },
    {
        path: '/user-has-confirmed',
        name: 'userHasConfirmed',
        component: UserHasConfirm
    },

    {
        path: '/user-confirmation-fail',
        name: 'userConfirmationFail',
        component: UserConfirmationFail
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

router.beforeEach((to,from,next)=>{

    document.title = to.name
    next()
})


export default router;

