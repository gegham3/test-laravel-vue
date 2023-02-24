require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import Items from './components/views/Items'
import App from './components/App'
import 'bootstrap-vue/dist/bootstrap-vue.css'
axios.defaults.headers.Authorization = `Bearer ${window.accessToken}`
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueRouter)
Vue.use(VueAxios, axios)

Vue.component('App', App);

const router = new VueRouter({
    routes: [
        {path: '/items', component: Items},
    ]
})

const app = new Vue({
    el: '#app',
    router,
})
