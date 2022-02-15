import Vue from 'vue';
import VueRouter from 'vue-router';

// componenti
import Home from './pages/Home.vue';
import ProductDetail from './pages/ProductDetail.vue';
// import NotFound from './pages/NotFound.vue';

// attivazione router
Vue.use(VueRouter);

// definizione rotte
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/product/:slug',
            name: 'productDetail',
            component: ProductDetail,
        },
        // {
        //     path: '*',
        //     name: 'not_found',
        //     component: NotFound,
        // },
    ]
});
// export delle rotte
export default router;