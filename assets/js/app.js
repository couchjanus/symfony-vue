import Vue from 'vue';
import router from '@/router';
import store from '@/store/index';

import { library } from '@fortawesome/fontawesome-svg-core'

// var fab = require('@fortawesome/fontawesome-free-brands')['default']
// library.add(fab)
// var far = require('@fortawesome/fontawesome-free-regular')['default']
// library.add(far)

var fas = require('@fortawesome/fontawesome-free-solid')['default']
library.add(fas)

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.component('font-awesome-icon', FontAwesomeIcon);

import App from '@/App.vue';

window.axios = require('axios');

// axios.defaults.baseURL = 'https://api.example.com';
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN;
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
require('@/store/subsriber');

store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=>{
    new Vue({
        router,
        // указываем хранилище в опции store, что обеспечит
        // доступ к нему во всех дочерних компонентах
        store,
        render: h => h(App),
    }).$mount('#app');

})
