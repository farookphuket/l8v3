import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import LoginPage from '../pages/Login.vue'
import LogoutPage from "../pages/LogoutPage.vue"
import Register from "../pages/Register.vue"
import UserHasConfirm from '../pages/UserHasConfirmed.vue'
import UserConfirmationFail from '../pages/UserConfirmationFail.vue'


// admin 
import AdminDashBoard from "../pages/Admin/DashBoard.vue"

// member 
import MemberDashBoard from "../pages/Member/DashBoard.vue"

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

    /* ======== Logout */

    {
        name:'LogoutPage',
        path:'/logout',
        component: LogoutPage
    },
    /* ======== Member Section START */

    {
        name:'MemberDashBoard',
        path:'/member',
        component: MemberDashBoard
    },
    /* ======== Member Section END */
    /* ======== Admin section */

    {
        name:'AdminDashBoard',
        path:'/admin',
        component: AdminDashBoard
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

