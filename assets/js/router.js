import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from '@/components';

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
            name: "home",
            component: Home
        },
        {
            path: '/catalog', 
            name: "catalog",
            component: lazyLoad('catalog/index')
        },
        {
            path: '/details/:slug', 
            name: "details",
            component: ProductDetails
        },
        {
            path: '/login',
            name: 'login',
            component: lazyLoad('auth/login')
        },
        {
            path: '/register',
            name: 'register',
            component: lazyLoad('auth/register')
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: lazyLoad('customer/dashboard'),
            // beforeEnter: (to, from, next) => {
            //     if(!store.getters['auth/isAuthenticated']){
            //         return next({
            //         name: 'login'
            //         })
            //     }
            //     next()
            // }
        },
        {path: '*', component: NotFound},
    ]
    });
export default router;
