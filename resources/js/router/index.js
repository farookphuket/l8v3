import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import LoginPage from '../pages/Login.vue'
import LogoutPage from "../pages/LogoutPage.vue"
import Register from "../pages/Register.vue"
import UserHasConfirm from '../pages/UserHasConfirmed.vue'
import UserConfirmationFail from '../pages/UserConfirmationFail.vue'

import PageNotFound from '../pages/PageNotFound.vue'

// admin 
import AdminDashBoard from "../pages/Admin/DashBoard.vue"

// member 
import MemberDashBoard from "../pages/Member/DashBoard.vue"
import Profile from "../pages/Member/Profile.vue"

export const user_id = window.user_id

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
        component: LogoutPage,
        beforeEnter:(to,from,next)=>{
            if(!user_id){
                next({name:'LoginPage'})
            }else{
                next()
            }
        },
    },
    /* ======== Member Section START */

    {
        name:'MemberDashBoard',
        path:'/member',
        component: MemberDashBoard,
        beforeEnter:(to,from,next)=>{
            if(!user_id){
                next({name:'LoginPage'})
            }else{
                next()
            }
        },
    },
    {
        name:'Profile',
        path:'/profile',
        component: Profile,
        beforeEnter:(to,from,next)=>{
            if(!user_id){
                next({name:'LoginPage'})
            }else{
                next()
            }
        },
    },
    /* ======== Member Section END */
    /* ======== Admin section */

    {
        name:'AdminDashBoard',
        path:'/admin',
        component: AdminDashBoard,
        beforeEnter:(to,from,next)=>{
            if(!user_id){
                next({name:'LoginPage'})
            }else{
                next()
            }
        },
    },

    /* ========= 404 page not found */
    {
        name:'PageNotFound',
        path:'/page-not-found',
        component:PageNotFound,
    },

    /* ========= not exists page */
    {
        path:'/:pathMatch(.*)*',
        beforeEnter:(to,from,next)=>{
            next({name:'PageNotFound'})   
        },
         

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

