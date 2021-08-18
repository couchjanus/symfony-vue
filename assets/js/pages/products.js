import Vue from 'vue';

import App from '@/pages/products.vue';

const app = new Vue({
    render: (h) => h(App),
}).$mount('#app');
