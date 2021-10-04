import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from '@/components';
// import Catalog from '@/components/catalog';
import ProductDetails from '@/components/catalog/products/detail';
import NotFound from '@/components/common/404';

Vue.use(VueRouter);

function lazyLoad(item){
    return () => import(`@/components/${item}.vue`)
}

const router = new VueRouter({
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/catalog',
            component: lazyLoad('catalog/index')
        },
        {path: '/details/:slug', component: ProductDetails},
        {
            path: '/login',
            name: 'login',
            component: lazyLoad('auth/login')
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: lazyLoad('customer/dashboard')
        },
        {path: '*', component: NotFound},
    ]
    });
export default router;

