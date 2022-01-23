require('./bootstrap');

import {createApp} from 'vue'

/* ============ font-awesome START ========================================= */
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
library.add(fas)
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* ============ font-awesome END   ========================================= */

import VueCookies from 'vue3-cookies'

import moment from "moment"

/* =========== jodit-vue START ==============================================*/
import 'jodit/build/jodit.min.css'
import JoditVue from 'jodit-vue3'
/* =========== jodit-vue END   ==============================================*/

import axios from 'axios'
import router from './router'


// ============== 27 June 2021 ================================================
import Form from './core/Form';
import CustomText from './core/CustomText';

window.Form = Form;
window.CustomText = CustomText;


import 'jodit/build/jodit.min.css'
import App from './App'


const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(JoditVue)
app.use(VueCookies)
app.use(moment)
app.component("font-awesome-icon", FontAwesomeIcon)
app.mount('#app')
