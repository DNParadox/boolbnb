import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import HomePage from './pages/HomePage.vue';
import NotFound from './pages/NotFound.vue';
import SingleApartment from './pages/SingleApartment.vue';

const router=new VueRouter({
    mode:'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/single-apartment',
            name: 'single-apartment',
            component: SingleApartment
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;