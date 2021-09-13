import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from '@/components';
import Catalog from '@/components/catalog';
import ProductDetails from '@/components/catalog/products/detail';
import NotFound from '@/components/common/404';

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[
        {path: '/', component: Home},
        {path: '/catalog', component: Catalog},
        {path: '/details/:slug', component: ProductDetails},
        {path: '*', component: NotFound},
    ]
    });
export default router;

