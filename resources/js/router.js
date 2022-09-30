import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import HomePage from './pages/HomePage.vue';
import SearchPage from './pages/SearchPage.vue';
import NotFound from './pages/NotFound.vue';

const router=new VueRouter({
    mode:'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/search',
            name: 'search',
            component: SearchPage
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;