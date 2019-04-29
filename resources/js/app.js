import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Index from './components/Index'
import Tes from './components/Tes'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Index
        },
        {
            path: '/tes',
            name: 'tes',
            component: Tes
        },
        
    ],
});

const app = new Vue({
    el: '#app',
    components: { Index },
    router,
});